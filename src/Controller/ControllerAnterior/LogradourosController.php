<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Logradouros Controller
 *
 * @property \App\Model\Table\LogradourosTable $Logradouros
 *
 * @method \App\Model\Entity\Logradouro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogradourosController extends AppController
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
        $logradouros = $this->paginate($this->Logradouros);

        $this->set(compact('logradouros'));
    }

    /**
     * View method
     *
     * @param string|null $id Logradouro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logradouro = $this->Logradouros->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('logradouro', $logradouro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logradouro = $this->Logradouros->newEntity();
        if ($this->request->is('post')) {
            $logradouro = $this->Logradouros->patchEntity($logradouro, $this->request->getData());
            if ($this->Logradouros->save($logradouro)) {
                $this->Flash->success(__('The logradouro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logradouro could not be saved. Please, try again.'));
        }
        $querys = $this->Logradouros->Users->find('all')
        ->select(['id','nome']); // --> Deste modo temos um array de objetos n manuseáveis

        $users = []; // --> Instanciando um array
        foreach($querys as $query){// --> Fazendo um for para ler o array de objetos $querys
            $users[$query->id] = $query->nome;  
            // --> Gravando no array as informações contidas em $query na seguinte ordem,
            // --> $array[chave(id)] = infor. acompanhada da chave 
        }
        ?>
        <pre>
        <?php
        print_r($users);
        // print_r($query);
        // var_dump(json_encode($users));
        // var_dump(json_encode($query));
        ?>
        </pre>
        <?php
        $this->set(compact('logradouro', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Logradouro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logradouro = $this->Logradouros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logradouro = $this->Logradouros->patchEntity($logradouro, $this->request->getData());
            if ($this->Logradouros->save($logradouro)) {
                $this->Flash->success(__('The logradouro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logradouro could not be saved. Please, try again.'));
        }
        $users = $this->Logradouros->Users->find('list', ['limit' => 200]);
        $this->set(compact('logradouro', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Logradouro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logradouro = $this->Logradouros->get($id);
        if ($this->Logradouros->delete($logradouro)) {
            $this->Flash->success(__('The logradouro has been deleted.'));
        } else {
            $this->Flash->error(__('The logradouro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
