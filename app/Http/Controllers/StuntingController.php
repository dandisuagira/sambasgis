<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use App\Models\Desa;
use Illuminate\Http\Request;

class StuntingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function stunting()
    {
        $stunting_2019 = Stunting::where('tahun','=','2019')->get();
        $stunting_2020 = Stunting::where('tahun','=','2020')->get();
        // dd($stunting_2019);
        $stunting = Stunting::all();
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        $datas = Desa::all();
        return view ('frontend.stunting.stunting',compact('datas','desaController','stunting','stunting_2019','stunting_2020'));
    } 



    public function index()
    {
        $stunting = Stunting::all();
        return view ('frontend.stunting.index',compact('stunting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desa = Desa::all();
        return view('frontend.stunting.create',compact('desa'));
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
     * @param  \App\Models\Stunting  $stunting
     * @return \Illuminate\Http\Response
     */
    public function show(Stunting $stunting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stunting  $stunting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Stunting::find($id);
        // dd($model);
        $desa = Desa::all();
        return view('frontend.stunting.edit',compact('desa','model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stunting  $stunting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stunting $stunting)
    {
        $model = Stunting::find($stunting);
        $model->desa_id = $request->desa_id;
        $model->balita_stunting = $request->balita_stunting;
        $model->persen_stunting = $request->persen_stunting;
        $model->lokus_stunting = $request->lokus_stunting;
        $model->tahun = $request->tahun;
        $model->save();
        return redirect(url('stunting'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stunting  $stunting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Stunting::find($id);
        $model->delete();
        return redirect(url('proyek')); 
    }
}
