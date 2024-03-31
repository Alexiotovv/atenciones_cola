<?php

namespace App\Http\Controllers;

use App\Models\atenciones;
use App\Models\llamadas;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class AtencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function desactivar_voz($id){
        $obj=atenciones::findOrFail($id);
        $obj->voz=0;
        $obj->save();
        return response()->json('ok');
    }
    public function activar_voz($id){
        $obj=atenciones::findOrFail($id);
        $obj->voz=1;
        $obj->save();
        return response()->json('ok');
    }

    public function verificarllamada(){
        $obj = atenciones::where('estado',1)->get();
        return response()->json($obj);
    }

    public function llamada($id){
        $obj=atenciones::where('estado',1)
        ->where('user_id',auth()->user()->id)
        ->first();

        if ($obj) {
            return response()->json('Termina la atención actual para realizar otra llamada',409);
        }else{
            $obj=atenciones::findOrFail($id);
            $obj->estado=1;
            $obj->voz=1;
            $obj->save();
            return response()->json('Llamada Realizada jeje');
        }
     }


    public function index()
    {

        if (auth()->user()->role==0) {
            $obj = DB::table('atenciones')
            ->leftjoin('users','users.id','=','atenciones.user_id')
            ->select('atenciones.*','users.name')
            ->get();
        }else{
            $obj = DB::table('atenciones')
            ->where('atenciones.user_id','=',auth()->user()->id)
            ->leftjoin('users','users.id','=','atenciones.user_id')
            ->select('atenciones.*','users.name')
            ->get();
        }

        return view('atenciones.index',['atenciones'=>$obj]);

        
    }


    public function atencion_actual(){
        $paciente=DB::table('atenciones')
        ->where('atenciones.estado','=',1)
        ->where('atenciones.user_id','=',auth()->user()->id)
        ->select('atenciones.nombres','atenciones.apellidos','atenciones.id')
        ->get();

        return response()->json($paciente);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = DB::table('users')
        ->where('users.status',1)
        ->where('users.role',1)
        ->get();
        return view('atenciones.create',['medicos'=>$medicos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new atenciones();
        $obj->nombres = request('nombres');
        $obj->apellidos = request('apellidos');
        $obj->lugar = request('lugar');
        $obj->estado = request('estado');
        $obj->user_id = request('medico');
        $obj->save();
        
        return redirect()->route('atenciones.index')->with('mensaje','Registrado Correctamente!');

    }
    public function terminar($id)
    {   
        $obj = DB::table('atenciones')
        ->where('id','=',$id)
        ->where('estado','=',1)
        ->get();

        if (!$obj->isEmpty()) {
            $obj = atenciones::findOrFail($id);
            $obj->estado = 2;//cerrado
            $obj->voz = 0;//cerrado
            $obj->save();
            return response()->json('Atención Cerrada Correctamente');
        }else{
            return response()->json('Es paciente no se encuentra en atencion',409);
        }



    }
    /**
     * Display the specified resource.
     */
    public function show(atenciones $atenciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicos = DB::table('users')
        ->where('users.status',1)
        ->where('users.role',1)
        ->get();

        $atencion=atenciones::find($id);
        return view('atenciones.edit',['atencion'=>$atencion,'medicos'=>$medicos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id= request('id');
        $obj = atenciones::findOrFail($id);
        $obj->nombres = request('nombres');
        $obj->apellidos = request('apellidos');
        $obj->lugar = request('lugar');
        $obj->estado = request('estado');
        $obj->user_id=request('medico');
        $obj->save();
        return redirect()->route('atenciones.index')->with('mensaje','Actualizado Correctamente!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(atenciones $atenciones)
    {
        //
    }
}
