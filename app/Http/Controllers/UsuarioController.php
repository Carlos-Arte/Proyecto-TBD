<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =DB::connection('mariadb')->table('users')->get();
        $users2 =DB::connection('mariadb02')->table('users')->get();

        $user = $users->merge($users2);

        return view('users/index', ['usuarios' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $users= new Usuarios;
         

        $users->imagen=$request->input("imagen");
        $users->perfil=$request->input("perfil");
        $users->username=$request->input("username");
        $users->estado=$request->input("estado", 1);
        $users->name=$request->input("name");
        $users->apellido_paterno=$request->input("apellido_paterno");
        $users->apellido_materno=$request->input("apellido_materno");
        $users->email=$request->input("email");
        $users->password = bcrypt($request->input('password'));
        $users->descripcion=$request->input("descripcion");
        
        $users->save();
        return redirect('/')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('users/crear');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        $users = DB::table("users")->select ('users.id', 'users.imagen', 'users.perfil', 'users.username', 'users.estado',
        'users.name', 'users.apellido_paterno', 'users.apellido_materno', 'email', 'password', 'descripcion' )->where("id", "=", $id);
                    
        return view ("users/editar",["users"=>$users->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $users= Usuarios::findOrFail($id);

        $users->imagen=$request->input("imagen");
        $users->perfil=$request->input("perfil");
        $users->username=$request->input("username");
        $users->estado=$request->input("estado", 1);
        $users->name=$request->input("name");
        $users->apellido_paterno=$request->input("apellido_paterno");
        $users->apellido_materno=$request->input("apellido_materno");
        $users->email=$request->input("email");
        $users->descripcion=$request->input("descripcion");

        if ($request->filled('password')) {
            $users->password = bcrypt($request->input('password'));
        }
        
        $users->save();
        return redirect('/')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $usuarios = DB::table("users")->WHERE ('users.id', '=', $id );

         $usuarios->delete();
    }
}
