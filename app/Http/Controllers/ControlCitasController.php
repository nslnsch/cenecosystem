<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultorio;
use App\Cita;
use Illuminate\Support\Facades\DB;

class ControlCitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultorios=Consultorio::all();
        $fecha=date("Y-m-d");
        $query = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
            ->where('citas.fecha','=',$fecha)
            ->orderBy('consultorios.nombre_consult', 'asc')
            ->paginate(4);
        return view('controlcitas.verificar_citas',compact('consultorios','query'));
    }

    //verificar información de la cita
    public function verify_cita(Request $request){
        $consultorio = $request->consultorio;
        $consulta = $request->consulta;
        $consultorios=Consultorio::all();
        //en caso de ser fecha de hoy
        if ($consulta == "hoy" && $consultorio == ""){
            $fecha=date("Y-m-d");
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->where('citas.fecha','=',$fecha)
                ->paginate(4);
            return view('controlcitas.verificar_citas',compact('query','consultorios'));
        }else if ($consulta == "hoy" && $consultorio == $request->consultorio){
            $fecha=date("Y-m-d");
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->where('citas.fecha','=',$fecha)
                ->where('consultorios.nombre_consult','=',$consultorio)
                ->paginate(4);
            return view('controlcitas.verificar_citas',compact('query','consultorios'));
        }else if ($consulta == "mesactual"){
            //consultar en caso de ser mes actual
            $consultorios=Consultorio::all();
            $fechaact=date("m");
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->whereMonth('citas.fecha', $fechaact)
                ->paginate(4);
            return view('controlcitas.verificar_citas',compact('query','consultorios'));
        }else if ($consulta == "mesanterior"){
            //consultar en caso de ser el mes anterior
            $consultorios=Consultorio::all();
            $fechaact=date("m");
            $fechaanterior = $fechaact - 1;
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->whereMonth('citas.fecha', $fechaanterior)
                ->paginate(4);
            return view('controlcitas.verificar_citas',compact('query','consultorios'));
        }
    }
}
