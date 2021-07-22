<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    // ログイン認証不要アクションの設定
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','home', 'add','logout']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if($result->isValid()){
            $redirect = $this->request->getQuery('redirect',[
                'controller' => 'Collects',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        if($this->request->is('post') && !$result->isValid()){
            $this->Flash->error(__('メールアドレスかパスワードが違います'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if($result->isValid()){
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'home']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function home(){
        // ヘッダーの切り分け
        $result = $this->Authentication->getResult();
        if($result->isValid()){
            $current_user = true;
        }else{
            $current_user = false;
        }
        $this->set(compact('current_user'));
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Gyms', 'Prefectures'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Gyms', 'Prefectures', 'Collects', 'Entries'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('登録が完了しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('正常に登録できませんでした。再度やり直してください'));
        }
        $gyms = $this->Users->Gyms->find('list', ['limit' => 200]);
        $prefectures = $this->Users->Prefectures->find('list', ['limit' => 200]);
        $this->set(compact('user', 'gyms', 'prefectures'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $gyms = $this->Users->Gyms->find('list', ['limit' => 200]);
        $prefectures = $this->Users->Prefectures->find('list', ['limit' => 200]);
        $this->set(compact('user', 'gyms', 'prefectures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
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

        return $this->redirect(['action' => 'index']);
    }
}
