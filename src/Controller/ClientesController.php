<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());

            $cliente->user_id = $this->Auth->user('id');
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['controller' => 'Users',
                 'action' => 'view', $cliente->user_id]);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $querys = $this->Clientes->Users->find('all')
        ->select(['id', 'nome']);

        $users = [];
        foreach ($querys as $query) {
            $users[$query->id] = $query->nome;
        }
        $this->set(compact('cliente', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            // , [
            //     // Added: Disable modification of user_id.
            //     'accessibleFields' => ['user_id' => false]
            // ]);
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect($this->Auth->redirectUrl(['action' => 'view', $cliente->id]));
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $querys = $this->Clientes->Users->find('all')
        ->select(['id', 'nome']);

        $users = [];
        foreach ($querys as $query) {
            $users[$query->id] = $query->nome;
        }

        $this->set(compact('cliente', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->Auth
        ->redirectUrl(['controller' => 'Users', 'action' => 'view', $cliente->user_id]));
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
        $client = $this->Clientes->findById($id)->first();
        
        return $client->user_id === $user['id'];
    }
}
