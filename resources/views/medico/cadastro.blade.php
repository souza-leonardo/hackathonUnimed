@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('medicos.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                            <div class="col-6 form-group">
                                <label for="especialidade">Especialidade</label>
                                <select name="especialidade" id="especialidade" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="1">Cardiologista</option>
                                    <option value="2">Pediatra</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" value="Cadastrar" name="enviar" class="btn btn-success col-5">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection