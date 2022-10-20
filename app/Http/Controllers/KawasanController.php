<?php

namespace App\Http\Controllers;

use App\Models\Kawasan;
use App\Models\Desa;
use Illuminate\Http\Request;

class KawasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function kawasan()
    {
        $kawasan = Kawasan::all();
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        $datas = Desa::all();
        return view ('frontend.kawasan.kawasan',compact('datas','desaController','kawasan'));
    } 

    public function index()
    {
        //
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
     * @param  \App\Models\Kawasan  $kawasan
     * @return \Illuminate\Http\Response
     */
    public function show(Kawasan $kawasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kawasan  $kawasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kawasan $kawasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kawasan  $kawasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kawasan $kawasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kawasan  $kawasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kawasan $kawasan)
    {
        //
    }
}
