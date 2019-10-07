<?php

namespace App\Http\Controllers;

use App\Estudio;
use Illuminate\Http\Request;
use App\Consultorio;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Estudio::orderBy('id','ASC')->paginate(4);
        return view('areas.estudio.estudio',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultorios= Consultorio::all()->pluck('nombre_consult','id');
        return view('areas.estudio.addestudio',compact('consultorios'));
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
            'consultorio' => 'required|regex:/^[1-9]{1,2}/',
            'name' => 'required|regex:/^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{2,20}/',
        ]);

        $estudio = new Estudio;
        $estudio->id_consult = $request->consultorio;
        $estudio->nombre_est = strtoupper($request->name);
        $estudio->save();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha registrado un nuevo estudio: ".strtoupper($request->name),
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Estudio Registrado con Exito!');
        return redirect()-> route('estudio.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudio $estudio)
    {
        $consultorios= Consultorio::all()->pluck('nombre_consult','id');
        return view('areas.estudio.editestudio',compact('estudio','consultorios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudio $estudio)
    {
        $request->validate([
            'consultorio' => 'required|regex:/^[1-9]{1,2}/',
            'name' => 'required|regex:/^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{2,20}/',
        ]);
        $estudio->id_consult = $request->consultorio;
        $estudio->nombre_est = strtoupper($request->name);
        $estudio->save();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha actualizado el estudio: ".strtoupper($request->name),
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Estudio Actualizado con Exito!');
        return redirect()-> route('estudio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $est = Estudio::all()->where('id','like',$id)->first();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha eliminado el estudio: ".$est->nombre_est,
            'fecha' => date("Y-m-d")
        ]
        );
        $est->delete();
        Session::flash('message','Estudio Eliminado correctamente');
        return redirect()-> route('estudio.index');
    }
}
