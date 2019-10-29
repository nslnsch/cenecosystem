<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //registrar cita
    public function newcita(Request $request)
    {
        //verificar id de la referencia
        if($request->id_ref == ''){
            $id_ref = 0;
        }else{
            $id_ref=$request->id_ref;
        }
        /****************************************************************/
        $referencia = Referencia::all()->where('id', 'like',$id_ref);
        //obterner los datos del paciente
        $id_pac = $request->id_pac;
        $pacientes = Paciente::all()->where('id', 'like',$id_pac);
        $consultorios = Consultorio::all();
        /****************************************************************/
        return view('citas.newcita',compact('pacientes','referencia','consultorios'));
    }

    public function index()
    {
        return view('citas.sol_pac');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citas.addpaciente');
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
            'genero' => 'required',
            'cedula' => 'required|regex:/^([VvEe]{1})-([0-9]{6,8})-?([0-9]{1,1}?)$/',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|regex:/^([0-9]{4}-[0-9]{7})$/',
            'fecnac' => 'required',
            'direccion' => 'required'
        ]);
        $validate_pac = Paciente::all()->where('cedula','like',$request->genero);
        if($validate_pac->isEmpty()){
            $paciente = new Paciente;
            $paciente->genero = $request->genero;
            $paciente->cedula = $request->cedula;
            $paciente->nombre = ucwords(strtolower($request->nombre));
            $paciente->apellido = ucwords(strtolower($request->apellido));
            $paciente->telefono = $request->telefono;
            $paciente->fecnac = $request->fecnac;
            $paciente->dirhab = $request->direccion;
            $paciente->save();
            \DB::table('bitacora')->insert(
            [
                'id_user' => Auth::user()->id,
                'ip' => request()->ip(),
                'log' => "Se ha registrado un nuevo paciente ".ucwords(strtolower($request->nombre))." ".ucwords(strtolower($request->apellido)),
                'fecha' => date("Y-m-d")
            ]
            );
            Session::flash('message','Paciente Registrado con Exito!');
            return redirect()-> route('paciente.create');
        }else{
            Session::flash('message','Lo Sentimos esta Cédula ya pertenece a un paciente');
            return redirect()-> route('paciente.create');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'genero' => 'required',
            'cedula' => 'required|regex:/^([VvEe]{1})-([0-9]{6,8})-?([0-9]{1,1}?)$/',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|regex:/^([0-9]{4}-[0-9]{7})$/',
            'fecnac' => 'required',
            'direccion' => 'required'
        ]);
        $paciente->genero = $request->genero;
        $paciente->cedula = $request->cedula;
        $paciente->nombre = ucwords(strtolower($request->nombre));
        $paciente->apellido = ucwords(strtolower($request->apellido));
        $paciente->telefono = $request->telefono;
        $paciente->fecnac = $request->fecnac;
        $paciente->dirhab = $request->direccion;
        $paciente->save();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha actualizado el paciente : ".ucwords(strtolower($request->nombre)),
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Paciente Actualizado correctamente');
        return redirect()-> route('home');
    }
}
