<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 27/05/2017
 * Time: 09:50
 */

namespace App\Auth;


use Cake\Auth\BaseAuthenticate;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

class UsernameOrEmailAuthenticate extends BaseAuthenticate
{

    /**
     * Authenticate a user based on the request information.
     *
     * @param \Cake\Http\ServerRequest $request Request to get authentication information from.
     * @param \Cake\Http\Response $response A response object that can have headers added.
     * @return mixed Either false on failure, or an array of user data on success.
     */
    public function authenticate(ServerRequest $request, Response $response)
    {
        return $this->getUser($request);
    }

    public function getUser(ServerRequest $request)
    {
        $username = $request->getData('username');
        $user = TableRegistry::get('Users')
            ->find('all')
            ->where(['username' => $username])
            ->orWhere(['email' => $username])->first();
        return $user;
    }
}