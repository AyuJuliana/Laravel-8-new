<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class LetterController extends Controller
{
    public function index()
    {
        // Menampilkan daftar surat yang perlu divalidasi oleh operator
        $letters = Letter::where('status', 'pending')->with('user')->get();
        return view('index', compact('letters'));
    }

    public function validateByOperator($id)
    {
        // Validasi surat oleh operator
        $letter = Letter::findOrFail($id);
        // Lakukan validasi, misalnya dengan mengubah status
        $letter->status = 'validated_operator';
        $letter->save();

        return redirect()->route('index')->with('success', 'Surat berhasil divalidasi oleh operator.');
    }

    public function secretaryIndex()
    {
        // Menampilkan daftar surat yang perlu divalidasi oleh sekretaris desa
        $letters = Letter::where('status', 'validated_operator')->get();
        return view('index', ['letters' => $letters]);
    }

    public function validateBySecretary(Request $request, $id)
    {
        $letter = Letter::find($id);
        $letter->status = 'validated_secretary';
        $letter->nomor_surat = $request->nomor_surat;
        $letter->save();

        return redirect()->route('letters.secretary')->with('success', 'Surat berhasil divalidasi oleh Sekretaris Desa.');
    }

    public function chiefIndex()
    {
        // Menampilkan daftar surat yang perlu divalidasi oleh kepala desa
        $letters = Letter::where('status', 'validated_secretary')->get();
        return view('index', compact('letters'));
    }

    public function validateByChief($id)
    {
        $letter = Letter::findOrFail($id);
    
        // Validasi bahwa surat sudah divalidasi oleh sekretaris desa
        if ($letter->status === 'validated_secretary') {
            // Simulasikan proses tanda tangan digital
            // Misalnya, kita set status surat menjadi 'validated_chief' dan simpan tanda tangan
            $letter->status = 'validated_chief';
            $letter->signed_by_chief = true; // Menyimpan bahwa surat sudah ditandatangani oleh kepala desa
    
            // Simpan perubahan
            $letter->save();
    
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Surat berhasil divalidasi oleh Kepala Desa.');
        } else {
            // Redirect dengan pesan error jika surat belum divalidasi oleh sekretaris desa
            return redirect()->back()->with('error', 'Surat belum divalidasi oleh Sekretaris Desa.');
        }
    }
    

    public function addNote(Request $request, $id)
    {
        // Menambah catatan kekurangan oleh operator
        $letter = Letter::findOrFail($id);
        $letter->note = $request->input('note');
        $letter->save();

        return redirect()->back()->with('success', 'Catatan kekurangan berhasil ditambahkan.');
    }


}
