<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'usuario_id',
        'especialidade',
    ];

    public function usuario(){
        return $this->belongsTo('App\User', 'usuario_id', 'id');
    }
}
