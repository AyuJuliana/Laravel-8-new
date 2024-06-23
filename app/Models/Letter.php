<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Letter extends Model
{
    use HasFactory;

    // Definisi atribut yang dapat diisi
    protected $fillable = [
        'judul', 'perihal', 'attachment', 'status', 'nomor_surat', 'signed_by_chief'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
