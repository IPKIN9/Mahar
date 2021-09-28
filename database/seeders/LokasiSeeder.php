<?php

namespace Database\Seeders;

use App\Models\LokasiModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array(
            'nama_lokasi' => 'Desa Pomayagon',
            'jenis' => 'Desa',
            'created_at' => $date,
            'updated_at' => $date,
        );
        LokasiModel::create($data);
    }
}
