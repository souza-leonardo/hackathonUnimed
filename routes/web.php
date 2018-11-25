<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function (){
        return view('layouts.app');
    })->name('home');

    Route::get('/', function (){
        return view('layouts.app');
    });



    Route::group(['prefix' => '/medicos'], function (){
        Route::get('/cadastro', 'MedicoController@cadastro')->name('medicos.cadastro');
        Route::get('/agenda', 'MedicoController@cadastroAgenda')->name('medicos.cadastroAgenda');
        Route::get('/consultas', 'MedicoController@listarConsulta')->name('medicos.listarConsulta');
        Route::get('/{id}/detalhes', 'MedicoController@detalheConsulta')->name('medicos.detalheConsulta');

        Route::post('/storeAgenda', "MedicoController@storeAgenda")->name('medicos.storeAgenda');
        Route::post('/store', "MedicoController@store")->name('medicos.store');
        Route::post('/finalizarConsulta', 'MedicoController@finalizarConsulta')->name('medicos.finalizarConsulta');
        Route::post('/encaminhar', 'MedicoController@encaminhar')->name('medicos.encaminhar');
    });

    Route::group(['prefix' => '/pacientes'], function(){
        Route::get('/agendar', 'PacienteController@agendar')->name('pacientes.agendar');
        Route::post('/storeConsulta', 'PacienteController@storeConsulta')->name('pacientes.storeConsulta');
    });
});

Auth::routes();