<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    const ROLE_SUPER = 0;
    const ROLE_COMMON = 1;
    const ROLE_ALL = [0, 1];

    public static $roles = [
        self::ROLE_SUPER => "Administrador Geral",
       self::ROLE_COMMON =>'Comum'
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->notEmpty('username', 'Campo Obrigatório')
            ->add('username', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Esse nome de usuário já existe, por favor tente outro.'
                ]
            ]);

        $validator
            ->notEmpty('password', 'Campo Obrigatório.');

        $validator
            ->add('confirm_password', 'custom', [
                'rule' => function ($value, $context) {
                    if ($context['data']['password'] != $value) {
                        return false;
                    }
                    return true;
                },
                'message' => 'Erro ao confirmar a senha',
            ]);
        $validator
            ->email('email')
            ->notEmpty('email', 'Campo Obrigatório')
            ->add('email', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Já existe um usuário cadastrado com esse email, por favor tente outro.'
                ]

            ]);

        $validator
            ->integer('role')
            ->notEmpty('role', 'Campo Obrigatório');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

    public function getRoles()
    {
        return self::$roles;
    }
}
