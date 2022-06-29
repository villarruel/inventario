<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
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
    public function test(){
        $producto   =   Productos::find(1);
        $categoria  =   Categorias::find(3);
        // dd($producto->categorias, $categoria->productos);
        $producto->delete();
    }
}
