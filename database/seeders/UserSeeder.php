<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'type' => 'admin',
            'title' => 'Mr',
            'converse' => 'admin',
            'nickname' => 'admin',
            'address' => ' ',
            'zip_code' => ' ',
            'area' => ' ',
            'country' => ' ',
            'mobile' => ' ',
            'email' => 'admin@admin.com',
            'role'  =>'admin',
            'password' => Hash::make('password')
        ]);
    }
}
