<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioMedico extends Model
{
    protected $table = 'horario_medico';

    protected $fillable = [
        'medico_id',
        'horario_id',
        'semana_id',
        'status',
    ];

    public $timestamps = true;

    public function medico(){
        return $this->belongsTo('App\User', 'medico_id', 'id');
    }
}
