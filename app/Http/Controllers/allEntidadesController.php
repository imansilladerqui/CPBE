<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\BancoFrances;
use App\BancoColumbia;
use App\BancoGalicia;
use App\BancoIcbc;
use App\BancoNacion;
use App\BancoPatagonia;
use App\BancoProvincia;
use App\BancoSantander;
use App\BancoSupervielle;
use App\CasaAlpe;
use App\CasaMaguitur;
use App\CasaMaxinta;
use App\CasaMontevideo;
use App\CasaVaccaro;

class allEntidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get cotizaciones
        $frances = BancoFrances::orderBy('id', 'desc')->first();
        $columbia = BancoColumbia::orderBy('id', 'desc')->first();
        $galicia = BancoGalicia::orderBy('id', 'desc')->first();
        $icbc = BancoIcbc::orderBy('id', 'desc')->first();
        $nacion = BancoNacion::orderBy('id', 'desc')->first();
        $patagonia = BancoPatagonia::orderBy('id', 'desc')->first();
        $provincia = BancoProvincia::orderBy('id', 'desc')->first();
        $santander = BancoSantander::orderBy('id', 'desc')->first();
        $supervielle = BancoSupervielle::orderBy('id', 'desc')->first();
        $alpe = CasaAlpe::orderBy('id', 'desc')->first();
        $maguitur = CasaMaguitur::orderBy('id', 'desc')->first();
        $maxinta = CasaMaxinta::orderBy('id', 'desc')->first();
        $montevideo = CasaMontevideo::orderBy('id', 'desc')->first();
        $vaccaro = CasaVaccaro::orderBy('id', 'desc')->first();

        //return cotizaciones as a resource
        return Response::json(array(
            'Frances'=>$frances,
            'Columbia'=>$columbia,
            'Galicia'=>$galicia,
            'Icbc'=>$icbc,
            'Nacion'=>$nacion,
            'Patagonia'=>$patagonia,
            'Provincia'=>$provincia,
            'Santander'=>$santander,
            'Supervielle'=>$supervielle,
            'Alpe'=>$alpe,
            'Maguitur'=>$maguitur,
            'Maxinta'=>$maxinta,
            'Montevideo'=>$montevideo,
            'Vaccaro'=>$vaccaro
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
