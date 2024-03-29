<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin HMSI',
            'username' => 'admin',
            'password' => bcrypt('adm1n_')
        ]);

        // $this->call(UserSeeder::class);
    }
}
