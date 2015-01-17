<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::truncate();

        User::create(array(
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'superuser' => true,
        ));
    }
}