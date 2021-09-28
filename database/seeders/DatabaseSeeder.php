<?php

namespace Database\Seeders;

use App\Models\BidangModel;
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
        $this->call(LokasiSeeder::class);
        $this->call(BidangSeeder::class);
        $this->call(RkpSeeder::class);
    }
}
