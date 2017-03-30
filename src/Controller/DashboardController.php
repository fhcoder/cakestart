<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 29/03/2017
 * Time: 17:59
 */

namespace App\Controller;


use App\Model\Table\UsersTable;

class DashboardController extends AppController
{
    protected $authorizedActions = [
        '*'
    ];

    public function isAuthorized($user = null)
    {
        if ($this->buildAutorization($user, UsersTable::ROLE_ALL, $this->authorizedActions)) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function index()
    {

    }
}