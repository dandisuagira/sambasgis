<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Proyek::orderBy('id','DESC')->get();
        

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
                'desa_id' => 'required',
                'nama_proyek' => 'required',
                'kode_proyek' => 'required',
                'lat' => 'required',
                'long' => 'required',
                'foto1' => 'required',
                // 'foto2' => 'required',
                'tahun' => 'required',
                'deskripsi' => 'required',
            ]);

            $filename="";
            if($request->hasFile('foto1')){
                $filename=$request->file('foto1')->store('posts','public');
            }else{
                $filename=Null;
            }

            $filename2="";
            if($request->hasFile('foto2')){
                $filename2=$request->file('foto2')->store('posts','public');
            }else{
                $filename2=Null;
            }
            $filename3="";
            if($request->hasFile('foto3')){
                $filename3=$request->file('foto3')->store('posts','public');
            }else{
                $filename3=Null;
            }
            $filename4="";
            if($request->hasFile('foto4')){
                $filename4=$request->file('foto4')->store('posts','public');
            }else{
                $filename4=Null;
            }
            $filename5="";
            if($request->hasFile('foto5')){
                $filename5=$request->file('foto5')->store('posts','public');
            }else{
                $filename5=Null;
            }

            $proyek = new Proyek();
            $proyek->desa_id = $request->desa_id;
            $proyek->nama_proyek = $request->nama_proyek;
            $proyek->kode_proyek = $request->kode_proyek;
            $proyek->lat = $request->lat;
            $proyek->long = $request->long;
            $proyek->foto1 = $filename;
            $proyek->foto2 = $filename2;
            $proyek->foto3 = $filename3;
            $proyek->foto4 = $filename4;
            $proyek->foto5 = $filename5;
            $proyek->deskripsi = $request->deskripsi;
            $proyek->tahun = $request->tahun;
            $data = $proyek->save(); // 

            $data = Proyek::where('id','=', $proyek->id)->get();
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
        $data = Proyek::where('id','=', $id)->get();
       
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
            $proyek = Proyek::findOrFail($id);

            $destinaton = public_path("storage\\".$proyek->foto1);
            $filename="";
            if($request->hasFile('foto1')){
                if(File::exists($destinaton)){
                    File::delete($destinaton);
                }
                $filename = $request->file('foto1')->store('posts','public');
            }else{
                $filename = $request->foto1;
            }

            $destinaton2 = public_path("storage\\".$proyek->foto2);
            $filename2="";
            if($request->hasFile('foto2')){
                if(File::exists($destinaton2)){
                    File::delete($destinaton2);
                }
                $filename2 = $request->file('foto2')->store('posts','public');
            }else{
                $filename2 = $request->foto2;
            }

            $destinaton3 = public_path("storage\\".$proyek->foto3);
            $filename3="";
            if($request->hasFile('foto3')){
                if(File::exists($destinaton3)){
                    File::delete($destinaton3);
                }
                $filename3 = $request->file('foto3')->store('posts','public');
            }else{
                $filename3 = $request->foto3;
            }

            $destinaton4 = public_path("storage\\".$proyek->foto4);
            $filename4="";
            if($request->hasFile('foto4')){
                if(File::exists($destinaton4)){
                    File::delete($destinaton4);
                }
                $filename4 = $request->file('foto4')->store('posts','public');
            }else{
                $filename4 = $request->foto4;
            }

            $destinaton5 = public_path("storage\\".$proyek->foto5);
            $filename5="";
            if($request->hasFile('foto5')){
                if(File::exists($destinaton5)){
                    File::delete($destinaton5);
                }
                $filename5 = $request->file('foto5')->store('posts','public');
            }else{
                $filename5 = $request->foto5;
            }

            $proyek->desa_id = $request->desa_id;
            $proyek->nama_proyek = $request->nama_proyek;
            $proyek->kode_proyek = $request->kode_proyek;
            $proyek->lat = $request->lat;
            $proyek->long = $request->long;
            $proyek->foto1 = $filename;
            $proyek->foto2 = $filename2;
            $proyek->foto3 = $filename3;
            $proyek->foto4 = $filename4;
            $proyek->foto5 = $filename5;
            $proyek->deskripsi = $request->deskripsi;
            $proyek->tahun = $request->tahun;
            $data = $proyek->save();

            $data = Proyek::where('id','=', $proyek->id)->get();
       
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
            $proyek = Proyek::findOrFail($id);

            $destinaton = public_path("storage\\".$proyek->foto1);
                if(File::exists($destinaton)){
                    File::delete($destinaton);
                }
            $destinaton2 = public_path("storage\\".$proyek->foto2);
                if(File::exists($destinaton2)){
                    File::delete($destinaton2);
                }
            $destinaton3 = public_path("storage\\".$proyek->foto3);
                if(File::exists($destinaton3)){
                    File::delete($destinaton3);
                }
            $destinaton4 = public_path("storage\\".$proyek->foto4);
                if(File::exists($destinaton4)){
                    File::delete($destinaton4);
                }
            $destinaton5 = public_path("storage\\".$proyek->foto5);
                if(File::exists($destinaton5)){
                    File::delete($destinaton5);
                }


            $data = $proyek->delete();    
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
