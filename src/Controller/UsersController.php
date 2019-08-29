<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\Testes;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Add the 'add' action to the allowed actions list.
        $this->Auth->allow(['logout', 'add'/*, 'index'*/]);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Estados']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Estados', 'Clientes']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect($this->Auth->redirectUrl(['action' => 'login']));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $querys = $this->Users->Estados->find('all')
        ->select(['id', 'estado']); // --> Aqui é criado um array de objetos baseado no select feito,
                                // --> porém não podemos manusear um array de objetos. *Converta.

        $estados = []; // --> Aqui criamos um array vazio, para converção do array de objetos.
        foreach ($querys as $query) { // --> Aqui percorremos o array de objetos.
            $estados[$query->id] = $query->estado;  
            // --> Gravando no array as informações contidas em $query na seguinte ordem,
            // --> $array[chave(id)] = informação acompanhada da chave.
        }
        $this->set(compact('user', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        Testes::debugar($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect($this->Auth->redirectUrl(['action' => 'view', $user->id]));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $querys = $this->Users->Estados->find('all')
        ->select(['id', 'estado']);

        $estados = [];
        foreach ($querys as $query) {
            $estados[$query->id] = $query->estado;
        }

        $this->set(compact('user', 'estados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));

        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->Auth->redirectUrl(['action' => 'logout']));
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add'])) {
            return true;
        }

        // All other actions require a id.
        $id = $this->request->getParam('pass.0');
        // echo $id;
        // exit();
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $usuario = $this->Users->findById($id)->first();
        
        return $usuario->id === $user['id'];
    }
}
