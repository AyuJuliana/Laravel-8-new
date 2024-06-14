<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suratmasuk; // Mengimpor model Suratmasuk
use App\Http\Controllers\SuratmasukController; // Mengimpor SuratmasukController

class PageController extends Controller
{
    protected $suratmasukController;

    public function __construct(SuratmasukController $suratmasukController)
    {
        $this->suratmasukController = $suratmasukController;
    }

   

    public function index()
    {
        $dataSurat = Suratmasuk::all(); // Mengambil semua data surat dari model Suratmasuk
        return view('validasi', ['dataSurat' => $dataSurat]); // Mengirimkan data surat ke view 'validasi'
    }

    public function pelaporan()
    {
        return view('pelaporan');
    }
}
