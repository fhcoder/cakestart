<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 200; $i++) {
            $data[] = [
                'nome'=>$faker->firstName.' '.$faker->lastName,
                'username' => $faker->colorName,
                'password' => (new \Cake\Auth\DefaultPasswordHasher())->hash('123456'),
                'email'=>$faker->email,
                'role'=>$faker->randomNumber(1),
                'created'=>$faker->dateTime->format('Y-m-d H:i:s')
            ];
        }
        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
