<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kawasan;
use App\Helpers\ApiFormatter;
use Exception;



class KawasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kawasan::all();
        

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
                'kabkota_sehat'=> 'required',
                'ksk_ekonomi'=> 'required',
                'ksk_trans_sda'=> 'required',
                'kawasan_lindung'=> 'required',
                'lokasi_desa'=> 'required',
                'kawasan_agro'=> 'required',
                ]);

            $kawasan = Kawasan::create([
                // 'id' => $request->id, 
                'desa_id' => $request->desa_id,
                'kabkota_sehat' => $request->kabkota_sehat,
                'ksk_ekonomi' => $request->ksk_ekonomi,
                'ksk_trans_sda' => $request->ksk_trans_sda,
                'kawasan_lindung' => $request->kawasan_lindung,
                'lokasi_desa' => $request->lokasi_desa,
                'kawasan_agro' => $request->kawasan_agro,
            ]);

            $data = Kawasan::where('id','=', $kawasan->id)->get();
       
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
        $data = Kawasan::where('id','=', $id)->get();
       
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
                'kabkota_sehat'=> 'required',
                'ksk_ekonomi'=> 'required',
                'ksk_trans_sda'=> 'required',
                'kawasan_lindung'=> 'required',
                'lokasi_desa'=> 'required',
                'kawasan_agro'=> 'required',
                ]);

            $kawasan = Kawasan::findOrFail($id);

            $kawasan->update([
                // 'id' => $request->id,
                'desa_id' => $request->desa_id,
                'kabkota_sehat' => $request->kabkota_sehat,
                'ksk_ekonomi' => $request->ksk_ekonomi,
                'ksk_trans_sda' => $request->ksk_trans_sda,
                'kawasan_lindung' => $request->kawasan_lindung,
                'lokasi_desa' => $request->lokasi_desa,
                'kawasan_agro' => $request->kawasan_agro,
            ]);

            $data = Kawasan::where('id','=', $kawasan->id)->get();
       
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
            $kawasan = Kawasan::findOrFail($id);
            $data = $kawasan->delete();    
            
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
