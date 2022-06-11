<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AdministrateurController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group( [ 'prefix'=> '/admin', 'middleware'=>'admin'] , function(){
    
    Route::get('/moniteurs','MoniteurController@index');
    Route::get('/moniteurs/cin/{cin}','MoniteurController@showByCin');
    Route::get('/moniteurs/nom/{nom}','MoniteurController@showByNom');
    Route::get('/moniteurs/email/{email}','MoniteurController@showByEmail');
    Route::post('/moniteurs/store','MoniteurController@store');
    Route::post('/moniteurs/update/{id}','MoniteurController@update');
    Route::get('/moniteurs/delete/{id}','MoniteurController@destroy');

    Route::get('/vehicules','VehiculesController@index');
    Route::post('/vehicules/update/{id}','VehiculesController@update');
    Route::get('/vehicules/matricule/{matricule}','VehiculesController@showByMatricule');
    Route::get('/vehicules/delete/{id}','VehiculesController@destroy');
    Route::get('/vehicules/modele/{modele}','VehiculesController@showByModele');
    Route::get('/vehicules/Type/{type}','VehiculesController@showByType');
    Route::post('/vehicules/store','VehiculesController@store');

    Route::get('/agenda','SeancesController@index');
    Route::get('/agenda/{id}','SeancesController@show');
    Route::get('/agenda/delete/{id}','SeancesController@destroy');
    Route::post('/Agenda/store','SeancesController@store');
    Route::post('/agenda/update/{id}','SeancesController@update');
    Route::get('/candidats/{cin}','CandidatsController@showByCin');

    //----------------------------------------------------------------------- sprint 2 

    Route::get('/candidats','CandidatsController@index');
    Route::post('/candidats/store','CandidatsController@store');
    Route::post('/candidats/update/{id}','CandidatsController@update');
    Route::get('/candidats/delete/{id}','CandidatsController@destroy');
    Route::get('/candidats/{id}','CandidatsController@show');
    Route::get('/candidats/nom/{nom}','CandidatsController@showByNom');
    Route::get('/candidats/email/{email}','CandidatsController@showByEmail');


});

Route::group( [ 'prefix'=> '/candidat', 'middleware'=>'candidat'] , function(){

    Route::get('/{idcandidat}/Agenda','SeancesController@AgendaforCandidat');
    Route::get('/{idcandidat}/Agenda/moniteurs/{idmoniteur}','SeancesController@MoniteurforCandidatByAgenda');
    Route::get('/{idcandidat}/Agenda/{idseance}/moniteurs/{idmoniteur}','SeancesController@MoniteurforCandidatByAgenda');
    Route::get('/candidats/{id}','CandidatsController@show');
    Route::post('/candidats/update/{id}','CandidatsController@update');



});

Route::group( [ 'prefix'=> '/moniteur', 'middleware'=>'moniteur'] , function(){
   
    Route::get('/Agenda/{idmoniteur}','SeancesController@AgendaforMoniteur');
    Route::get('/{idmoniteur}/rapports','RapportsController@RapportsByMoniteurs');
    Route::get('/{idmoniteur}/Agenda','SeancesController@AgendaforMoniteur');
    Route::get('/{idmoniteur}/Agenda/{idseance}/candidats/{idcandidat}','SeancesController@CandidatforMoniteurByAgenda');
    Route::get('/{idmoniteur}/rapports','RapportsController@RapportsByMoniteurs');
    Route::get('/{idmoniteur}/rapports/candidats/{idcandidat}','RapportsController@RapportsByMoniteursandcandidat');
    Route::post('/{idmoniteur}/candidats/{idcandidat}/resultat/{idresultat}/update','ResultatsController@update');
    Route::post('/{idmoniteur}/candidats/{idcandidat}/seance/{idseance}/resultat/store','ResultatsController@store');
    Route::get('/{idmoniteur}/candidats/{idcandidat}/rapport/{id}/delete','RapportsController@destroy');
});
