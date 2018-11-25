<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\HorarioMedico;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function agendar(){
        $consulta = Consulta::where('paciente_id', \Auth::user()->id)->where('status', "A")->first();
        if($consulta){
            \Session::flash('warning', 'Você já tem uma consulta marcada');
            return redirect()->route('home');
        }
        $horarioMedico = HorarioMedico::with('medico')->where('status', 'L')->get();

        $collection = $horarioMedico->groupBy('horario_id');

        $horarios = $collection;
        return view('paciente.agendar')->with(compact('horarios'));
    }

    public function storeConsulta(Request $request){
//        dd($request);
        $agendaConsulta = HorarioMedico::find($request->consulta);
        $agendaConsulta->status = "O";
        $agendaConsulta->update();

        $consulta = new Consulta();
        $consulta->paciente_id = \Auth::user()->id;
        $consulta->medico_id = $agendaConsulta->medico_id;
        $consulta->data_consulta = "2018-11-25 00:00:00";
        $consulta->save();

        \Session::flash('success', 'Consulta agendada com sucesso');
        return redirect()->route('home');
    }
}
