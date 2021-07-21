<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Gyms Controller
 *
 * @method \App\Model\Entity\Gym[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GymsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $gyms = $this->paginate($this->Gyms);

        $this->set(compact('gyms'));
    }

    /**
     * View method
     *
     * @param string|null $id Gym id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gym = $this->Gyms->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('gym'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gym = $this->Gyms->newEmptyEntity();
        if ($this->request->is('post')) {
            $gym = $this->Gyms->patchEntity($gym, $this->request->getData());
            if ($this->Gyms->save($gym)) {
                $this->Flash->success(__('The gym has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gym could not be saved. Please, try again.'));
        }
        $this->set(compact('gym'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gym id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gym = $this->Gyms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gym = $this->Gyms->patchEntity($gym, $this->request->getData());
            if ($this->Gyms->save($gym)) {
                $this->Flash->success(__('The gym has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gym could not be saved. Please, try again.'));
        }
        $this->set(compact('gym'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gym id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gym = $this->Gyms->get($id);
        if ($this->Gyms->delete($gym)) {
            $this->Flash->success(__('The gym has been deleted.'));
        } else {
            $this->Flash->error(__('The gym could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
