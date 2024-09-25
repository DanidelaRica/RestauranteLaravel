<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory([
            'name' => 'Dani',
            'email' => 'ddr0001@alu.medac.com',
            'password' => bcrypt('123456'),
            'is_admin'  => 1,
            'surname' =>'Ramirez',
            'phone' =>'777777777'
        ])->create();
    }
}
