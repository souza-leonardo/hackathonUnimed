<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\HorarioMedico;
use App\Models\Medico;
use App\Models\Procedimento;
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
            $medico = Medico::where('usuario_id', \Auth::user()->id)->first();
                foreach ($request->horario as $horario)
                    \DB::table('horario_medico')->insert(['medico_id' => $medico->id, 'horario_id' => $horario, 'semana_id' => 0]);

            \Session::flash('success', 'Agenda cadastrada com sucesso');
            return redirect()->route('home');
        }

    }

    public function listarConsulta(){
//        dd(\Auth::user()->id);
        $medico = Medico::where('usuario_id', \Auth::user()->id)->first();
//dd($medico->id);
        $consultas = Consulta::with('paciente')->where('medico_id', $medico->id)->where('status', "A")->get();

        return view('medico.consulta.listar')->with(compact('consultas'));
    }

    public function detalheConsulta($id){
        $consulta = Consulta::find($id);

        return view('medico.consulta.detalhes')->with(compact('consulta'));
    }

    public function finalizarConsulta(Request $request){
//        dd($request);
        $consulta = Consulta::find($request->consulta);

        $consulta->observacao = $request->observacoes;
        $consulta->status = "F";
        $consulta->update();

        $horario = HorarioMedico::find($consulta->horario_medico_id);
        $horario->status = "L";
        $horario->update();

        \Session::flash('success', 'Serviço finalizado');
        return redirect()->route('medicos.listarConsulta');
    }

    public function encaminhar(Request $request){
        $consulta = Consulta::find($request->consulta);
        $consulta->observacao = $request->observacoes;
        $consulta->status = "E";
        $consulta->update();

        foreach ($request->opcoes as $aux){
            $procedimento = new Procedimento();
            $procedimento->descricao = $aux;
            $procedimento->consulta_id = $request->consulta;
            $procedimento->save();
        }

        \Session::flash('success', 'Atendimento Encaminhado');
        return redirect()->route('medicos.listarConsulta');
    }
}
