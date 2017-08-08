<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Taufiq',
            'email' => 'taufiq@nufolder.com',
            'password' => bcrypt('olxajaktaufiq2017!'),
            'is_active' => 1,
            'level' => 3,
        ]);
    }
}
