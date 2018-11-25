@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="table">
                    <h3 class="text-center">Procedimentos Abertos</h3>
                    <table style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Data de Abertura</th>
                            <th>Paciente</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Telefone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($procedimentos as $proc)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($proc['consulta']['created_at'])->format('d/m/Y H:i')}}</td>
                                <td>{{$proc['consulta']['paciente']['nome']}}</td>
                                <td>{{$proc['descricao']}}</td>
                                <td>
                                    @if($proc['status'] == "A")
                                        Aberta
                                    @elseif($proc['status'] == "F")
                                        Finalizado
                                    @endif
                                </td>
                                <td>{{$proc['consulta']['paciente']['email']}}</td>
                                <td>{{$proc['consulta']['paciente']['telefone']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection