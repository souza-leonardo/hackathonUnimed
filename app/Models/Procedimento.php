<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'descricao',
        'consulta_id',
        'status',
    ];
}
