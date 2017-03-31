<?php

namespace App\Auth;

use Cake\Event\Event;

/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 30/03/2017
 * Time: 16:44
 */
class AuthEventListener implements \Cake\Event\EventListenerInterface
{

    /**
     * Returns a list of events this object is implementing. When the class is registered
     * in an event manager, each individual method will be associated with the respective event.
     *
     * ### Example:
     *
     * ```
     *  public function implementedEvents()
     *  {
     *      return [
     *          'Order.complete' => 'sendEmail',
     *          'Article.afterBuy' => 'decrementInventory',
     *          'User.onRegister' => ['callable' => 'logRegistration', 'priority' => 20, 'passParams' => true]
     *      ];
     *  }
     * ```
     *
     * @return array associative array or event key names pointing to the function
     * that should be called in the object when the respective event is fired
     */
    public function implementedEvents()
    {
        return [
            'Auth.afterIdentify' => 'afterIdentify',
            'Auth.logout' => 'logout',
        ];
    }

    public function afterIdentify(Event $event, $result, $auth)
    {

    }


    public function logout(Event $event, $user)
    {

    }
}