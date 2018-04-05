<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('client/register','clientController@register');
Route::post('client/login','clientController@login');
Route::post('client/edit/{id}','clientController@edit');
//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('client/annonces/cat/{categorie}/cl/{client}','client_annonce@client_annonces');
Route::post('client/update_annonces/ann/{ann}/cl/{cl}','client_annonce@update_annonce');
////////////////////////////////////////////////////////////////////////////////////////////:
Route::post('insert_annonce/insert_ordinateur','insert_annonceController@insert_ordinateur');
Route::post('insert_annonce/insert_access_info','insert_annonceController@insert_access_info');
Route::post('insert_annonce/insert_electromenager','insert_annonceController@insert_electromenager');
Route::post('insert_annonce/insert_immobilier','insert_annonceController@insert_immobilier');
Route::post('insert_annonce/insert_telephone_tablette','insert_annonceController@insert_telephone_tablette');
Route::post('insert_annonce/insert_vehicule','insert_annonceController@insert_vehicule');
Route::post('insert_annonce/insert_vettement','insert_annonceController@insert_vettement');
Route::post('insert_annonce/insert_outre','insert_annonceController@insert_outre');
Route::post('insert_annonce/insert_image','insert_annonceController@insert_image');
//////////////////////////////////////////////////////////////////////////////////////////::
Route::get('get_annonce/get_electromenagers','get_annonceController@get_electromenagers');




