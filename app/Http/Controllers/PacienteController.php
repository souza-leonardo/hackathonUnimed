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

    public function agendarEspecialista(){
        $horarioMedico = HorarioMedico::whereHas('medico', $filter = function ($query) {
            $query->where('especialidade', '!=', 'Clinico Geral');
        })->with(['medico' => $filter])->where('status', 'L')->get();


        $collection = $horarioMedico->groupBy('horario_id');

        $horarios = $collection;

        return view('paciente.agendar')->with(compact('horarios'));
    }

    public function storeConsulta(Request $request){

        $agendaConsulta = HorarioMedico::find($request->consulta);

        $aux = $agendaConsulta->horario_id % 6;

        $agendaConsulta->status = "O";
        $agendaConsulta->update();

        $consulta = new Consulta();
        $consulta->paciente_id = \Auth::user()->id;
        $consulta->horario_medico_id = $agendaConsulta->id;
        $consulta->medico_id = $agendaConsulta->medico_id;
        switch ($aux){
            case 1:
                $consulta->data_consulta = "2018-11-26 00:00:00";
                break;
            case 2:
                $consulta->data_consulta = "2018-11-27 00:00:00";
                break;
            case 3:
                $consulta->data_consulta = "2018-11-28 00:00:00";
                break;
            case 4:
                $consulta->data_consulta = "2018-11-29 00:00:00";
                break;
            case 5:
                $consulta->data_consulta = "2018-11-30 00:00:00";
                break;
            case 0:
                $consulta->data_consulta = "2018-12-01 00:00:00";
                break;
        }

        $consulta->save();

        \Session::flash('success', 'Consulta agendada com sucesso');
        return redirect()->route('home');
    }
}
