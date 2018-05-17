<?php

class UsersTableSeeder extends AbstractDatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'email' => 'info@mypopulus.com'
        ]);
    }
}
