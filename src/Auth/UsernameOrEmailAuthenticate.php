<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 30/03/2017
 * Time: 17:42
 */

namespace App\Auth;


use Cake\Auth\BaseAuthenticate;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;

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
        $fields = $this->_config['fields'];
        if (!$this->checkFields($request, $fields)) {
            return false;
        }
        $passwordHasher = new DefaultPasswordHasher();
        $username = $request->getData($fields['username']);
        $password = $request->getData($fields['password']);
        $conditions = [
            'Users.username' => $username,
        ];
        if (Validation::email($username)) {
            $conditions = [
                'Users.email' => $username,
            ];
        }
        $user = TableRegistry::get('Users')->find('all', ['conditions' => $conditions])->first();
        if(empty($user))
        {
            return false;
        }
        if (!$passwordHasher->check($password,$user['password'])) {
            return false;
        }
        return $user;
    }

    protected function checkFields(Request $request, $fields)
    {
        foreach ([$fields['username'], $fields['password']] as $field) {
            $value = $request->getData($field);
            if (empty($value) || !is_string($value)) {
                return false;
            }
        }
        return true;
    }
}