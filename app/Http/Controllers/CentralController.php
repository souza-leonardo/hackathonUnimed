<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\HorarioMedico;
use App\User;
use Illuminate\Http\Request;

class CentralController extends Controller
{
    public function agendar(){
        $horarioMedico = HorarioMedico::with('medico')->where('status', 'L')->get();

        $collection = $horarioMedico->groupBy('horario_id');

        $horarios = $collection;

        $pacientes = User::where('tipo_usuario', 2)->get();
        return view('central.agendar')->with(compact('horarios', 'pacientes'));
    }

    public function store(Request $request){
        $agendaConsulta = HorarioMedico::find($request->consulta);

        $aux = $agendaConsulta->horario_id % 6;

        $agendaConsulta->status = "O";
        $agendaConsulta->update();

        $consulta = new Consulta();
        $consulta->paciente_id = $request->paciente;
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
