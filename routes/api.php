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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




//----------USUARIOS API SIN TOKEN---------//

Route::group(['middleware' => ['api', 'cors']], function() { 

    Route::post('/signup', [
        'uses' => 'UserController@signup'
    ]);


    Route::post('/login', [
        'uses' => 'UserController@signin'
    ]);

//----------USUARIOS API CON TOKEN---------//

    Route::group(['middleware' => 'jwt'], function() { 

        
        //----------API DE PROFILE---------//

        Route::get('profile/{id}', 'UserController@getProfile');
        Route::delete('profile/{id}', 'UserController@deletetProfile');

        //----------API DE USUARIOS---------//

        Route::get('allusuarios', 'UserController@allusuarios');
        Route::get('usuario', 'UserController@user');
        Route::get('usuario/{id}', 'UserController@getusuario');
        Route::delete('usuario/{id}', 'UserController@deleteusuario');

        //----------TODAS LAS COTIZACIONES---------//
        
        Route::get('entidadesAll', 'allEntidadesController@index');

        //----------BANCO COLUMBIA---------//

        //LIST ALL COTIZACIONES
        Route::get('columbia', 'BancoColumbiaController@index');
        //LIST SINGLE COTIZACION
        Route::get('columbia/{id}', 'BancoColumbiaController@show');
        //CREATE COTIZACION
        Route::post('columbia', 'BancoColumbiaController@store');
        //UPDATE COTIZACION
        Route::put('columbia', 'BancoColumbiaController@store');
        //DELETE COTIZACION
        Route::delete('columbia', 'BancoColumbiaController@destroy');



        //----------BANCO FRANCES---------//

        //LIST ALL COTIZACIONES
        Route::get('frances', 'BancoFrancesController@index');
        //LIST SINGLE COTIZACION
        Route::get('frances/{id}', 'BancoFrancesController@show');
        //CREATE COTIZACION
        Route::post('frances', 'BancoFrancesController@store');
        //UPDATE COTIZACION
        Route::put('frances', 'BancoFrancesController@store');
        //DELETE COTIZACION
        Route::delete('frances', 'BancoFrancesController@destroy');


        //----------BANCO GALICIA---------//

        //LIST ALL COTIZACIONES
        Route::get('galicia', 'BancoGaliciaController@index');
        //LIST SINGLE COTIZACION
        Route::get('galicia/{id}', 'BancoGaliciaController@show');
        //CREATE COTIZACION
        Route::post('galicia', 'BancoGaliciaController@store');
        //UPDATE COTIZACION
        Route::put('galicia', 'BancoGaliciaController@store');
        //DELETE COTIZACION
        Route::delete('galicia', 'BancoGaliciaController@destroy');


        //----------BANCO ICBC---------//

        //LIST ALL COTIZACIONES
        Route::get('icbc', 'BancoIcbcController@index');
        //LIST SINGLE COTIZACION
        Route::get('icbc/{id}', 'BancoIcbcController@show');
        //CREATE COTIZACION
        Route::post('icbc', 'BancoIcbcController@store');
        //UPDATE COTIZACION
        Route::put('icbc', 'BancoIcbcController@store');
        //DELETE COTIZACION
        Route::delete('icbc', 'BancoIcbcController@destroy');



        //----------BANCO NACION---------//

        //LIST ALL COTIZACIONES
        Route::get('nacion', 'BancoNacionController@index');
        //LIST SINGLE COTIZACION
        Route::get('nacion/{id}', 'BancoNacionController@show');
        //CREATE COTIZACION
        Route::post('nacion', 'BancoNacionController@store');
        //UPDATE COTIZACION
        Route::put('nacion', 'BancoNacionController@store');
        //DELETE COTIZACION
        Route::delete('nacion', 'BancoNacionController@destroy');



        //----------BANCO PATAGONIA---------//

        //LIST ALL COTIZACIONES
        Route::get('patagonia', 'BancoPatagoniaController@index');
        //LIST SINGLE COTIZACION
        Route::get('patagonia/{id}', 'BancoPatagoniaController@show');
        //CREATE COTIZACION
        Route::post('patagonia', 'BancoPatagoniaController@store');
        //UPDATE COTIZACION
        Route::put('patagonia', 'BancoPatagoniaController@store');
        //DELETE COTIZACION
        Route::delete('patagonia', 'BancoPatagoniaController@destroy');



        //----------BANCO PROVINCIA---------//

        //LIST ALL COTIZACIONES
        Route::get('provincia', 'BancoProvinciaController@index');
        //LIST SINGLE COTIZACION
        Route::get('provincia/{id}', 'BancoProvinciaController@show');
        //CREATE COTIZACION
        Route::post('provincia', 'BancoProvinciaController@store');
        //UPDATE COTIZACION
        Route::put('provincia', 'BancoProvinciaController@store');
        //DELETE COTIZACION
        Route::delete('provincia', 'BancoProvinciaController@destroy');


        //----------BANCO SANTANDER---------//

        //LIST ALL COTIZACIONES
        Route::get('santander', 'BancoSantanderController@index');
        //LIST SINGLE COTIZACION
        Route::get('santander/{id}', 'BancoSantanderController@show');
        //CREATE COTIZACION
        Route::post('santander', 'BancoSantanderController@store');
        //UPDATE COTIZACION
        Route::put('santander', 'BancoSantanderController@store');
        //DELETE COTIZACION
        Route::delete('santander', 'BancoSantanderController@destroy');



        //----------BANCO SUPERVIELLE---------//

        //LIST ALL COTIZACIONES
        Route::get('supervielle', 'BancoSupervielleController@index');
        //LIST SINGLE COTIZACION
        Route::get('supervielle/{id}', 'BancoSupervielleController@show');
        //CREATE COTIZACION
        Route::post('supervielle', 'BancoSupervielleController@store');
        //UPDATE COTIZACION
        Route::put('supervielle', 'BancoSupervielleController@store');
        //DELETE COTIZACION
        Route::delete('supervielle', 'BancoSupervielleController@destroy');



        //----------CASA ALPE---------//

        //LIST ALL COTIZACIONES
        Route::get('alpe', 'CasaAlpeController@index');
        //LIST SINGLE COTIZACION
        Route::get('alpe/{id}', 'CasaAlpeController@show');
        //CREATE COTIZACION
        Route::post('alpe', 'CasaAlpeController@store');
        //UPDATE COTIZACION
        Route::put('alpe', 'CasaAlpeController@store');
        //DELETE COTIZACION
        Route::delete('alpe', 'CasaAlpeController@destroy');


        //----------CASA MAGUITUR---------//

        //LIST ALL COTIZACIONES
        Route::get('maguitur', 'CasaMaguiturController@index');
        //LIST SINGLE COTIZACION
        Route::get('maguitur/{id}', 'CasaMaguiturController@show');
        //CREATE COTIZACION
        Route::post('maguitur', 'CasaMaguiturController@store');
        //UPDATE COTIZACION
        Route::put('maguitur', 'CasaMaguiturController@store');
        //DELETE COTIZACION
        Route::delete('maguitur', 'CasaMaguiturController@destroy');


        //----------CASA MAXINTA---------//

        //LIST ALL COTIZACIONES
        Route::get('maxinta', 'CasaMaxintaController@index');
        //LIST SINGLE COTIZACION
        Route::get('maxinta/{id}', 'CasaMaxintaController@show');
        //CREATE COTIZACION
        Route::post('maxinta', 'CasaMaxintaController@store');
        //UPDATE COTIZACION
        Route::put('maxinta', 'CasaMaxintaController@store');
        //DELETE COTIZACION
        Route::delete('maxinta', 'CasaMaxintaController@destroy');


        //----------CASA MONTEVIDEO---------//

        //LIST ALL COTIZACIONES
        Route::get('montevideo', 'CasaMontevideoController@index');
        //LIST SINGLE COTIZACION
        Route::get('montevideo/{id}', 'CasaMontevideoController@show');
        //CREATE COTIZACION
        Route::post('montevideo', 'CasaMontevideoController@store');
        //UPDATE COTIZACION
        Route::put('montevideo', 'CasaMontevideoController@store');
        //DELETE COTIZACION
        Route::delete('montevideo', 'CasaMontevideoController@destroy');



        //----------CASA VACCARO---------//

        //LIST ALL COTIZACIONES
        Route::get('vaccaro', 'CasaVaccaroController@index');
        //LIST SINGLE COTIZACION
        Route::get('vaccaro/{id}', 'CasaVaccaroController@show');
        //CREATE COTIZACION
        Route::post('vaccaro', 'CasaVaccaroController@store');
        //UPDATE COTIZACION
        Route::put('vaccaro', 'CasaVaccaroController@store');
        //DELETE COTIZACION
        Route::delete('vaccaro', 'CasaVaccaroController@destroy');

    });

});

