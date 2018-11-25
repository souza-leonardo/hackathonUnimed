<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    public function abertos(){
        $procedimentos = Procedimento::with('consulta.paciente')->where('status', "A")->get();

        return view('procedimento.abertos')->with(compact('procedimentos'));
    }
}
