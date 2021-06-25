<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surats')->insert([
            'nomor_surat' => '123',
            'tanggal_surat' => '2021-04-15',
            'pengirim' => 'Hadi',
            'data_file' => '',
        ]);
    }
}
