<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create([
            'name' => 'ilham tenriajeng',
            'email' => 'ilhamtenriajeng03@gmail.com',
            'password' => bcrypt('ilham123'),
        ]);

        $admin->assignRole('admin');
    }
}
