<?php

namespace Database\Seeders;

use App\Models\BidangModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array(
            'nama_bidang' => 'Pembinaan Kemasyarakatan',
            'created_at' => $date,
            'updated_at' => $date,
        );
        BidangModel::create($data);
    }
}
