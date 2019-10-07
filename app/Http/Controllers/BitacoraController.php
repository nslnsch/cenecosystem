<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha = date("Y-m-d");
        $bitacora = Bitacora::orderBy('id','DESC')->paginate(5);
        return view('seguridad.bitacora.bitacora',compact('bitacora','fecha'));
    }
}
