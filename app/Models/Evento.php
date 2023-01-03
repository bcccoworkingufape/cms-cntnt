<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'data',
        'descricao',
        'userID',
    ];

    public function dono(){
        return $this->belongsTo('App\Models\User','userID')->withTrashed();
    }
}
