<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Dusun;
use App\Helpers\ApiFormatter;
use Exception;



class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dusun::all();
        

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
                'jumlah_dusun'=> 'required',
                'nama_dusun'=> 'required',
                'rt'=> 'required',
                'rw'=> 'required',
                ]);

            $dusun = Dusun::create([
                // 'id' => $request->id, 
                'desa_id' => $request->desa_id,
                'jumlah_dusun' => $request->jumlah_dusun,
                'nama_dusun' => $request->nama_dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);

            $data = Dusun::where('id','=', $dusun->id)->get();
       
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
        $data = Dusun::where('id','=', $id)->get();
       
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
                'jumlah_dusun'=> 'required',
                'nama_dusun'=> 'required',
                'rt'=> 'required',
                'rw'=> 'required',
                ]);

            $dusun = Dusun::findOrFail($id);

            $dusun->update([
                // 'id' => $request->id,
                'desa_id' => $request->desa_id,
                'jumlah_dusun' => $request->jumlah_dusun,
                'nama_dusun' => $request->nama_dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);

            $data = Dusun::where('id','=', $dusun->id)->get();
       
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
            $dusun = Dusun::findOrFail($id);
            $data = $dusun->delete();    
            
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
