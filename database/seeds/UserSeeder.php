<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'super_admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->attachRole('super_admin');
    }
}
