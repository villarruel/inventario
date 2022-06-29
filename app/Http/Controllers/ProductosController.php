<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    
    public function index(){
        $productos  =   Productos::all();
        return response()->json($productos);
    }

    
    public function create(){
        //
    }

    
    public function store(Request $request){
        $producto   =   Productos::create($request->post());
        return response()->json([
                                    'producto'=>$producto,
                                    'mensaje'=>'Producto creado'
                                ]);
    }

    
    public function show(Productos $producto){
        return response()->json($producto);
    }

    
    public function edit($id){
        //
    }

    
    public function update(Request $request, Productos $producto){
        $producto->fill($request->post())->save();
        return response()->json([
                                    'producto'=>$producto,
                                    'mensaje'=>'Producto actualizado'
                                ]);
    }

    
    public function destroy(Productos $producto){
        $producto->delete();
        return response()->json([
                                    'mensaje'=>'Producto eliminado'
                                ]);
    }
}
