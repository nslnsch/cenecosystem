<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Referencia;
use App\Bitacora;

class ReporteController extends Controller
{
	//funcion para imprimir reporte del control de citas actuales
	public function imprimir(){
		$fecha = date("Y-m-d");
		$today = date("d-m-Y");
	    $query = DB::table('citas')
		    ->join('pacientes', 'citas.id_pac', 'pacientes.id')
		    ->join('estudios', 'citas.id_est', 'estudios.id')
		    ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
		    ->join('referencias', 'citas.id_ref', 'referencias.id')
		    ->join('comp_estudios', 'citas.comp', 'comp_estudios.subestudio')
		    ->select('citas.*','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref','comp_estudios.precio')
		    ->where('citas.fecha','=',$fecha)
		    ->get();
		//total de pacientes atendidos
	    $estado = 'Entregado';
	   	$atend = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('consultorios.nombre_consult')
            ->where('citas.estado','=',$estado)
            ->where('citas.fecha','=',$fecha)
            ->get());
	   	//seleccionar nombre del gerente que firmará el reporte
	   	$tipo_ref = 'GTE';
	   	$firma = Referencia::all()->where('tipo_ref','=',$tipo_ref)->first();
	  	$gte = $firma->nombre_ref;
	  	$pdf = \PDF::loadView('reportes.reporte', compact('fecha','query','today','atend','gte'));
	  	return $pdf->download('reporte_ceneco.pdf');
	}
	//funcion para imprimir reporte del control de citas por rango de fechas
	public function imprimir_citas_fechas(Request $request){
		$fecha1 = $request->fecha1;
		$fecha2 = $request->fecha2;
		$query = DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','pacientes.genero','pacientes.nombre','pacientes.apellido','pacientes.cedula','pacientes.telefono','estudios.nombre_est','consultorios.nombre_consult','referencias.nombre_ref')
            ->whereBetween('citas.fecha', [$fecha1, $fecha2])
            ->get();
      	//total de pacientes atendidos
	    $estado = 'Entregado';
	   	$atend = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('consultorios.nombre_consult')
            ->where('citas.estado','=',$estado)
            ->whereBetween('citas.fecha', [$fecha1, $fecha2])
            ->get());
	   	//seleccionar nombre del gerente que firmará el reporte
	   	$tipo_ref = 'GTE';
	   	$firma = Referencia::all()->where('tipo_ref','=',$tipo_ref)->first();
	  	$gte = $firma->nombre_ref;
	  	$pdf = \PDF::loadView('reportes.reporte_cita', compact('fecha1','fecha2','query','atend','gte'));
	  	return $pdf->download('reporte_ceneco.pdf');
	}
	//funcion para imprimir reporte de la bitácora
	public function imprimir_bitacora(Request $request){
		$request_fecha = $request->fecha;
	   	//seleccionar nombre del gerente que firmará el reporte
	   	$tipo_ref = 'GTE';
	   	$firma = Referencia::all()->where('tipo_ref','=',$tipo_ref)->first();
	  	$gte = $firma->nombre_ref;
		$query = Bitacora::all()->where('fecha','=',$request_fecha);
		$pdf = \PDF::loadView('reportes.reporte_bitacora', compact('query','gte','request_fecha'));
	  	return $pdf->download('reporte_ceneco_bitacora.pdf');
	}
}
