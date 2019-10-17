<?php

namespace App\Http\Controllers;

use App\Referencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Referencia::orderBy('id','DESC')->paginate(3);
        return view('areas.referencia.referencia',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.referencia.addreferencia');
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
            'tipo_per' => 'required',
            'cedula' => 'required|regex:/^([VvEeJj]{1})-([0-9]{7,9})-([0-9]{1,1})$/',
            'name' => 'required',
            'telefono' => 'required|regex:/^[0-9]{4}-[0-9]{7}$/',
            'tipo' => 'required',
        ]);
        $tipo_ced = substr($request->cedula,0,1);
        $ced = strtoupper($tipo_ced);
        $cedula = strtoupper($request->cedula);
        //validando RIF de tipo Natural y Juridico
        $validate_ref = Referencia::all()->where('ced_rif','like',$cedula);
        if($request->tipo_per == 'J' && $ced == 'V' || $request->tipo_per == 'N' && $ced == 'J'){
            Session::flash('message','Lo sentimos el RIF no coincide con el tipo de persona seleccionado');
            return view('areas.referencia.addreferencia');
        }elseif($validate_ref->isEmpty()){
            $referencia = new Referencia;
            $referencia->tipo_persona = $request->tipo_per;
            $referencia->ced_rif = strtoupper($request->cedula);
            $referencia->nombre_ref = ucwords(strtolower($request->name));
            $referencia->telefono_ref = $request->telefono;
            $referencia->tipo_ref = $request->tipo;
            $referencia->save();
            \DB::table('bitacora')->insert(
            [
                'id_user' => Auth::user()->id,
                'ip' => request()->ip(),
                'log' => "Se ha registrado una nueva referencia: ".ucwords(strtolower($request->name)),
                'fecha' => date("Y-m-d")
            ]
            );
            Session::flash('message','Referencia Registrada con Exito!');
            return redirect()-> route('referencias.index');
        }else{
            Session::flash('message','La Cédula ó Rif de esta Referencia ya fue Registrado');
            return view('areas.referencia.addreferencia');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Referencia $referencia)
    {
        return view('areas.referencia.editreferencia',compact('referencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referencia $referencia)
    {
        $request->validate([
            'tipo_per' => 'required',
            'cedula' => 'required|regex:/^([VvEeJj]{1})-([0-9]{7,9})-([0-9]{1,1})$/',
            'name' => 'required',
            'telefono' => 'required|regex:/^[0-9]{4}-[0-9]{7}$/',
            'tipo' => 'required',
        ]);
        $referencia->tipo_persona = $request->tipo_per;
        $referencia->ced_rif = $request->cedula;
        $referencia->nombre_ref = ucwords(strtolower($request->name));
        $referencia->telefono_ref = $request->telefono;
        $referencia->tipo_ref = $request->tipo;
        $referencia->save();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha actualizado la referencia de : ".$referencia->nombre_ref.' a '.ucwords(strtolower($request->name)),
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Referencia Actualizada correctamente');
        return redirect()-> route('referencias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ref = Referencia::all()->where('id','like',$id)->first();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha eliminado la referencia: ".$ref->nombre_ref,
            'fecha' => date("Y-m-d")
        ]
        );
        $ref->delete();
        Session::flash('message','Referencia Eliminada correctamente');
        return redirect()-> route('referencias.index');
    }
}
