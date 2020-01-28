<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\CasaVaccaro;
use App\CasaMontevideo;
use App\CasaMaxinta;
use App\CasaMaguitur;
use App\CasaAlpe;
use App\BancoSupervielle;
use App\BancoSantander;
use App\BancoProvincia;
use App\BancoPatagonia;
use App\BancoNacion;
use App\BancoIcbc;
use App\BancoGalicia;
use App\BancoFrances;
use App\BancoColumbia;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $entidadesResult = array();

        $entidadesList = array();

        // ------- VACCARO -----------

        $entidadVaccaro = CasaVaccaro::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadVaccaro);

        // ------- MONTEVIDEO -----------

        $entidadMontevideo = CasaMontevideo::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadMontevideo);

        // ------- MAXINTA -----------

        $entidadMaxinta = CasaMaxinta::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadMaxinta);

        // ------- MAGUITUR -----------

        $entidadMaguitur = CasaMaguitur::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadMaguitur);

        // ------- ALPE -----------

        $entidadAlpe = CasaAlpe::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadAlpe);

        // ------- SUPERVIELLE -----------

        $entidadSupervielle = BancoSupervielle::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadSupervielle);

        // ------- SANTANDER -----------

        $entidadSantander = BancoSantander::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadSantander);

        // ------- PROVINCIA -----------

        $entidadProvincia = BancoProvincia::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadProvincia);

        // ------- PATAGONIA -----------

        $entidadPatagonia = BancoPatagonia::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadPatagonia);

        // ------- NACION -----------

        $entidadNacion = BancoNacion::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadNacion);

        // ------- ICBC -----------

        $entidadIcbc = BancoIcbc::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadIcbc);

        // ------- GALICIA -----------

        $entidadGalicia = BancoGalicia::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadGalicia);

        // ------- FRANCES -----------

        $entidadFrances = BancoFrances::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadFrances);

        // ------- COLUMBIA -----------

        $entidadColumbia = BancoColumbia::orderBy('id', 'desc')
        ->take(2)
        ->get();

        array_push($entidadesList, $entidadColumbia);

        foreach ($entidadesList as $entidades) {

            $entidadCompraNumber = number_format(floatval($entidades[0]->compra),2);
            $entidadCompraNumber2 = number_format(floatval($entidades[1]->compra),2);
            $difcompra =  number_format(((($entidadCompraNumber2/$entidadCompraNumber)-1)*100),2);

            $entidadVentaNumber = number_format(floatval($entidades[0]->venta),2);
            $entidadVentaNumber2 = number_format(floatval($entidades[1]->venta),2);
            $difventa = number_format(((($entidadVentaNumber2/$entidadVentaNumber)-1)*100),2);

            $spreadVenta = number_format(floatval($entidades[0]->venta),2);
            $spreadCompra = number_format(floatval($entidades[0]->compra),2);
            $spread = number_format(($spreadVenta - $spreadCompra),2);

            $entidadObject = new \stdClass();
            $entidadObject->id = $entidades[0]->id;
            $entidadObject->entidad = $entidades[0]->entidad;
            $entidadObject->compra = $entidades[0]->compra;
            $entidadObject->difcompra = $difcompra;
            $entidadObject->venta = $entidades[0]->venta;
            $entidadObject->difventa = $difventa;
            $entidadObject->spread = $spread;
            $entidadObject->dia = str_replace("/", "-", $entidades[0]->dia);
            $entidadObject->hora = $entidades[0]->hora;

            array_push($entidadesResult, $entidadObject);

        }

        return response()->json($entidadesResult);

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
