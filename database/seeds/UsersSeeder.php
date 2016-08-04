<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'type' => 'admin',
                'email' => 'canggihgultom@gmail.com',
                'password' => \PluginCommonSurvey\Helper\Hashed\hash_password('admin12345')
            ],
        ]);
    }
}
