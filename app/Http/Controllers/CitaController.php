<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Consultorio;
use App\Referencia;
use App\Cita;
use App\CitaRef;
use App\Estudio;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CitaController extends Controller
{

    //Metodo para recaudar información y enviarla al formulario del registro de la cita
    public function addcita(Request $request){
        //verificar id de la referencia
        $id_ref=$request->referencia;
        $id_real = $request->id_real;
        /****************************************************************/
        $referencia = Referencia::all()->where('id', 'like',$id_ref);
        //obterner los datos del paciente
        $id_pac = $request->id_pac;
        $pacientes = Paciente::all()->where('id', 'like',$id_pac);
        //obtener datos del consultorio
        $consultorios = Consultorio::all();
        /****************************************************************/
        return view('citas.addcita',compact('pacientes','referencia','consultorios','id_real'));
    }

    //Metodo para cambiar status del estudio
    public function check(Request $request, Cita $cita)
    {
        $cita = Cita::all()->where('id','like',$request->id)->first();
        $pac = Paciente::all()->where('id','like',$cita->id_pac)->first();
        $status = 'Entregado';
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se Entrego el Estudio del Paciente ".$pac->nombre." ".$pac->apellido,
            'fecha' => date("Y-m-d")
        ]
        );
        $recibidopor = substr($request->id, 11);
        $query = Cita::all()->where('id','=',$request->id)->first();
        $query->estado = $status;
        $query->recibido = $recibidopor;
        $query->save();
        return redirect()-> route('controlcita.index');
    }
    //Metodo para cambiar status del estudio desde el rango de fecha
    public function check_fecha(Request $request, Cita $cita)
    {
        $fecha1 = ($request->fecha1);
        $fecha2 = (substr($request->fecha2,0, 10));
        $cita = Cita::all()->where('id','like',$request->id)->first();
        $pac = Paciente::all()->where('id','like',$cita->id_pac)->first();
        $status = 'Entregado';
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se Entrego el Estudio del Paciente ".$pac->nombre." ".$pac->apellido,
            'fecha' => date("Y-m-d")
        ]
        );
        $recibidopor = substr($request->fecha2,20,50);
        $query = Cita::all()->where('id','=',$request->id)->first();
        $query->estado = $status;
        $query->recibido = $recibidopor;
        $query->save();
        $query = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','pacientes.genero','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
            ->whereBetween('citas.fecha', [$fecha1, $fecha2])
            ->paginate(4);
        return view('controlcitas.verificar_citas_fecha',compact('query','fecha1','fecha2'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cita $citaref)
    {
        $request->validate([
            'id_pac' => 'required',
            'estudio' => 'required',
            'id_ref' => 'required',
            'subest' => 'required',
            'precio' => 'required',
            'tipo_cita' => 'required',
            'fecha' => 'required'
        ]);
        $estado = 'EnEspera';
        $recibidopor = 'EnEspera';
        $estado_pago = 'Por Pagar';
        $cita = new Cita;
        $cita->id_pac = $request->id_pac;
        $cita->id_est = $request->estudio;
        $cita->id_ref = $request->id_ref;
        $cita->comp = $request->subest;
        $cita->estado = $estado;
        $cita->costo = intval(preg_replace('/[^0-9]+/', '', $request->precio), 10);
        $cita->tipo_cita = $request->tipo_cita;
        $cita->fecha =  $request->fecha;
        $cita->recibido =  $recibidopor;
        $cita->estado_pago =  $estado_pago;
        $id_real = $request->id_real;
        //validar estudios
        $validate_estudio = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->join('comp_estudios', 'citas.comp', 'comp_estudios.subestudio')
            ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref','comp_estudios.precio')
            ->where('citas.fecha','=',$request->fecha)
            ->where('citas.id_est','=',$request->estudio)
            ->where('citas.id_pac','=',$request->id_pac)
            ->where('citas.comp','=',$request->subest)
            ->get();
        //conteo para validar consultorio
        $validate_consultorio = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('consultorios.nombre_consult')
            ->where('estudios.id_consult','=',$request->consultorio)
            ->where('citas.fecha','=',$request->fecha)
            ->get());
        //obtener limite del consultorio seleccionado
        $limite_consultorio = Consultorio::all()->where('id','=',$request->consultorio)->first();
        //condicional en caso de sobrepasar el limite del consultorio
        if($validate_consultorio >= $limite_consultorio->limite){
            $referencia = Referencia::all()->where('id', 'like',$request->id_ref);
            $pacientes = Paciente::all()->where('id', 'like',$request->id_pac);
            $consultorios = Consultorio::all();
            Session::flash('message','Lo Sentimos!! Se Alcanzó El Maximo de Registros en el Consultorio Seleccionado!');
            return view('citas.addcita',compact('pacientes','referencia','consultorios','id_real'));
        }else if($validate_estudio->isEmpty()){
        //condicional en caso de que no se cumplan las condiciones anteriores
        //guardar registro de la cita
            $cita->save();
            $cita = Cita::all()->last();
            $id_cita = $cita->id;
            $citaref = new CitaRef;
            $citaref->id_cita = $id_cita;
            $citaref->id_real = $request->id_real;
            $citaref->save();
            //traer informacion del paciente para guardar en bitacora
            $pac = Paciente::all()->where('id','like',$request->id_pac)->first();
            \DB::table('bitacora')->insert(
            [
                'id_user' => Auth::user()->id,
                'ip' => request()->ip(),
                'log' => "Registro de cita para el paciente ".$pac->nombre." ".$pac->apellido,
                'fecha' => date("Y-m-d")
            ]
            );
            Session::flash('message','Cita Registrada con Exito!');
            return redirect()-> route('home');
        }else{
        //condicional en caso de que ya se le haya asignado el estudio al paciente en la fecha actual
            $referencia = Referencia::all()->where('id', 'like',$request->id_ref);
            $pacientes = Paciente::all()->where('id', 'like',$request->id_pac);
            $consultorios = Consultorio::all();
            Session::flash('message','El Estudio ya fue Registrado para este Paciente!');
            return view('citas.addcita',compact('pacientes','referencia','consultorios','id_real'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        $pacientes = Paciente::all()->where('id', '=',$cita->id_pac)->first();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Verificar información completa de la cita paciente: ".$pacientes->nombre." ".$pacientes->apellido,
            'fecha' => date("Y-m-d")
        ]
        );
        $datos = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
            ->where('citas.id','=',$cita->id)
            ->first();
        $id_cita = CitaRef::all()->where('id_cita','like',$datos->id)->first();
        $realizado = $id_cita->id_real;
        $referencia=Referencia::all()->where('id','like',$realizado)->first();
        return view('controlcitas.showinfocita',compact('pacientes','datos','referencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        $pacientes = Paciente::all()->where('id', 'like',$cita->id_pac);
        $consultorios = Consultorio::all();
        $datocita = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','pacientes.genero','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','pacientes.dirhab','pacientes.fecnac','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
            ->where('citas.id','=',$cita->id)
            ->first();
        $id_cita = CitaRef::all()->where('id_cita','like',$datocita->id)->first();
        $realizado = $id_cita->id_real;
        $referencia=Referencia::all()->where('id','like',$realizado)->first();
        return view('citas.editcita',compact('pacientes','consultorios','datocita','referencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita, CitaRef $citaref)
    {
        $request->validate([
            'id_pac' => 'required',
            'estudio' => 'required',
            'subest' => 'required',
            'precio' => 'required',
            'tipo_cita' => 'required',
            'fecha' => 'required'
        ]);
        $estado = 'EnEspera';
        $recibidopor = 'EnEspera';
        $cita->id_est = $request->estudio;
        $cita->comp = $request->subest;
        $cita->costo = intval(preg_replace('/[^0-9]+/', '', $request->precio), 10);
        $cita->tipo_cita = $request->tipo_cita;
        $cita->fecha =  $request->fecha;
        $cita->estado = $estado;
        $cita->recibido =  $recibidopor;
        $cita->estado_pago =  $request->edo_pago;

        $cita->save();
        $citaref = CitaRef::all()->where('id_cita','=',$cita->id)->first();
        $citaref->id_real =  $request->id_real;
        $citaref->save();
        $pac = Paciente::all()->where('id','like',$cita->id_pac)->first();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Cita actualizada para el paciente ".$pac->nombre." ".$pac->apellido,
            'fecha' => date("Y-m-d")
        ]
        );
        Session::flash('message','Cita Actualizada con Exito!');
        return redirect()-> route('controlcita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita, Request $id)
    {
        $pacientes = Paciente::all()->where('id', '=',$cita->id_pac)->first();
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se eliminó la cita del paciente: ".$pacientes->nombre." ".$pacientes->apellido,
            'fecha' => date("Y-m-d")
        ]
        );
        $cita = Cita::all()->where('id','like',$cita->id)->first();
        $cita->delete();
        Session::flash('message','Cita Eliminada correctamente');
        $consultorios=Consultorio::all();
        $c1 = "Consultorio1";
        $fecha=date("Y-m-d");
        $query = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
            ->where('citas.fecha','=',$fecha)
            ->where('consultorios.nombre_consult','=',$c1)
            ->paginate(4);
        return view('controlcitas.verificar_citas',compact('consultorios','query'));
    }
}
