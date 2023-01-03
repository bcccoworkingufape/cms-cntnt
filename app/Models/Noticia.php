<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'link',
        'img',
        'userID',
    ];

    public function dono(){
        return $this->belongsTo('App\Models\User','userID')->withTrashed();
    }
}
