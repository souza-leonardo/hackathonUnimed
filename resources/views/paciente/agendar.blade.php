@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <div class="card">
                <form action="{{ route('pacientes.storeConsulta') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="table table-bordered">
                        <h3 class="text-center">Selecione um horário disponível</h3>
                        <table style="width: 100%;">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Segunda</th>
                                <th class="text-center">Terça</th>
                                <th class="text-center">Quarta</th>
                                <th class="text-center">Quinta</th>
                                <th class="text-center">Sexta</th>
                                <th class="text-center">Sábado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="form-group">
                                <tr>
                                    <td>07:00 - 08:00</td>
                                    @for($i = 1; $i <= 6; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>08:00 - 09:00</td>
                                    @for($i = 7; $i <= 12; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                            @foreach($horarios[$i] as $hr)
                                                <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                            @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>09:00 - 10:00</td>
                                    @for($i = 13; $i <= 18; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>10:00 - 11:00</td>
                                    @for($i = 19; $i <= 24; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>11:00 - 12:00</td>
                                    @for($i = 25; $i <= 30; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>12:00 - 13:00</td>
                                    @for($i = 31; $i <= 36; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>13:00 - 14:00</td>
                                    @for($i = 37; $i <= 42; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>14:00 - 15:00</td>
                                    @for($i = 43; $i <= 48; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>15:00 - 16:00</td>
                                    @for($i = 49; $i <= 54; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>16:00 - 17:00</td>
                                    @for($i = 55; $i <= 60; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>17:00 - 18:00</td>
                                    @for($i = 61; $i <= 66; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>18:00 - 19:00</td>
                                    @for($i = 67; $i <= 72; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    <td>19:00 - 20:00</td>
                                    @for($i = 73; $i <= 78; $i++)
                                        @if(isset($horarios[$i]))
                                            <td>
                                                @foreach($horarios[$i] as $hr)
                                                    <input type="radio" name="consulta" value="{{$hr['id']}}">{{$hr['medico']['nome']}}<br>
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                            </div>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <input type="submit" name="enviar" value="Cadastrar" class="btn btn-success col-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection