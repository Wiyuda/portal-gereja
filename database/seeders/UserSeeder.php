<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user= User::create([
            'username'=> 'admin',
            'password'=> bcrypt('admin'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
