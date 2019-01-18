<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $primaryKey = 'kode';
    protected $fillable = ['kode','id','nama_resep','slug_nama','bahan','langkah','estimasi','foto'];

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
