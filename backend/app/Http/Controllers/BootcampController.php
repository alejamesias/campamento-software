<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* echo "aqui se van a mostrar  todos los bootcamps";*/
        return response()->json([
                                     "success"=>true,
                                     "data" => Bootcamp::all()
                                    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*echo "aqui se a guardar un nuevo bootcamp";*/
        //verificar los datos de payload;
        //return $request->all();
        //guardar un nuevo bootcamp
        return response()->json([
                                "success"=> true,
                                "data" => Bootcamp::create($request->all())
                                ], 201);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
                                "success"=> true,
                                "data" => Bootcamp::find($id)
                                ], 200);
        return Bootcamp::find($id);
       /* echo "aqui se va a mostra el bootcamp cuyo id es $id";*/
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // echo "aqui se va a actualizar un bootcamp cuyo id es $id";
       //1. SSeleccionar el bootcamp a actualizar
       $b = Bootcamp::find($id);
       //2. Actualizar bootcamp
       $b->update($request->all());
       //3. Enviar el bootcamp actualizado
       return response()->json([
                                "success"=> true,
                                "data" => $b
                                ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "aqui se va a eliminar el bootcamp cuyo id es $id";
        $b = Bootcamp::find($id);
        $b->delete();
        return response()->json([
                                "success"=> true,
                                "data" => $b
                                ], 200);

    }
}
