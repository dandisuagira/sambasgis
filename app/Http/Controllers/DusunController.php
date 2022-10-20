<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Desa;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function dusun()
    {
        $dusuns = Dusun::all();
        $datas = Desa::all();
        return view ('frontend.dusun.dusun',compact('datas','dusuns'));
    } 



    public function index()
    {
        $datas = Dusun::all();
        return view ('frontend.dusun.index',compact('datas'));

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
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Dusun::find($id);
        return view ('frontend.dusun.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        // $model = Desa::find($id);
        $model = Dusun::find($id);
        return view ('frontend.dusun.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Dusun::find($id);
        $model->desa_id = $request->desa_id;
        $model->jumlah_dusun = $request->jumlah_dusun;
        $model->nama_dusun = $request->nama_dusun;
        $model->rt = $request->rt;
        $model->rw = $request->rw;
        $model->save();
        return redirect(url('dusun_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Dusun::find($id);
        $model->delete();
        return redirect(url('dusun')); 
    }
}
