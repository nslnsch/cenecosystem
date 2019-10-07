<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultorio;
use App\Referencia;
use App\Estudio;
use App\User;
use App\CompEstudios;
use App\Paciente;
use App\Bitacora;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    //Consultar Consultorio
    public function search_consultorio(Request $request){
        if($request->search == ''){
            $datos = Consultorio::orderBy('id','DESC')->paginate(3);
            return view('areas.consultorio.consultorio',compact('datos'));
        }else{
        	$datos = Consultorio::where('id', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orWhere('nombre_consult', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orderBy('id', 'desc')->paginate(3);
            return view('areas.consultorio.consultorio',compact('datos'));
        }

    }

    //Consultar Referencia
    public function search_referencia(Request $request){
        if($request->search == ''){
            $datos = Referencia::orderBy('id','DESC')->paginate(3);
            return view('areas.referencia.referencia',compact('datos'));
        }else{
        	$datos = Referencia::where('nombre_ref', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orWhere('tipo_ref', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orderBy('id', 'desc')->paginate(3);
            return view('areas.referencia.referencia',compact('datos'));
        }

    }

    //Consultar Estudio
    public function search_estudio(Request $request){
        if($request->search == ''){
            $datos = Estudio::orderBy('id','ASC')->paginate(4);
            return view('areas.estudio.estudio',compact('datos'));
        }else{
        	$datos = Estudio::where('id_consult', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orWhere('nombre_est', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orderBy('id', 'asc')->paginate(3);
            return view('areas.estudio.estudio',compact('datos'));
        }

    }

    //Consultar Sub-Estudio
    public function search_complemento(Request $request){
        if($request->search == ''){
            $datos = CompEstudios::orderBy('id','ASC')->paginate(4);
            return view('areas.complemento.complemento',compact('datos'));
        }else{
        	$datos = CompEstudios::where('id_est', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orWhere('subestudio', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orderBy('id', 'asc')->paginate(4);
            return view('areas.complemento.complemento',compact('datos'));
        }

    }

    //Consultar Usuarios
    public function search_user(Request $request){
        if($request->search == ''){
            $datos = User::orderBy('id','DESC')->paginate(3);
            return view('auth.consultar_usuario',compact('datos'));
        }else{
        	$datos = User::where('name', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orWhere('email', 'like', '%'.ucwords(strtolower(trim($request->search))).'%')
                ->orderBy('id', 'desc')->paginate(3);
            return view('auth.consultar_usuario',compact('datos'));
        }

    }
    //Consultar Bitacora
    public function search_bitacora(Request $request){
        if($request->search == ''){
            $fecha = date("Y-m-d");
            $bitacora = Bitacora::orderBy('id','DESC')->paginate(5);
            return view('seguridad.bitacora.bitacora',compact('bitacora','fecha'));
        }else{
            $fecha = $request->search;
            $bitacora = Bitacora::where('fecha', 'like', '%'.$request->search.'%')
                ->orderBy('id', 'desc')->paginate(5);
            return view('seguridad.bitacora.bitacora',compact('bitacora','fecha'));
        }

    }
}
