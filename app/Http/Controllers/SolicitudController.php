<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Consultorio;
use App\Referencia;
use App\Estudio;
use App\CompEstudios;
use App\CitaRef;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function sol_pac()
    {
        return view('citas.solpaciente');
    }

    //ir a la vista para editar el perfil del paciente
    public function edit_pac()
    {
        return view('citas.sol_pac');
    }

    //enviar datos a la vista selreferencia
    public function sel_ref(Request $request)
    {
        $request->validate([
            'cedula' => 'required|regex:/^([VvEe]{1})-([0-9]{7,9})-?([0-9]{0,9}?)$/'
        ]);
        $c1='Consultorio1';
        $c2='Consultorio2';
        $c3='Consultorio3';
        $c4='Consultorio4';
        $fecha=date("Y-m-d");

        //bloque para incrementar el total de citas en un consultorio
        $cons1 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c1)
            ->where('citas.fecha','=',$fecha)
            ->get());
        //echo($cons1);
        /**********************************************************/
            //bloque para incrementar el total de citas en un consultorio
        $cons2 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c2)
            ->where('citas.fecha','=',$fecha)
            ->get());
        //echo ($cons2);
        /**********************************************************/
            //bloque para incrementar el total de citas en un consultorio
        $cons3 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c3)
            ->where('citas.fecha','=',$fecha)
            ->get());
        //echo ($cons3);
        /**********************************************************/
            //bloque para incrementar el total de citas en un consultorio
        $cons4 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c4)
            ->where('citas.fecha','=',$fecha)
            ->get());
        //echo ($cons3);
        /*************definir limite del consultorio*********************************************/
        $limit_con1 = Consultorio::all()->where('nombre_consult','=',$c1)->first();
        $limit_c1= $limit_con1->limite;
        $limit_con2 = Consultorio::all()->where('nombre_consult','=',$c2)->first();
        $limit_c2= $limit_con2->limite;
        $limit_con3 = Consultorio::all()->where('nombre_consult','=',$c3)->first();
        $limit_c3= $limit_con3->limite;
        $limit_con4 = Consultorio::all()->where('nombre_consult','=',$c4)->first();
        $limit_c4= $limit_con4->limite;
        /**************************************************************************************/
        $referencia=Referencia::all();
        $cedula = $request->cedula;
        $paciente = Paciente::all()->where('cedula', 'like',$cedula);
        if (!$paciente->isEmpty()){
            return view('citas.selreferencia',compact('paciente','referencia','cons1','cons2','cons3','cons4','limit_c1','limit_c2','limit_c3','limit_c4','c1','c2','c3','c4'));
        }else{
            Session::flash('message','El Paciente no esta Registrado');
            return redirect()-> route('paciente.create');
        }
    }

    //validar informacion del paciente
    public function edit_pac_upd(Request $request){
        $request->validate([
            'cedula' => 'required|regex:/^([VvEe]{1})-([0-9]{7,9})-?([0-9]{0,9}?)$/'
        ]);
        $cedula = $request->cedula;
        $paciente = Paciente::all()->where('cedula', 'like',$cedula);
        if (!$paciente->isEmpty()){
            return view('citas.editpaciente',compact('paciente'));
        }else{
            Session::flash('message','El Paciente no esta Registrado');
            return redirect()-> route('paciente.create');
        }

    }


    //ir a la vista de solicitud de cedula
    public function sol_hist(){
        return view('consultas.sol_hist');
    }

    //solicitar cedula para visualizar el historial del paciente
    public function historial(Request $request){
        $request->validate([
            'cedula' => 'required|regex:/^([VvEe]{1})-([0-9]{7,9})-?([0-9]{0,9}?)$/'
        ]);
        $paciente = Paciente::all()->where('cedula','like',$request->cedula)->first();
        if (isset($paciente)){
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->join('cita_refs', 'cita_refs.id_cita', 'citas.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref','cita_refs.id_real')
                ->where('citas.id_pac','=',$paciente->id)
                ->paginate(2);
            return view('consultas.historial',compact('query','paciente'));
        }else{
            Session::flash('message','No existe Historial de este paciente');
            return redirect()-> route('sol_hist');
        }
    }

    //funcion para obtener estudios
    public function getEstudios(Request $request)
    {
        if ($request->ajax()) {
            //dd($request->consultorio);
            $estudios = Estudio::where('id_consult', $request->consultorio)->get();
            //dd($estudios);
            foreach ($estudios as $estudio) {
                $estudiosArray[$estudio->id] = $estudio->nombre_est;
            }
            return response()->json($estudiosArray);
        }
    }

    //funcion para obtener subestudio
    public function getSubEstudios(Request $request)
    {
        if ($request->ajax()) {
            $subestudios = CompEstudios::where('id_est', $request->estudio)->get();
            foreach ($subestudios as $subestudio) {
                $subestudiosArray[$subestudio->subestudio] = $subestudio->subestudio;
            }
            return response()->json($subestudiosArray);
        }
    }

    //funcion para obtener  precio
    public function getPrecio(Request $request)
    {
        if ($request->ajax()) {
            $subestudiosprecios = CompEstudios::where('subestudio', $request->subest)->get();
            foreach ($subestudiosprecios as $subestudioprecio) {
                $subestudiospreciosArray[$subestudioprecio->precio] = $subestudioprecio->precio;
            }
            return response()->json($subestudiospreciosArray);
        }
    }
    //funcion para obtener las referencias
    public function getreferencia(Request $request)
    {
        if ($request->ajax()) {
            $tipo_referencia = Referencia::where('tipo_ref','=', $request->tipo_ref)->get();
            foreach ($tipo_referencia as $tipo_ref) {
                $tipo_referenciaArray[$tipo_ref->id] = $tipo_ref->nombre_ref;
            }
            return response()->json($tipo_referenciaArray);
        }
    }
    //funcion para filtrar las referencias
    public function getfiltrar(Request $request)
    {
        if ($request->ajax()) {
            $datos_filtrados = Referencia::where('tipo_ref','=', $request->tipo_ref)->where('nombre_ref','like','%'.ucwords(strtolower(trim($request->buscar.'%'))))->get();
            foreach ($datos_filtrados as $filtrados) {
                $datos_filtradosArray[$filtrados->id] = $filtrados->nombre_ref;
            }
            return response()->json($datos_filtradosArray);
        }
    }
}
