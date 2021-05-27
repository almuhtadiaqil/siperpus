<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pengajuan','no_pendaftaran','pemasok','invoice','bl','valuta','kurs','nilai_cif','nilai_barang','barang','tgl_msk_start','tgl_msk_finish','jumlah_brg','jumlah_kemasan','jenis_kemasan','merk_kemasan','bruto','netto','volume'
    ];
}
