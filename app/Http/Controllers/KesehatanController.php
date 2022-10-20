<?php

namespace App\Http\Controllers;


use App\Models\Desa;
use App\Models\Lakes;
use App\Models\RumahSakit;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kesehatan(){
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&maxFeatures=193&outputFormat=application%2Fjson');
        $kesehatanController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_rumahsakit_desa_sambas_pt_50k_610120220922062600&maxFeatures=50&outputFormat=application%2Fjson');
        // dd($desaController);
        return view ('frontend.kesehatan.kesehatan',compact('desaController','kesehatanController'));
    }

    //LAKES
    public function showLakes($id){
        $lakesController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_layanankesehatan_desa_sambas_pt_50k_610120220922062106&outputFormat=application%2Fjson');
        $lakes = Lakes::find($id);
   
        // dd($lakes->desa->nama_desa);
        return view ('frontend.kesehatan.lakes.show',compact('lakes','lakesController'));
    }

    public function editLakes($id){
        $lakes = Lakes::find($id);

        return view ('frontend.kesehatan.lakes.edit',compact('lakes'));
    }

    //PUSKESMAS
    public function showPuskesmas($id){
        $puskesmasController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_puskesmas_sambas_pt_50k_610120220922062425&outputFormat=application%2Fjson');
        $puskesmas = Puskesmas::find($id);
        // dd($lakes->id);
        return view ('frontend.kesehatan.puskesmas.show',compact('puskesmas','puskesmasController'));
    }
    public function editPuskesmas($id){
        $puskesmas = Puskesmas::find($id);

        return view ('frontend.kesehatan.puskesmas.edit',compact('puskesmas'));
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
     * @param  \App\Models\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kesehatan  $kesehatan
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
     * @param  \App\Models\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
