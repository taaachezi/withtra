<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Collects Controller
 *
 * @method \App\Model\Entity\Collect[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CollectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Users', 'Gyms', 'Parts', 'Purposes', 'Prefectures']];

        $filter = $this->Collects->newEmptyEntity();
        $gyms = $this->Collects->Gyms->find('list');
        $parts = $this->Collects->Parts->find('list');
        $purposes = $this->Collects->Purposes->find('list');
        $prefectures = $this->Collects->Prefectures->find('list');
        $collects = $this->paginate($this->Collects);
        
        $this->set(compact('collects','filter','gyms','parts','purposes','prefectures'));
    }

    /**
     * View method
     *
     * @param string|null $id Collect id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collect = $this->Collects->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('collect'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collect = $this->Collects->newEmptyEntity();
        if ($this->request->is('post')) {
            $collect = $this->Collects->patchEntity($collect, $this->request->getData());
            if ($this->Collects->save($collect)) {
                $this->Flash->success(__('The collect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collect could not be saved. Please, try again.'));
        }
        $this->set(compact('collect'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Collect id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collect = $this->Collects->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collect = $this->Collects->patchEntity($collect, $this->request->getData());
            if ($this->Collects->save($collect)) {
                $this->Flash->success(__('The collect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collect could not be saved. Please, try again.'));
        }
        $this->set(compact('collect'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Collect id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collect = $this->Collects->get($id);
        if ($this->Collects->delete($collect)) {
            $this->Flash->success(__('The collect has been deleted.'));
        } else {
            $this->Flash->error(__('The collect could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function filter($request) {
        
    }
}
