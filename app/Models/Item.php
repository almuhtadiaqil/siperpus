<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id','name','hs_code','category','kondisi','jenis_satuan','stok'
    ];

    protected $hidden = [

    ];
}
