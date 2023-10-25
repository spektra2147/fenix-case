<?php

namespace Database\Seeders;

use App\Models\Devices;
use Illuminate\Database\Seeder;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Devices::factory()
            ->count(50)
            ->create();
    }
}
