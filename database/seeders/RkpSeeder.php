<?php

namespace Database\Seeders;

use App\Models\RkpModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RkpSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array(
            'id_bidang' => 1,
            'sub_bidang' => 'Sub bidang kebudayaan',
            'jenis_kegiatan' => 'Pembelajaran grup kesenian',
            'id_lokasi' => 1,
            'perkiraan_volume' => '1 orang',
            'sasaran' => 'Kepala desa',
            'pelaksanaan' => 'Satu bulan',
            'biaya' => 1000000,
            'sumber' => 'ODS',
            'swa_kelola' => true,
            'kerja_sama' => true,
            'pihak_ketiga' => false,
            'rencana_pelaksanaan' => $date,
            'created_at' => $date,
            'updated_at' => $date
        );
        RkpModel::create($data);
    }
}
