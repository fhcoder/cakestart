<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 24/12/2016
 * Time: 11:07
 */

namespace App\View\Helper;


use Cake\View\Helper;

class ActiveMenuHelper extends Helper
{
    private $activateMenuList = [
        'Users' => ['Users' => ['index', 'form']],
        'Categories' => ['Categories' => ['index', 'form']]
    ];

    public function toActivate($menuName)
    {
        $menuList = isset($this->activateMenuList[$menuName]) ? $this->activateMenuList[$menuName] : [];
        $controllerName = $this->request->controller;
        $actions = isset($menuList[$controllerName]) ? $menuList[$controllerName] : [];
        if (in_array($this->request->action, $actions)) {
            return 'active';
        }
        return false;
    }
}