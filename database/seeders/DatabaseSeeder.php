<?php

namespace Database\Seeders;

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
        $this->call(RevenueCategorySeeder::class);
        $this->call(ExpenseCategorySeeder::class);   
        $this->call(RevenueSeeder::class);
        $this->call(ExpenseSeeder::class);
    }
}