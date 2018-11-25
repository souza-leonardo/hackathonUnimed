@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="table">
                    <h3 class="text-center">Consultas Agendadas</h3>
                    <table style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Paciente</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($consultas as $con)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($con['data_consulta'])->format('d/m/Y H:i')}}</td>
                                    <td>{{$con['paciente']['nome']}}</td>
                                    <td><a href="{{route('medicos.detalheConsulta', ['id' => $con['id']])}}" style="color: blue;"><i class="fa fa-edit"></i> Abrir Consulta</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection