<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function backup()
    {
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha generado un archivo de respaldo en la carpeta public ",
            'fecha' => date("Y-m-d")
        ]
        );
        $date=date("d-m-Y");
        MySql::create()
        ->setDbName(\DB::getConfig('database'))
        ->setUserName(\DB::getConfig('username'))
        ->setPassword(\DB::getConfig('password'))
        ->dumpToFile('backup_ceneco_'.$date.'.sql');

        Session::flash('message','La base de datos ha sido respaldada correctamente');
        return redirect()-> route('home');
    }
}
