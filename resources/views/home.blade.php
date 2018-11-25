@extends('layouts.app')

@section('content-title','Início')

@section('css')
    <link href="{{asset('css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
@endsection

@section('help')
    <p>Aqui, você tem acesso a informações como: Todos os serviços abertos no momento, todos os clientes, próximos 10 pagamentos para receber, últimos 10 pagamentos recebidos
    e acesso rápido para criar um novo serviço, cadastrar um novo cliente ou usuário e para visualizar os relatórios.</p>

@endsection

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Início</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Start Page Content -->
    <!--<div class="row">
        <div class="col-md-3">
            <div class="card bg-primary-dark p-20">
                <div class="media widget-ten">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-bag f-s-40"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2 class="color-white">278</h2>
                        <p class="m-b-0">Novos Serviços</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-pink p-20">
                <div class="media widget-ten">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-user f-s-40"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2 class="color-white">278</h2>
                        <p class="m-b-0">Novos Clientes</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success p-20">
                <div class="media widget-ten">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-vector f-s-40"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2 class="color-white">$27647</h2>
                        <p class="m-b-0">Bounce Rate</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger p-20">
                <div class="media widget-ten">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-location-pin f-s-40"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2 class="color-white">278</h2>
                        <p class="m-b-0">Total Visitor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="row text-center">
        <div class="col-lg-3">
            <a href="{{route('servicos.novo')}}" class="btn btn-outline-danger btn-rounded btn-block">Novo Serviço</a>
        </div>
        <div class="col-lg-3">
            <a href="{{route('clientes.novo')}}" class="btn btn-outline-info btn-rounded btn-block">Novo Cliente</a>
        </div>
        <div class="col-lg-3">
            <a href="{{route('usuarios.novo')}}" class="btn btn-outline-success btn-rounded btn-block">Novo Usuário</a>
        </div>
        <div class="col-lg-3">
            <a href="{{route('relatorios.index')}}" class="btn btn-outline-warning btn-rounded btn-block">Relatórios</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="card card-outline-success">
                    <h5 class="card-header text-white">
                        <b><span class="fa fa-legal"></span>  Serviços Abertos</b>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="lista-servicos" class="display nowrap table table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Data de Criação</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <h5 class="card-header text-white">
                        <b><span class="fa fa-address-card"></span>  Clientes</b>
                    </h5>
                    <div class="card-body">
                        <h3 class="text-center text-primary">Pessoa Física</h3>
                        <div class="table-responsive">
                            <table id="lista-clientes-pf" class="display nowrap table table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <h3 class="text-center text-primary">Pessoa Jurídica</h3>
                        <div class="table-responsive">
                            <table id="lista-clientes-pj" class="display nowrap table table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Razão Social</th>
                                    <th>Nome Fantasia</th>
                                    <th>CNPJ</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-white">
                        <b><span class="fa fa-calendar"></span>  Pagamentos a Receber</b>
                    </h5>
                    <div class="card-body">
                        @if($pagamentos_a_receber->isNotEmpty())
                            <div class="table-responsive">
                                <table class="display nowrap table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th>Vencimento</th>
                                        <th>Valor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pagamentos_a_receber as $pagamento)
                                        <tr>
                                            <td>{{\App\Http\Controllers\ClienteController::getNome($pagamento->servico->cliente_id)}}</td>
                                            <td>{{$pagamento->servico->nome}}</td>
                                            <td>{{\Carbon\Carbon::parse($pagamento->data_a_receber)->format('d/m/Y')}}</td>
                                            <td>@real($pagamento->valor-$pagamento->valor_recebido)</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-primary">Nenhum pagamento para receber</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-outline-warning">
                    <h5 class="card-header text-white">
                        <b><span class="fa fa-address-card"></span>  Pagamentos Recebidos Neste Mês</b>
                    </h5>
                    <div class="card-body">
                        @if($pagamentos->isNotEmpty())
                            <div class="table-responsive">
                                <table class="display nowrap table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pagamentos as $pagamento)
                                        <tr>
                                            <td>{{\App\Http\Controllers\ClienteController::getNome($pagamento->servico->cliente_id)}}</td>
                                            <td>{{$pagamento->servico->nome}}</td>
                                            <td>{{\Carbon\Carbon::parse($pagamento->data)->format('d/m/Y')}}</td>
                                            <td>@real($pagamento->valor)</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-primary">Nenhum pagamento recebido neste mês ainda</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/lib/datatables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            var table = $("#lista-servicos").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('servicos.datatables') !!}',
                    error: function(result){
                        alert("Ocorreu algum erro ao buscar os serviços!");
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'data_cadastro', name: 'data_cadastro' },
                    { data: 'valor', name: 'valor' },
                ],
                // "columnDefs": [
                //     { "width": "45%", "targets": 0 }
                // ],
                "order": [[4, "desc"]],
                "lengthMenu": [10, 20, 30],
                "language": {
                    "lengthMenu": "Mostrando _MENU_ serviços por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_ de um total de _MAX_ serviços",
                    "infoEmpty": "Nenhum serviço encontrado",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primeira",
                        "last":       "Última",
                        "next":       "Próxima",
                        "previous":   "Anterior"
                    },
                    "loadingRecords": "Carregando...",
                    "processing":     "Carregando...",
                    "emptyTable":     "Nenhum serviço cadastrado!"
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    let d = null;
                    if(aData.data_cadastro){
                        d = aData.data_cadastro.split('-');
                        $('td:eq(3)', nRow).html(d[2]+'/'+d[1]+'/'+d[0]);
                    }
                    $('td:eq(4)', nRow).html(Number(aData.valor).formatReal());
                    return nRow;
                }
            });
            $('#lista-servicos tbody').on( 'click', 'tr', function () {
                window.location.href = "{{url('/servicos')}}"+"/"+table.row( this ).data().id+'/detalhes';
            });

            var table_pf = $("#lista-clientes-pf").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('clientes.datatables-pf') !!}',
                    error: function(result){
                        alert("Ocorreu algum erro ao buscar os clientes!");
                    }
                },
                columns: [
                    { data: 'cliente_id', name: 'cliente_id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'cpf', name: 'cpf' },
                ],
                // "columnDefs": [
                //     { "width": "45%", "targets": 0 }
                // ],
                "order": [[1, "asc"]],
                "lengthMenu": [10, 20, 30],
                "language": {
                    "lengthMenu": "Mostrando _MENU_ clientes por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_ de um total de _MAX_ clientes",
                    "infoEmpty": "Nenhum cliente encontrado",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primeira",
                        "last":       "Última",
                        "next":       "Próxima",
                        "previous":   "Anterior"
                    },
                    "loadingRecords": "Carregando...",
                    "processing":     "Carregando...",
                    "emptyTable":     "Nenhum cliente cadastrado!"
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    var cpf = aData.cpf;
                    var string_cpf = cpf.substr(0,3)+"."+cpf.substr(3,3)+"."+cpf.substr(6,3)+"-"+cpf.substr(9,2);
                    $('td:eq(2)', nRow).html(string_cpf);
                    return nRow;
                }
            });
            $('#lista-clientes-pf tbody').on( 'click', 'tr', function () {
                window.location.href = "{{url('/clientes')}}"+"/"+table_pf.row( this ).data().cliente_id+'/detalhes';
            });


            /*
            Tabela de pessoa Jurídica
             */
            var table_pj = $("#lista-clientes-pj").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": '{!! route('clientes.datatables-pj') !!}',
                    error: function(result){
                        alert("Ocorreu algum erro ao buscar os serviços!");
                    }
                },
                columns: [
                    { data: 'cliente_id', name: 'cliente_id' },
                    { data: 'razao_social', name: 'razao_social' },
                    { data: 'nome_fantasia', name: 'nome_fantasia' },
                    { data: 'cnpj', name: 'cnpj' },
                ],
                // "columnDefs": [
                //     { "width": "45%", "targets": 0 }
                // ],
                "order": [[1, "asc"]],
                "lengthMenu": [10, 20, 30],
                "language": {
                    "lengthMenu": "Mostrando _MENU_ clientes por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_ de um total de _MAX_ clientes",
                    "infoEmpty": "Nenhum cliente encontrado",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primeira",
                        "last":       "Última",
                        "next":       "Próxima",
                        "previous":   "Anterior"
                    },
                    "loadingRecords": "Carregando...",
                    "processing":     "Carregando...",
                    "emptyTable":     "Nenhum cliente cadastrado!"
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    var cnpj = aData.cnpj;
                    var string_cnpj = cnpj.substr(0,2)+"."+cnpj.substr(2,3)+"."+cnpj.substr(5,3)+"/"+cnpj.substr(8,4)+"-"+cnpj.substr(12,2);
                    $('td:eq(3)', nRow).html(string_cnpj);
                    return nRow;
                }
            });
            $('#lista-clientes-pj tbody').on( 'click', 'tr', function () {
                window.location.href = "{{url('/clientes')}}"+"/"+table_pj.row( this ).data().cliente_id+'/detalhes';
            })
        });
    </script>
@endpush
