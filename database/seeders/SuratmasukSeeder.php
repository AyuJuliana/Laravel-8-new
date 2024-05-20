<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratmasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suratmasuks')->insert([
            'no_surat'=>'001/A/2024',
            'perihal_surat'=>'pernikahan',
            'nama_pemohon'=>'Ana Aneska',
            'notelp_pemohon'=>'081939197658',
            'status'=>'pending',
        ]);
    }
}
