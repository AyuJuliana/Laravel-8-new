<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valsurat; // Mengimpor model Valsurat

class PageController extends Controller
{
    public function __construct()
    {
        // Tidak perlu dependency injection untuk controller lain jika tidak digunakan
    }
    
  
    public function pelaporan()
    {
        return view('pelaporan');
    }
}