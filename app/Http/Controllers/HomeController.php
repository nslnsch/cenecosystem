<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \App\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(){
        return view('auth.login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user('name');
        $rol = $user->roles->implode('name', ', ');
        $c1='Consultorio1';
        $c2='Consultorio2';
        $c3='Consultorio3';
        $c4='Consultorio4';
        $estado="EnEspera";
        $fecha=date("Y-m-d");
        $fechaact=date("m");
        $fechaanterior = $fechaact - 1;
        /*****************estadistica mes actual por consultorio********************/
        $con1act = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c1)
            ->whereMonth('citas.fecha', $fechaact)
            ->get());
        $con2act = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c2)
            ->whereMonth('citas.fecha', $fechaact)
            ->get());
        $con3act = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c3)
            ->whereMonth('citas.fecha', $fechaact)
            ->get());
        $con4act = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c4)
            ->whereMonth('citas.fecha', $fechaact)
            ->get());
        /*****************estadistica mes anterior por consultorio********************/
        $con1 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c1)
            ->whereMonth('citas.fecha', $fechaanterior)
            ->get());
        $con2 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c2)
            ->whereMonth('citas.fecha', $fechaanterior)
            ->get());
        $con3 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c3)
            ->whereMonth('citas.fecha', $fechaanterior)
            ->get());
        $con4 = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('consultorios.nombre_consult','=',$c4)
            ->whereMonth('citas.fecha', $fechaanterior)
            ->get());
        /**************************************************************************/
        $notificacion = count(DB::table('citas')
            ->join('pacientes', 'citas.id_pac', 'pacientes.id')
            ->join('estudios', 'citas.id_est', 'estudios.id')
            ->join('consultorios', 'estudios.id_consult', 'consultorios.id')
            ->join('referencias', 'citas.id_ref', 'referencias.id')
            ->select('citas.*','consultorios.nombre_consult')
            ->where('citas.fecha','=',$fecha)
            ->where('citas.estado','=',$estado)
            ->get());
        switch ($rol) {
            case 'usuario':
                $mensaje = "Bienvenid@ ".$rol;
                return view('home',compact('mensaje','user','con1','con2','con3','con4','notificacion','con1act','con2act','con3act','con4act'));
            break;

            case 'admin':
                $mensaje = "Bienvenid@ ".$rol;
                return view('home',compact('mensaje','user','con1','con2','con3','con4','notificacion','con1act','con2act','con3act','con4act'));
            break;

            case 'super-admin':
                $mensaje = "Bienvenid@ ".$rol;
                return view('home',compact('mensaje','user','con1','con2','con3','con4','notificacion','con1act','con2act','con3act','con4act'));
            break;
        }
    }
}
