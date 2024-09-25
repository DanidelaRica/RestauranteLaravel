<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CreditCard;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CreditCard::factory([
            'num_card' => '42424242424242',

        ])->create();

        CreditCard::factory([
            'num_card' => '42424242424242',

        ])->create();
    }
}
