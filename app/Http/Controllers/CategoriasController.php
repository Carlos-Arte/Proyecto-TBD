<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias =DB::connection('mariadb')->table('categorias')->get();
        $categorias2 =DB::connection('mariadb02')->table('categorias')->get();

        $categoria = $categorias->merge($categorias2);

        return view('categorias/index', ['categorias' => $categoria]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categorias = new Categorias;

        $categorias->nombre=$request->input("nombre");
        $categorias->descripcion=$request->input("descripcion");

        $categorias->save();
        return redirect('/categoria')->with('success', 'Categoría creada correctamente.');
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
        return view('categorias/crear');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        $categorias = DB::table("categorias")->select ('categorias.id', 'categorias.nombre', 'categorias.descripcion' )->where("id", "=", $id);
                    
        return view ("categorias/editar",["categorias"=>$categorias->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $categorias= Categorias::findOrFail($id);

        $categorias->nombre=$request->input("nombre");
        $categorias->descripcion=$request->input("descripcion");

        $categorias->save();
        return redirect('/categoria')->with('success', 'Categoría editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorias = DB::table("categorias")->WHERE ('categorias.id', '=', $id );

         $categorias->delete();
        
    }
}
