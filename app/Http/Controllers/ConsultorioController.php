<?php

namespace App\Http\Controllers;

use App\Consultorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datos=Consultorio::orderBy('id','DESC')->paginate(3);
        return view('areas.consultorio.consultorio',compact('datos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.consultorio.addconsultorio');
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
            'name' => 'required|regex:/^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{11}[1-9]{1}/',
            'limite' => 'required|regex:/^[1-9]{1,2}/',
        ]);
        $consultorio = new Consultorio;
        $consultorio->nombre_consult = $request->name;
        $consultorio->limite = $request->limite;
        $consultorio->save();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha registrado un nuevo consultorio: ".$request->name,
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Consultorio Registrado con Exito!');
        return redirect()-> route('consultorio.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultorio $consultorio)
    {
        return view('areas.consultorio.editconsultorio',compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultorio $consultorio)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{11}[1-9]{1}/',
            'limite' => 'required|regex:/^[1-9]{1,2}/',
        ]);
        $consultorio->update($request->all());
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha actualizado el ".$request->name,
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Consultorio Actualizado correctamente');
        return redirect()-> route('consultorio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $con = Consultorio::all()->where('id','like',$id)->first();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha eliminado el : ".$con->nombre_consult,
            'fecha' => date("Y-m-d")
        ]
        );
        $con->delete();
        Session::flash('message','Consultorio Eliminado correctamente');
        return redirect()-> route('consultorio.index');
    }
}
