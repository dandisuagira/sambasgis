<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lakes;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;

class LakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lakes::all();
        

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
                'nama_lakes'=> 'required',
                'dokter'=> 'required',
                'bidan'=> 'required',
                'perawat'=> 'required',
                ]);

            $lakes = Lakes::create([
                // 'id' => $request->id,
                'desa_id' => $request->desa_id,
                'nama_lakes' => $request->nama_lakes,
                'dokter' => $request->dokter,
                'bidan' => $request->bidan,
                'perawat' => $request->perawat,
            ]);

            $data = Lakes::where('id','=', $lakes->id)->get();
       
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
        $data = Lakes::where('id','=', $id)->get();
       
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
                'nama_lakes'=> 'required',
                'dokter'=> 'required',
                'bidan'=> 'required',
                'perawat'=> 'required',
                ]);

            $lakes = Lakes::findOrFail($id);

            $lakes->update([
                // 'id' => $request->id,
                'desa_id' => $request->desa_id,
                'nama_lakes' => $request->nama_lakes,
                'dokter' => $request->dokter,
                'bidan' => $request->bidan,
                'perawat' => $request->perawat,
            ]);

            $data = Lakes::where('id','=', $lakes->id)->get();
       
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
            $lakes = Lakes::findOrFail($id);
            $data = $lakes->delete();    
            
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
