<?php

namespace Database\Seeders;

use App\Models\Revenue;
use Illuminate\Database\Seeder;

class RevenueSeeder extends Seeder
{
    public function run()
    {
        Revenue::factory()->count(10)->create();
    }
}