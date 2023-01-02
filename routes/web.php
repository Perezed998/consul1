<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta Medicos
Route::group(['prefix' => 'medicos','milddleware' =>['auth']],function(){

    Route::get('/', 'App\Http\Controllers\DoctorController@index')->name('Doctor.index');
    Route::get('/create', 'App\Http\Controllers\DoctorController@create')->name('Doctor.create');
    Route::post('/create', 'App\Http\Controllers\DoctorController@store')->name('Doctor.store');
    Route::get('/show/{id}', 'App\Http\Controllers\DoctorController@show')->name('Doctor.show');
    Route::get('/edit/{id}', 'App\Http\Controllers\DoctorController@edit')->name('Doctor.edit');
    Route::put('/edit/{id}', 'App\Http\Controllers\DoctorController@update')->name('Doctor.update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\DoctorController@destroy')->name('Doctor.destroy');

});


//Ruta Especialidades
Route::group(['prefix' => 'especialidades', 'middleware' => ['auth']], function () {
    Route::get('/', 'App\Http\Controllers\SpecialtyController@index')->name('Especialidades.index');
    Route::get('/create', 'App\Http\Controllers\SpecialtyController@create')->name('Especialidades.create');
    Route::post('/create', 'App\Http\Controllers\SpecialtyController@store')->name('Especialidades.store');
    Route::get('/show/{id}', 'App\Http\Controllers\SpecialtyController@show')->name('Especialidades.show');
    Route::get('/edit/{id}', 'App\Http\Controllers\SpecialtyController@edit')->name('Especialidades.edit');
    Route::put('/edit/{id}', 'App\Http\Controllers\SpecialtyController@update')->name('Especialidades.update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\SpecialtyController@destroy')->name('Especialidades.destroy');
});

//Ruta Paciente

Route::group(['prefix' => 'pacientes', 'middleware' => ['auth']], function () {
    Route::get('/', 'App\Http\Controllers\PatientController@index')->name('Pacientes.index');
    Route::get('/create', 'App\Http\Controllers\PatientController@create')->name('Pacientes.create');
    Route::post('/create', 'App\Http\Controllers\PatientController@store')->name('Pacientes.store');
    Route::get('/show/{id}', 'App\Http\Controllers\PatientController@show')->name('Pacientes.show');
    Route::get('/edit/{id}', 'App\Http\Controllers\PatientController@edit')->name('Pacientes.edit');
    Route::put('/edit/{id}', 'App\Http\Controllers\PatientController@update')->name('Pacientes.update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\PatientController@destroy')->name('Pacientes.destroy');
});

//Ruta Sedes

Route::group(['prefix' => 'sede', 'middleware' => ['auth']], function () {
    Route::get('/', 'App\Http\Controllers\LocationsController@index')->name('Sede.index');
    Route::get('/create', 'App\Http\Controllers\LocationsController@create')->name('Sede.create');
    Route::post('/create', 'App\Http\Controllers\LocationsController@store')->name('Sede.store');
    Route::get('/show/{id}', 'App\Http\Controllers\LocationsController@show')->name('Sede.show');
    Route::get('/edit/{id}', 'App\Http\Controllers\LocationsController@edit')->name('Sede.edit');
    Route::put('/edit/{id}', 'App\Http\Controllers\LocationsController@update')->name('Sede.update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\LocationsController@destroy')->name('Sede.destroy');
});

//Ruta Servicio

Route::group(['prefix' => 'servicio', 'middleware' => ['auth']], function () {
    Route::get('/', 'App\Http\Controllers\ServicesController@index')->name('Servicio.index');
    Route::get('/create', 'App\Http\Controllers\ServicesController@create')->name('Servicio.create');
    Route::post('/create', 'App\Http\Controllers\ServicesController@store')->name('Servicio.store');
    Route::get('/show/{id}', 'App\Http\Controllers\ServicesController@show')->name('Servicio.show');
    Route::get('/edit/{id}', 'App\Http\Controllers\ServicesController@edit')->name('Servicio.edit');
    Route::put('/edit/{id}', 'App\Http\Controllers\ServicesController@update')->name('Servicio.update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\ServicesController@destroy')->name('Servicio.destroy');
});

//Ruta Asistente

Route::group(['prefix' => 'asistente', 'middleware' => ['auth']], function () {
    Route::get('/', 'App\Http\Controllers\AssistantsController@index')->name('Asistente.index');
    Route::get('/create', 'App\Http\Controllers\AssistantsController@create')->name('Asistente.create');
    Route::post('/create', 'App\Http\Controllers\AssistantsController@store')->name('Asistente.store');
    Route::get('/show/{id}', 'App\Http\Controllers\AssistantsController@show')->name('Asistente.show');
    Route::get('/edit/{id}', 'App\Http\Controllers\AssistantsController@edit')->name('Asistente.edit');
    Route::put('/edit/{id}', 'App\Http\Controllers\AssistantsController@update')->name('Asistente.update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\AssistantsController@destroy')->name('Asistente.destroy');
});

//Ruta Horario

Route::group(['prefix' => 'horario', 'middleware' => ['auth']], function () {
    Route::get('/edit/{id}', 'App\Http\Controllers\Doctor\TimeController@edit')->name('Horarios.edit');
    Route::post('/edit/{id}', 'App\Http\Controllers\Doctor\TimeController@store')->name('Horarios.store');
});

//Ruta Recervar cita 

Route::group(['prefix' => 'reservarcita', 'middleware' => ['auth']], function () {
    Route::get('/create', 'App\Http\Controllers\AppointmentController@create')->name('Cita.create');
    Route::post('/create', 'App\Http\Controllers\AppointmentController@store')->name('Cita.store');
    Route::get('/', 'App\Http\Controllers\AppointmentController@index')->name('Cita.index');
    Route::get('/show/{appointment}', 'App\Http\Controllers\AppointmentController@show')->name('Cita.show');
    Route::post('/cancel/{appointment}', 'App\Http\Controllers\AppointmentController@cancel')->name('Cita.cancel');
    Route::post('/confirm/{appointment}', 'App\Http\Controllers\AppointmentController@cancel')->name('Cita.confirm');
    Route::get('/cancel/{appointment}', 'App\Http\Controllers\AppointmentController@formcancel')->name('Cita.formcancel');




});

Route::group(['namespace' => 'Api', 'middleware' => ['auth']], function () {
    //JSON
    Route::get('/especialidades/{specialty}/medicos', [App\Http\Controllers\Api\SpecialtyController::class ,'doctors']);
    Route::get('/horarios/horas', [App\Http\Controllers\Api\HorarioController::class ,'hours']);

});


// 




