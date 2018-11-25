<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'horario_medico_id',
        'paciente_id',
        'status',
        'data',
        'consulta_id',
    ];

    public function paciente(){
        return $this->belongsTo('App\User', 'paciente_id', 'id');
    }
}
