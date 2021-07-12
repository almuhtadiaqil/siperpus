<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penerbit',
        'kota_penerbit'
    ];

    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }
}
