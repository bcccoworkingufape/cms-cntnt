<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tipo',
        'area',
        'descricao',
        'link',
        'img',
        'userID',
    ];

    public function dono(){
        return $this->belongsTo('App\Models\User','userID')->withTrashed();
    }
}
