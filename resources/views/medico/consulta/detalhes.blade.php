@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <div class="card">
                <h5><b>Paciente:</b> {{$consulta->paciente->nome}}</h5>
                <br>
                <form>
                    <div class="row justify-content-center">
                        <div class="col-6 form-group">
                            <label>Observação</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection