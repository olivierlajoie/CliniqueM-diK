<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route d'acceuil.
Route::get('/', ['uses' => 'GestionController@accueil', 'as' => 'accueil']);

// Route de gestion.
Route::get('gestion', ['uses' => 'GestionController@clinique', 'as' => 'clinique']);

// Routes du formulaire des dates.
Route::post('medecin/{id}', 'MedecinController@dateVisite')->name('medecin.dateVisite');
Route::post('patient/{id}', 'PatientController@dateVisite')->name('patient.dateVisite');

// Routes CRUD pour médecins, patients & visites.
Route::resource('medecin', 'MedecinController');
Route::resource('patient', 'PatientController');
Route::resource('visite', 'VisiteController');