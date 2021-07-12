<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_buku',
        'nomor_buku',
        'id_kategori',
        'pengarang',
        'id_penerbit',
        'cover',
        'status'
    ];

    static function uploadPhoto($photo)
    {
        $image_path = null;
        if ($photo && $photo->isValid()) {
            $image_path = $photo->store('public/books');
        }
        return $image_path ? explode('public/books/', $image_path)[1] : $image_path;
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori', 'id_kategori');
    }
    public function penerbit()
    {
        return $this->belongsTo('App\Models\Penerbit', 'id_penerbit', 'id_penerbit');
    }
}
