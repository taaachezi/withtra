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
        if ($this->request->getQuery('filter')) {
            // where文のデータを取得（空も含む）
            $getQuery = [];
            $getQuery["Collects.time"] = $this->request->getQuery("date");
            $getQuery["Gyms.id"] = $this->request->getQuery("gym_id");
            $getQuery["Purposes.id"] = $this->request->getQuery("purpose_id");
            $getQuery["Prefectures.id"]= $this->request->getQuery("prefecture_id");
            $getQuery["Parts.id"] = $this->request->getQuery("part_id");
            $city = $this->request->getQuery("city");

            // 検索されたデータのみ形成しwhere実行
            $filter=[];
            foreach($getQuery as $key => $val){
                if(!empty($val)){
                    $filter[$key] = $val;
                }
            }
            $query = $this->Collects->find();
            $query->where([$filter]);

            // cityが記入されていれば検索
            if(!empty($city)) {
                $query->where(["Collects.city LIKE"=>'%'.$city.'%']);
            }

            // クエリ実行
            $collects = $this->paginate($query);
        }else{
            $collects = $this->paginate($this->Collects->find('all'));
        }

        // 検索用データ格納
        $gyms = $this->Collects->Gyms->find("list");
        $parts = $this->Collects->Parts->find("list");
        $purposes = $this->Collects->Purposes->find('list',[
            'valueField' => 'content']
        );
        $prefectures = $this->Collects->Prefectures->find('list');
        
        $this->set(compact('collects','gyms','parts','purposes','prefectures'));
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
}
