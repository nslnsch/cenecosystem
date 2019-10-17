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
        return view('controlcitas.verificar_citas',compact('query'));
    }
    //retornar la vista de consultas de citas por rango de fechas
    public function index_fecha()
    {
        $fecha1="0000-00-00";
        $fecha2="0000-00-00";
        $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->where('citas.fecha','=',$fecha1)
                ->paginate(4);
        return view('controlcitas.verificar_citas_fecha',compact('query','fecha1','fecha2'));
    }
    //verificar información de la cita actual
    public function verify_cita(Request $request){
        $consulta = $request->search;
        $fecha=date("Y-m-d");
        if($consulta == ''){
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->where('citas.fecha','=',$fecha)
                ->paginate(4);
                return view('controlcitas.verificar_citas',compact('query'));
        }else{
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.genero','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->where('citas.fecha', 'like', $fecha)
                ->where(function($query) use ($consulta){
                        $query->where('pacientes.cedula','like','%'.$consulta.'%')
                       ->orWhere('pacientes.nombre','like','%'.$consulta.'%');
                })->paginate(4);
            return view('controlcitas.verificar_citas',compact('query'));
        }
    }
    //verificar información de la cita por rango de fecha
    public function verify_cita_fecha(Request $request){
        $consulta = $request->search;
        $fecha = '0000-00-00';
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        if($fecha1 == '' || $fecha2 == ''){
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->where('citas.fecha','=',$fecha)
                ->paginate(4);
                return view('controlcitas.verificar_citas_fecha',compact('query'));
        }else if ($fecha1 !== '' || $fecha2 !== ''){
            $query = DB::table('citas')
                ->join('pacientes', 'citas.id_pac', 'pacientes.id')
                ->join('estudios', 'citas.id_est', 'estudios.id')
                ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
                ->join('referencias', 'citas.id_ref', 'referencias.id')
                ->select('citas.*','pacientes.genero','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
                ->whereBetween('citas.fecha', [$fecha1, $fecha2])
                ->where(function($query) use ($consulta){
                        $query->where('pacientes.cedula','like','%'.$consulta.'%')
                       ->orWhere('pacientes.nombre','like','%'.$consulta.'%');
                })->paginate(4);
            return view('controlcitas.verificar_citas_fecha',compact('query','fecha1','fecha2'));
        }
    }
}
