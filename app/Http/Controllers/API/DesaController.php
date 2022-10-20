<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Helpers\ApiFormatter;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Desa::all();
        

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

            // user sukses
            // $desa = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => $request->password,
                
            // ]);
            // $data = User::where('id','=', $desa->id)->get();

            $request->validate([
                'id'=> 'required',
                'nama_desa'=> 'required',
                'kode_desa'=> 'required',
                'kecamatan'=> 'required',
                'status_desa'=> 'required',
                'prioritas_desa'=> 'required',
                'luas_desa'=> 'required',
                'luas_persen'=> 'required',
                'kepadatan_penduduk'=> 'required',
            ]);

            $desa = Desa::create([
                'id' => $request->id,
                'nama_desa' => $request->nama_desa,
                'kode_desa' => $request->kode_desa,
                'kecamatan' => $request->kecamatan,
                'status_desa' => $request->status_desa,
                'prioritas_desa' => $request->prioritas_desa,
                'luas_desa' => $request->luas_desa,
                'luas_persen' => $request->luas_persen,
                'kepadatan_penduduk' => $request->kepadatan_penduduk,
            ]);

            $data = Desa::where('kode_desa','=', $desa->kode_desa)->get();
       
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
    public function show($kode_desa)
    {
        $data = Desa::where('kode_desa','=', $kode_desa)->get();
       
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
    public function update(Request $request, $kode_desa)
    {
        try {

            $request->validate([
                'id'=> 'required',
                'nama_desa'=> 'required',
                'kode_desa'=> 'required',
                'kecamatan'=> 'required',
                'status_desa'=> 'required',
                'prioritas_desa'=> 'required',
                'luas_desa'=> 'required',
                'luas_persen'=> 'required',
                'kepadatan_penduduk'=> 'required',
            ]);

            $desa = Desa::findOrFail($kode_desa);

            $desa->update([
                'id' => $request->id,
                'nama_desa' => $request->nama_desa,
                'kode_desa' => $request->kode_desa,
                'kecamatan' => $request->kecamatan,
                'status_desa' => $request->status_desa,
                'prioritas_desa' => $request->prioritas_desa,
                'luas_desa' => $request->luas_desa,
                'luas_persen' => $request->luas_persen,
                'kepadatan_penduduk' => $request->kepadatan_penduduk,
            ]);

            $data = Desa::where('kode_desa','=', $desa->kode_desa)->get();
       
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
    public function destroy($kode_desa)
    {
        try {
            $desa = Desa::findOrFail($kode_desa);
            $data = $desa->delete();    
            
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
