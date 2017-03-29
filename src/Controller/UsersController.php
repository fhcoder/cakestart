<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 28/03/2017
 * Time: 21:41
 */

namespace App\Controller;


class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $search = $this->request->getQuery('search');
        $conditions = [
            'Users.nome'=>$this->Format->search($search),
            'Users.username'=>$this->Format->search($search),
            'Users.email'=>$this->Format->search($search),
        ];
        $this->paginate = [
            'conditions' => $conditions
        ];
        $users = $this->paginate('Users');
        $this->set(compact('users'));
        $this->set('_serialize',['users']);
    }

    public function form($id = null)
    {
        $user = $this->Users->newEntity();
        $roles = $this->Users->getRoles();
        if ($id) {
            $user = $this->Users->get($id);
        }
        if ($this->request->is(['post','put','patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao salvar o registro.'));
            }
        }
        $this->request->data['password'] = '';
        $this->request->data['confirm_password'] = '';
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Registro deletado com sucesso'));
        } else {
            $this->Flash->error(__('Ocorreu um problema ao deletar o registro'));
        }
        return $this->redirect($this->referer());
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function notAuthorized()
    {

    }
}