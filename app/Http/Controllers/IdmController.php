<?php

namespace App\Http\Controllers;

use App\Models\Idm;
use App\Models\Desa;
use Illuminate\Http\Request;

class IdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function idm()
    {
        $idm = Idm::all();
        $datas = Desa::all();
        return view ('frontend.idm.idm',compact('datas','idm'));
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
     * @param  \App\Models\Idm  $idm
     * @return \Illuminate\Http\Response
     */
    public function show(Idm $idm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idm  $idm
     * @return \Illuminate\Http\Response
     */
    public function edit(Idm $idm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idm  $idm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idm $idm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idm  $idm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idm $idm)
    {
        //
    }
}
