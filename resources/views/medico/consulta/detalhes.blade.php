@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <div class="card">
                <h5><b>Paciente:</b> {{$consulta->paciente->nome}}</h5>
                <br>
                <div>
                    <input type="submit" value="Finalizar Consulta" class="btn btn-success col-4 pull-left" data-toggle="modal" data-target="#modalFinalizar">
                    <input type="button" value="Realizar Encaminhamento" class="btn btn-primary col-4 pull-right" data-toggle="modal" data-target="#modalEncaminhar">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalFinalizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b>Finalizar Atendimento</b>
                        <br>
                        <small>Paciente: <b>{{$consulta->paciente->nome}}</b></small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 0;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('medicos.finalizarConsulta')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="consulta" value="{{$consulta->id}}">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="form-group col-8">
                                <label for="observacoes">Observações</label>
                                <textarea name="observacoes" id="observacoes" class="form-control" rows="5" style="height: 8em;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar-modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Finalizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEncaminhar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b>Finalizar Atendimento</b>
                        <br>
                        <small>Paciente: <b>{{$consulta->paciente->nome}}</b></small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 0;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('medicos.encaminhar')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="consulta" value="{{$consulta->id}}">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="form-group col-8">
                                <label for="observacoes">Observações</label>
                                <textarea name="observacoes" id="observacoes" class="form-control" rows="5" style="height: 8em;"></textarea>
                            </div>

                            <div class="form-group col-8">
                                <label>Opções</label><br>
                                <input type="checkbox" value="Especialista" name="opcoes[]"> Especialista<br>
                                <input type="checkbox" value="Exames" name="opcoes[]"> Exames<br>
                                <input type="checkbox" value="Terapias" name="opcoes[]"> Terapias<br>
                                <input type="checkbox" value="Medicamentos" name="opcoes[]"> Medicamentos<br>
                                <input type="checkbox" value="Retorno" name="opcoes[]"> Retorno<br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-fechar-modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Finalizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection