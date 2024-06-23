<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve user IDs for seeding
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Buat data surat
        DB::table('letters')->insert([
            [
                'user_id' => $userIds[array_rand($userIds)],
                'judul' => 'Surat Pengajuan Izin Bangunan',
                'perihal' => 'Kami mengajukan izin untuk membangun rumah tinggal di Jalan Mawar No. 10.',
                'attachment' => 'surat_izin_bangunan.pdf',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'judul' => 'Surat Keterangan Domisili',
                'perihal' => 'Dengan ini kami mohon Surat Keterangan Domisili untuk keperluan administrasi.',
                'attachment' => null,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'judul' => 'Surat Permohonan Keringanan Pajak',
                'perihal' => 'Kami mengajukan permohonan keringanan pajak untuk usaha kecil kami.',
                'attachment' => 'permohonan_pajak.docx',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'judul' => 'Surat Pengajuan Izin Menikah',
                'perihal' => 'Kami mengajukan izin untuk membangun rumah tangga.',
                'attachment' => 'surat_izin_menikah.pdf',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userIds[array_rand($userIds)],
                'judul' => 'Surat Pengajuan Tanah',
                'perihal' => 'Kami mengajukan izin untuk membangun rumah.',
                'attachment' => 'surat_izin_tanah.pdf',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); 
    }
}
