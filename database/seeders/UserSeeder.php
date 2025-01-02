<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'super admin',
            'email' => 'superadmin@app.com',
            'password' => bcrypt('2480123m'),
        ]);

        $user->addRole('super_admin');

    } //end of run
} //end of seeder
