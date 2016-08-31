<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Holdings Controller
 *
 * @property \App\Model\Table\HoldingsTable $Holdings
 */
class HoldingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $holdings = $this->paginate($this->Holdings);

        $this->set(compact('holdings'));
        $this->set('_serialize', ['holdings']);
    }

    /**
     * View method
     *
     * @param string|null $id Holding id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $holding = $this->Holdings->get($id, [
            'contain' => []
        ]);

        $this->set('holding', $holding);
        $this->set('_serialize', ['holding']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $holding = $this->Holdings->newEntity();
        if ($this->request->is('post')) {
            $holding = $this->Holdings->patchEntity($holding, $this->request->data);
            if ($this->Holdings->save($holding)) {
                $this->Flash->success(__('The holding has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holding could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('holding'));
        $this->set('_serialize', ['holding']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Holding id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $holding = $this->Holdings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holding = $this->Holdings->patchEntity($holding, $this->request->data);
            if ($this->Holdings->save($holding)) {
                $this->Flash->success(__('The holding has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The holding could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('holding'));
        $this->set('_serialize', ['holding']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Holding id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $holding = $this->Holdings->get($id);
        if ($this->Holdings->delete($holding)) {
            $this->Flash->success(__('The holding has been deleted.'));
        } else {
            $this->Flash->error(__('The holding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
