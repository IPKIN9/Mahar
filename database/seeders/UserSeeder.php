<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array(
            'name' => 'Admin',
            'username' => 'admin_panel',
            'password' => Hash::make('request_admin'),
            'created_at' => $date,
            'updated_at' => $date,
        );
        User::create($data);
    }
}
