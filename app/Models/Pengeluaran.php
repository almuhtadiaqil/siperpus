<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_aju_bc23','no_pendaftaran_23','no_aju_bc25','no_pendaftaran_25','penerima','invoice','packing_list','valuta','kurs','nilai_cif','nilai_barang','barang','get_out_start','get_out_finish','jumlah_brg','jumlah_kemasan','jenis_kemasan','merk_kemasan','bruto','netto','volume'
    ];
}
