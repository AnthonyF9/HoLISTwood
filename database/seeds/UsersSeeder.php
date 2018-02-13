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
        $users = [];
        $date = new DateTime();

        $users[]= [
          'name' => 'LeMagicien',
          'email' => 'guy.de.bergahel@gmail.com',
          'password' => bcrypt('aqwzsx'),
          'role' => 'admin',
          'created_at' => $date->format('Y-m-d H:i:s'),
          'updated_at' => $date->format('Y-m-d H:i:s'),
        ];

        $users[]= [
          'name' => 'Skyron',
          'email' => 'sky@gmail.com',
          'password' => bcrypt('azerty'),
          'role' => 'mod',
          'created_at' => $date->format('Y-m-d H:i:s'),
          'updated_at' => $date->format('Y-m-d H:i:s'),
        ];

        $users[]= [
          'name' => 'Le Roi des Chats',
          'email' => 'contact@leroideschats.com',
          'password' => bcrypt('miaoumiaou'),
          'role' => 'user',
          'created_at' => $date->format('Y-m-d H:i:s'),
          'updated_at' => $date->format('Y-m-d H:i:s'),
        ];

        $users[]= [
          'name' => 'Antoine',
          'email' => 'quidelantoine@gmail.com',
          'password' => bcrypt('michel'),
          'role' => 'admin',
          'created_at' => $date->format('Y-m-d H:i:s'),
          'updated_at' => $date->format('Y-m-d H:i:s'),
        ];

        DB::table('users')->insert($users);
    }
}
