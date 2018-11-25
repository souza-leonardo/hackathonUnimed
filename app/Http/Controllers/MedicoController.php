<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function cadastro(){
        return view('medico.cadastro');
    }

    public function cadastroAgenda(){
        return view('medico.agenda');
    }

    public function store(Request $request){
        $medico = new Medico();
        $medico->nome = $request->nome;
        $medico->save();

        \Session::flash('success', 'Médico cadastrado com sucesso');
        return redirect()->route('medicos.cadastro');
    }

    public function storeAgenda(Request $request){
        if(isset($request->horario)){
                foreach ($request->horario as $horario)
                    \DB::table('horario_medico')->insert(['medico_id' => \Auth::user()->id, 'horario_id' => $horario, 'semana_id' => 0]);

            \Session::flash('success', 'Agenda cadastrada com sucesso');
            return redirect()->route('home');
        }

    }

    public function listarConsulta(){
        $consultas = Consulta::with('paciente')->where('medico_id', \Auth::user()->id)->where('status', "A")->get();

        return view('medico.consulta.listar')->with(compact('consultas'));
    }

    public function detalheConsulta($id){
        $consulta = Consulta::find($id);

        return view('medico.consulta.detalhes')->with(compact('consulta'));
    }
}
