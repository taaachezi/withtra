<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Purposes Controller
 *
 * @method \App\Model\Entity\Purpose[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurposesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $purposes = $this->paginate($this->Purposes);

        $this->set(compact('purposes'));
    }

    /**
     * View method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purpose = $this->Purposes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('purpose'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purpose = $this->Purposes->newEmptyEntity();
        if ($this->request->is('post')) {
            $purpose = $this->Purposes->patchEntity($purpose, $this->request->getData());
            if ($this->Purposes->save($purpose)) {
                $this->Flash->success(__('The purpose has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purpose could not be saved. Please, try again.'));
        }
        $this->set(compact('purpose'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purpose = $this->Purposes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purpose = $this->Purposes->patchEntity($purpose, $this->request->getData());
            if ($this->Purposes->save($purpose)) {
                $this->Flash->success(__('The purpose has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purpose could not be saved. Please, try again.'));
        }
        $this->set(compact('purpose'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purpose id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purpose = $this->Purposes->get($id);
        if ($this->Purposes->delete($purpose)) {
            $this->Flash->success(__('The purpose has been deleted.'));
        } else {
            $this->Flash->error(__('The purpose could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
