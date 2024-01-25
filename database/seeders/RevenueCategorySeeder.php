<?php

namespace Database\Seeders;

use App\Models\RevenueCategory;
use Illuminate\Database\Seeder;

class RevenueCategorySeeder extends Seeder
{
    public function run()
    {
        RevenueCategory::factory()->count(10)->create();
    }
}
