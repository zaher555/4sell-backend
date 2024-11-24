<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name'=>'admin',
           'email'=>'admin@gmail.com',
           'username'=>'admin123',
           'password'=>'admin123',
           'phone'=>'01033306585',
           'role'=>'admin',
           'img'=>'img1' 
        ]);
    }
}
