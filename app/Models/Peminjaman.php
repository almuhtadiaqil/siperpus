<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';

    protected $fillable = [
        'id_buku',
        'nama_peminjam',
        'umur_peminjam',
        'no_hp',
        'email',
        'pekerjaan',
        'nama_instansi',
        'alamat_rumah',
        'alamat_instansi',
        'status',
        'waktu_peminjaman',
        'waktu_pengembalian'
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'id_buku', 'id_buku');
    }
}
