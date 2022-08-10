<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'path',
        'categoria',
        'userID',
        'url'
    ];

    public function dono(){
        return $this->belongsTo('App\Models\User','userID');
    }
}
