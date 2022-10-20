<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Dusun;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function chartjs()
    {
        $kecamatan = ['Galing','Jawai','Jawai Selatan','Paloh','Pemangkat','Sajad','Sajingan Besar',
        'Salatiga','Sambas','Sebawi','Sejangkung','Selakau','Selakau Timur','Semparuk','Subah','Tengaran',
        'Tebas','Tekarang','Teluk Keramat'
    ];

        $desa = [];
        foreach ($kecamatan as $key => $value) {
            $user[] = Desa::where(DB::raw("DATE_FORMAT(kecamatan, '%Y')"),$value)->count();
        }

        // $year = ['2019','2020','2021','2022','2023'];

        // $user = [];
        // foreach ($year as $key => $value) {
        //     $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        // }
        
        // $users = User::select(DB::raw("SUM(id) as count"))  
        // ->orderBy("created_at")  
        // ->groupBy(DB::raw("year(created_at)"))  
        // ->get()->toArray();  
        // $user = array_column($users, 'count');  

    	//return view('frontend.desa.chartjs')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    	return view('frontend.desa.chartjs')->with('kecamatan',json_encode($kecamatan,JSON_NUMERIC_CHECK))->with('desa',json_encode($desa,JSON_NUMERIC_CHECK));

    } 

    // 2 luas desa
    public function luasdesa()
    {

        $dusun = Dusun::all();
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        $smpController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_pendidikan_smp_desa_sambas_pt_50k_610120220922063416&outputFormat=application%2Fjson');
        $datas = Desa::all();
        return view ('frontend.desa.luasdesa',compact('datas','desaController','smpController','dusun'));
    } 

    // 1 adm desa
    public function desa()
    {
        $dusun = Dusun::all();
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        $smpController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_pendidikan_sederajat_sambas_pt_50k_610120220828190649&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326');
        $datas = Desa::all();
        return view ('frontend.desa.desa',compact('datas','desaController','smpController','dusun'));
    }
    
    //kecamatan numpang ja
    public function kecamatan()
    {
        $dusun = Dusun::all();
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        $smpController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:jo_pendidikan_sederajat_sambas_pt_50k_610120220828190649&maxFeatures=50&outputFormat=application%2Fjson&srsName=epsg:4326');
        $datas = Desa::all();
        return view ('frontend.kecamatan.kecamatan',compact('datas','desaController','smpController','dusun'));
    } 


    public function index()
    {
        $datas = Desa::all();
        return view('frontend.desa.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('frontend.desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Desa();
        $model->id = $request->id;
        $model->nama_desa = $request->nama_desa;
        $model->kode_desa = $request->kode_desa;
        $model->kecamatan = $request->kecamatan;
        $model->status_desa = $request->status_desa;
        $model->prioritas_desa = $request->prioritas_desa;
        $model->luas_desa = $request->luas_desa;
        $model->luas_persen = $request->luas_persen;
        $model->kepadatan_penduduk = $request->kepadatan_penduduk;
        $model->save();
        // Alert::success('Sukses', 'Data berhasil diinput');
        return redirect(url('desa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show($kode_desa)
    {
        $model = Desa::find($kode_desa);
        return view ('frontend.desa.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_desa)
    {   
        $desaController =  file_get_contents('http://sambaskab.ina-sdi.or.id:8080/geoserver/BAPPEDA/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=BAPPEDA:admin_desa_sambas_biropemkalbar_des2019_610120220828171840&outputFormat=application%2Fjson&srsName=epsg:4326');
        $model = Desa::find($kode_desa);
        return view ('frontend.desa.edit', compact('model','desaController'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_desa)
    {
        $model = Desa::find($kode_desa);
        $model->nama_desa = $request->nama_desa;
        $model->kode_desa = $request->kode_desa;
        $model->kecamatan = $request->kecamatan;
        $model->status_desa = $request->status_desa;
        $model->prioritas_desa = $request->prioritas_desa;
        $model->luas_desa = $request->luas_desa;
        $model->luas_persen = $request->luas_persen;
        $model->kepadatan_penduduk = $request->kepadatan_penduduk;
        $model->save();
        return redirect(url('desa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_desa)
    {
        $model = Desa::find($kode_desa);
        $model->delete();
        return redirect(url('desa')); 
    }
}
