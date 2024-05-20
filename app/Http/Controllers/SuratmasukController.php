<?php

namespace App\Http\Controllers;

use App\Models\Suratmasuk;
use Illuminate\Http\Request;



class SuratmasukController extends Controller
{
    public function index(){
        $data = Suratmasuk::all();
        return view('datasurat', compact('data'));
}

public function tambahsurat(){
    return view('tambahdata');
}

public function insertdata(Request $request){
    Suratmasuk::create($request->all());
    return redirect()->route('surat')->with('success','Data Berhasil Ditambahkan');
}

public function tampilkandata($id){
    
    $data = Suratmasuk::find($id);
    
    return view('tampildata',compact('data'));
}

public function updatedata(Request $request, $id){
    
    $data = Suratmasuk::find($id);
    $data->update($request->all());
    
    return redirect()->route('surat')->with('success','Data Berhasil Diedit');
}

public function delete($id){
    
    $data = Suratmasuk::find($id);
    $data->delete();
    return redirect()->route('surat')->with('success','Data Berhasil Dihapus');
}
}