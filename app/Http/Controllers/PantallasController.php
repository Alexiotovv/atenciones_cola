<?php

namespace App\Http\Controllers;

use App\Models\pantallas;
use Illuminate\Http\Request;
use DB;
class PantallasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pantallas=pantallas::all();
        return view('pantallas.index',['pantallas'=>$pantallas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pantallas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new pantallas();
        if ($request->hasFile('recurso')){
            $file = request('recurso')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('recurso')->getClientOriginalExtension();//extensión
            $recurso= $filename.'_'.time().'.'.$extension;//
            request('recurso')->storeAs('recursos/',$recurso,'public');//refiere carpeta publica es el nombre de disco
            $obj->recurso = $recurso;
        }

        $obj->tipo = request('tipo');
        $obj->save();
        return redirect()->route('pantallas.index')->with('mensaje','Registrado Correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pantallas $pantallas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obj = pantallas::find($id);
        return view('pantallas.edit',['pantalla'=>$obj]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $obj = pantallas::finOrFail($id);
        $obj->recurso = request('recurso');
        $obj->tipo = request('tipo');
        $obj->estado = request('estado');
        $obj->save();
        return redirect()->route('pantallas.index')->with('mensaje','Registro Actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obj = pantallas::destroy($id);
        return redirect()->route('pantallas.index')->with('mensaje','Registro Eliminado!');
    }

    public function pantalla_main(pantallas $pantallas)
    {
        $pantalla=pantallas::where('estado',1)->get();
        return view('pantallas.pantalla_main',['pantalla'=>$pantalla]);
    }

    public function estado($id,$valor){
        try {
            $obj=pantallas::where('estado',1)->update(['estado'=>0]);

            $obj = pantallas::findOrFail($id);
            $obj->estado=$valor;
            $obj->save();
            return response()->json('Estado cambiado');
        } catch (\Throwable $th) {
            return response()->json('Error de Servidor',500);
        }
    }

}
