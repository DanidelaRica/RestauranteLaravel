<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables(['users', 'credit_cards', 'tables']);
        $this->call(UserSeeder::class);
        $this->call(CreditCardSeeder::class);
        $this->call(TableSeeder::class);
    }

    protected function truncateTables(array $tables) {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Deshabilitar la revision de claves ajenas antes de hacer el truncate

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Habilitar la revision de claves ajenas antes de hacer el truncate
    }
}
