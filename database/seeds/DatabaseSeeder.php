<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MainTest::class);
    }
}

class MainTest extends Seeder
{
    public function run()
    {
        DB::table('customer')->insert(array(
            'name'       => 'sohag',
            'email'     => 'jaidul26@gmail.com',
            'password'  => bcrypt(12345678),
            'role'      => 'U',
            'active'    => 1
        ));
        $this->command->info('Customer added');
    }
}
