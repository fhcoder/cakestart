<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 28/03/2017
 * Time: 21:41
 */

namespace App\Controller;


use App\Model\Table\UsersTable;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    protected $authorizedActions = [
        '*'
    ];

    public function isAuthorized($user = null)
    {
        if ($this->buildAutorization($user, [UsersTable::ROLE_SUPER], $this->authorizedActions)) {
            return true;
        }
        if ($this->buildAutorization($user, UsersTable::ROLE_ALL, ['profile'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function index()
    {
        $search = $this->request->getQuery('search');
        $conditions = [
            'OR'=>[
            'Users.nome LIKE' => $this->Format->search($search),
            'Users.username LIKE' => $this->Format->search($search),
            'Users.email LIKE' => $this->Format->search($search),
                ]
        ];
        $this->paginate = [
            'conditions' => $conditions
        ];
        $users = $this->paginate('Users');
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function form($id = null)
    {
        $user = $this->Users->newEntity();
        $roles = $this->Users->getRoles();
        if ($id) {
            $user = $this->Users->get($id);
        }
        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao salvar o registro.'));
            }
        }
        $user['password'] = '';
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

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Usuário ou senha incorreto.'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function notAuthorized()
    {

    }
}