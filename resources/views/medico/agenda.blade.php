@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <h3 class="text-center">Selecione os horários disponíveis para atendimento</h3>
            <div class="card">
            <form action="{{ route('medicos.storeAgenda') }}" method="POST">
                {{ csrf_field() }}
                <div class="table">
                    <table style="width: 100%;">
                        <thead>
                        <tr>
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
                                <td><input type="checkbox" name="horario[]" value="1"> 07:00 - 08:00</td>
                                <td><input type="checkbox" name="horario[]" value="2"> 07:00 - 08:00</td>
                                <td><input type="checkbox" name="horario[]" value="3"> 07:00 - 08:00</td>
                                <td><input type="checkbox" name="horario[]" value="4"> 07:00 - 08:00</td>
                                <td><input type="checkbox" name="horario[]" value="5"> 07:00 - 08:00</td>
                                <td><input type="checkbox" name="horario[]" value="6"> 07:00 - 08:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="7"> 08:00 - 09:00</td>
                                <td><input type="checkbox" name="horario[]" value="8"> 08:00 - 09:00</td>
                                <td><input type="checkbox" name="horario[]" value="9"> 08:00 - 09:00</td>
                                <td><input type="checkbox" name="horario[]" value="10"> 08:00 - 09:00</td>
                                <td><input type="checkbox" name="horario[]" value="11"> 08:00 - 09:00</td>
                                <td><input type="checkbox" name="horario[]" value="12"> 08:00 - 09:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="13"> 09:00 - 10:00</td>
                                <td><input type="checkbox" name="horario[]" value="14"> 09:00 - 10:00</td>
                                <td><input type="checkbox" name="horario[]" value="15"> 09:00 - 10:00</td>
                                <td><input type="checkbox" name="horario[]" value="16"> 09:00 - 10:00</td>
                                <td><input type="checkbox" name="horario[]" value="17"> 09:00 - 10:00</td>
                                <td><input type="checkbox" name="horario[]" value="18"> 09:00 - 10:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="19"> 10:00 - 11:00</td>
                                <td><input type="checkbox" name="horario[]" value="20"> 10:00 - 11:00</td>
                                <td><input type="checkbox" name="horario[]" value="21"> 10:00 - 11:00</td>
                                <td><input type="checkbox" name="horario[]" value="22"> 10:00 - 11:00</td>
                                <td><input type="checkbox" name="horario[]" value="23"> 10:00 - 11:00</td>
                                <td><input type="checkbox" name="horario[]" value="24"> 10:00 - 11:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="25"> 11:00 - 12:00</td>
                                <td><input type="checkbox" name="horario[]" value="26"> 11:00 - 12:00</td>
                                <td><input type="checkbox" name="horario[]" value="27"> 11:00 - 12:00</td>
                                <td><input type="checkbox" name="horario[]" value="28"> 11:00 - 12:00</td>
                                <td><input type="checkbox" name="horario[]" value="29"> 11:00 - 12:00</td>
                                <td><input type="checkbox" name="horario[]" value="30"> 11:00 - 12:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="31"> 12:00 - 13:00</td>
                                <td><input type="checkbox" name="horario[]" value="32"> 12:00 - 13:00</td>
                                <td><input type="checkbox" name="horario[]" value="33"> 12:00 - 13:00</td>
                                <td><input type="checkbox" name="horario[]" value="34"> 12:00 - 13:00</td>
                                <td><input type="checkbox" name="horario[]" value="35"> 12:00 - 13:00</td>
                                <td><input type="checkbox" name="horario[]" value="36"> 12:00 - 13:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="37"> 13:00 - 14:00</td>
                                <td><input type="checkbox" name="horario[]" value="38"> 13:00 - 14:00</td>
                                <td><input type="checkbox" name="horario[]" value="39"> 13:00 - 14:00</td>
                                <td><input type="checkbox" name="horario[]" value="40"> 13:00 - 14:00</td>
                                <td><input type="checkbox" name="horario[]" value="41"> 13:00 - 14:00</td>
                                <td><input type="checkbox" name="horario[]" value="42"> 13:00 - 14:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="43"> 14:00 - 15:00</td>
                                <td><input type="checkbox" name="horario[]" value="44"> 14:00 - 15:00</td>
                                <td><input type="checkbox" name="horario[]" value="45"> 14:00 - 15:00</td>
                                <td><input type="checkbox" name="horario[]" value="46"> 14:00 - 15:00</td>
                                <td><input type="checkbox" name="horario[]" value="47"> 14:00 - 15:00</td>
                                <td><input type="checkbox" name="horario[]" value="48"> 14:00 - 15:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="49"> 15:00 - 16:00</td>
                                <td><input type="checkbox" name="horario[]" value="50"> 15:00 - 16:00</td>
                                <td><input type="checkbox" name="horario[]" value="51"> 15:00 - 16:00</td>
                                <td><input type="checkbox" name="horario[]" value="52"> 15:00 - 16:00</td>
                                <td><input type="checkbox" name="horario[]" value="53"> 15:00 - 16:00</td>
                                <td><input type="checkbox" name="horario[]" value="54"> 15:00 - 16:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="55"> 16:00 - 17:00</td>
                                <td><input type="checkbox" name="horario[]" value="56"> 16:00 - 17:00</td>
                                <td><input type="checkbox" name="horario[]" value="57"> 16:00 - 17:00</td>
                                <td><input type="checkbox" name="horario[]" value="58"> 16:00 - 17:00</td>
                                <td><input type="checkbox" name="horario[]" value="59"> 16:00 - 17:00</td>
                                <td><input type="checkbox" name="horario[]" value="60"> 16:00 - 17:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="61"> 17:00 - 18:00</td>
                                <td><input type="checkbox" name="horario[]" value="62"> 17:00 - 18:00</td>
                                <td><input type="checkbox" name="horario[]" value="63"> 17:00 - 18:00</td>
                                <td><input type="checkbox" name="horario[]" value="64"> 17:00 - 18:00</td>
                                <td><input type="checkbox" name="horario[]" value="65"> 17:00 - 18:00</td>
                                <td><input type="checkbox" name="horario[]" value="66"> 17:00 - 18:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="67"> 18:00 - 19:00</td>
                                <td><input type="checkbox" name="horario[]" value="68"> 18:00 - 19:00</td>
                                <td><input type="checkbox" name="horario[]" value="69"> 18:00 - 19:00</td>
                                <td><input type="checkbox" name="horario[]" value="70"> 18:00 - 19:00</td>
                                <td><input type="checkbox" name="horario[]" value="71"> 18:00 - 19:00</td>
                                <td><input type="checkbox" name="horario[]" value="72"> 18:00 - 19:00</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="horario[]" value="73"> 19:00 - 20:00</td>
                                <td><input type="checkbox" name="horario[]" value="74"> 19:00 - 20:00</td>
                                <td><input type="checkbox" name="horario[]" value="75"> 19:00 - 20:00</td>
                                <td><input type="checkbox" name="horario[]" value="76"> 19:00 - 20:00</td>
                                <td><input type="checkbox" name="horario[]" value="77"> 19:00 - 20:00</td>
                                <td><input type="checkbox" name="horario[]" value="78"> 19:00 - 20:00</td>
                            </tr>
                        </div>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center">
                    <input type="submit" name="enviar" value="Cadastrar" class="btn btn-success col-5">
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection