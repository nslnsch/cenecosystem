<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudio;
use App\CompEstudios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=CompEstudios::orderBy('id','DESC')->paginate(4);
        return view('areas.complemento.complemento',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudios= Estudio::all()->pluck('nombre_est','id');
        return view('areas.complemento.addcomplemento',compact('estudios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cod_estudio' => 'required',
            'subestudio' => 'required',
            'precio' => 'required'
        ]);
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha registrado un nuevo sub-estudio: ".strtoupper($request->subestudio),
            'fecha' => date("Y-m-d")
        ]
        );
        $subestudio = new CompEstudios;
        $subestudio->id_est = $request->cod_estudio;
        $subestudio->subestudio = strtoupper($request->subestudio);
        $subestudio->precio = intval(preg_replace('/[^0-9]+/', '', $request->precio), 10);
        $subestudio->save();
        Session::flash('message','Sub-Estudio Registrado con Exito!');
        return redirect()-> route('subestudios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CompEstudios $subestudio)
    {
        $estudios = Estudio::all()->pluck('nombre_est','id');
        $nombre_est = Estudio::all()->where('id','=',$subestudio->id_est)->first();
        return view('areas.complemento.editcomplemento',compact('subestudio','estudios','nombre_est'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompEstudios $subestudio)
    {
        $request->validate([
            'cod_estudio' => 'required',
            'subestudio' => 'required',
            'precio' => 'required'
        ]);
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha actualizado el sub-estudio: ".strtoupper($request->subestudio),
            'fecha' => date("Y-m-d")
        ]
        );
        $subestudio->id_est = $request->cod_estudio;
        $subestudio->subestudio = strtoupper($request->subestudio);
        $subestudio->precio = intval(preg_replace('/[^0-9]+/', '', $request->precio), 10);
        $subestudio->save();
        Session::flash('message','Sub-Estudio Actualizado con Exito!');
        return redirect()-> route('subestudios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompEstudios $subestudio)
    {
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha eliminado el sub-estudio: ".strtoupper($subestudio->subestudio),
            'fecha' => date("Y-m-d")
        ]
        );
        $subestudio->delete();
        Session::flash('message','Sub-Estudio Eliminado correctamente');
        return redirect()-> route('subestudios.index');
    }
}
