<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=User::orderBy('id','DESC')->paginate(3);
        return view('auth.consultar_usuario',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Role::all()->pluck('name','id');
        return view('auth.create_user',compact('roles'));
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
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required'
        ]);
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha registrado un nuevo usuario: ".ucwords(strtolower($request->name)),
            'fecha' => date("Y-m-d")
        ]
        );
        $validate_user = User::all()->where('email','like',$request->email);
        if($validate_user->isEmpty()){
            $usuario = new User;
            $usuario->id_rol = $request->rol;
            $usuario->name = ucwords(strtolower($request->name));
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            if($usuario->save()){
                $usuario->assignRole($request->rol);
            }
            Session::flash('message','Usuario Creado correctamente');
            return redirect()-> route('usuario.index');
        }else{
            Session::flash('message','Lo Sentimos ya existe un Usuario con este Correo');
            $roles= Role::all()->pluck('name','id');
            return view('auth.create_user',compact('roles'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        // $usuario = User::findOrFile($id);
        $roles = Role::all()->pluck('name','id');
        return view('auth.edit_user',compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required'
        ]);
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha actualizado el usuario: ".ucwords(strtolower($request->name)),
            'fecha' => date("Y-m-d")
        ]
        );
        $usuario->name = ucwords(strtolower($request->name));
        $usuario->email = $request->email;
        if($request->password != null){
            $usuario->password = $request->password;
        }
        $usuario->id_rol = $request->rol;
        $usuario->syncRoles($request->rol);
        $usuario->save();
        Session::flash('message','Usuario Actualizado correctamente');
        return redirect()-> route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        \DB::table('bitacora')->insert(
        [
            'id_user' => Auth::user()->id,
            'ip' => request()->ip(),
            'log' => "Se ha eliminado el usuario: ".ucwords(strtolower($usuario->name)),
            'fecha' => date("Y-m-d")
        ]
        );
        $usuario->delete();
        Session::flash('message','Usuario Eliminado correctamente');
        return redirect()-> route('usuario.index');
    }
    //
    public function edit_user(User $usuario)
    {
        return view('admin',compact('usuario'));
    }
}
