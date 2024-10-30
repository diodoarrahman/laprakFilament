<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kosan',
        'alamat_kosan',
        'jenis_kosan',
        'harga_sewa',
        'kamar_kosong',
        'tersedia',
        'foto_kosan',
    ];
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class);
    }
}
