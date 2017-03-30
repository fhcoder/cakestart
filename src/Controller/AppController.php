<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'flash' => [
                'element' => 'error',
                'key' => 'auth'
            ],
            'authorize' => 'Controller',
            "unauthorizedRedirect" => ["controller" => "users", "action" => "notAuthorized"],
            "authorizedRedirect" => ["controller" => "Dashboard", "action" => "index"],

        ]);
        $this->loadComponent('Format');
        $this->loadComponent('ImageUpload', [
            'dir' => WWW_ROOT . DS . 'uploads',
            'size' => 900,
            'thumbDir' => WWW_ROOT . DS . 'uploads' . DS . 'thumbs',
            'thumbSize' => 400,
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $this->viewBuilder()->setLayout('layout');
        $currentUser = $this->Auth->user();

        $this->set(compact('currentUser'));
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user = null)
    {
        if ($user['role'] === UsersTable::ROLE_SUPER) {
            return true;
        }
        // Default deny
        return false;
    }

    public function buildAutorization($user = null, array $roles, array $actions)
    {
        if (in_array('*', $actions)) {
            return true;
        }
        if (in_array($user['role'], $roles)) {
            return in_array($this->request->action, $actions);
        }
        return false;
    }
}
