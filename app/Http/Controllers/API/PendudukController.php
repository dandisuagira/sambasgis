<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Penduduk;
use App\Helpers\ApiFormatter;
use Exception;



class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penduduk::all();
        

        if($data){
            return ApiFormatter::createApi(200,'Success',$data);
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
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
        try {
            $request->validate([
                // 'id'=> 'required',
                'desa_id'=> 'required',
                'laki_laki'=> 'required',
                'perempuan'=> 'required',
                'jumlah'=> 'required',
                'sex_ratio'=> 'required',
                ]);

            $penduduk = Penduduk::create([
                // 'id' => $request->id, 
                'desa_id' => $request->desa_id,
                'laki_laki' => $request->laki_laki,
                'perempuan' => $request->perempuan,
                'jumlah' => $request->jumlah,
                'sex_ratio' => $request->sex_ratio,
            ]);

            $data = Penduduk::where('id','=', $penduduk->id)->get();
       
            if($data){
                return ApiFormatter::createApi(200,'Success',$data);
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }

        } catch (Exception $error) {
           return ApiFormatter::createApi(400,'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penduduk::where('id','=', $id)->get();
       
        if($data){
            return ApiFormatter::createApi(200,'Success',$data);
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
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
        try {

            $request->validate([
                // 'id'=> 'required',
                'desa_id'=> 'required',
                'laki_laki'=> 'required',
                'perempuan'=> 'required',
                'jumlah'=> 'required',
                'sex_ratio'=> 'required',
                ]);

            $penduduk = Penduduk::findOrFail($id);

            $penduduk->update([
                // 'id' => $request->id,
                'desa_id' => $request->desa_id,
                'laki_laki' => $request->laki_laki,
                'perempuan' => $request->perempuan,
                'jumlah' => $request->jumlah,
                'sex_ratio' => $request->sex_ratio,
            ]);

            $data = Penduduk::where('id','=', $penduduk->id)->get();
       
            if($data){
                return ApiFormatter::createApi(200,'Success',$data);
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }

        } catch (Exception $error) {
           return ApiFormatter::createApi(400,'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $penduduk = Penduduk::findOrFail($id);
            $data = $penduduk->delete();    
            
            if($data){
                return ApiFormatter::createApi(200,'Success Menghapus Data');
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400,'Failed');
        }
    }
}
