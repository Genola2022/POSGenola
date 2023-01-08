<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //return redirect()->route('clientes.create')->with(['error' => 'si', 'mensaje' => $ex->getMessage()]);
    public function index(){
        $productos=Producto::all();
        
        return view('productos.index', compact('productos'));
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        //Producto::create($request->all());
        
        $request->validate([
            'codigo' => 'required',
            'nombre'=> 'required',
            'costo' => 'required | numeric',
        ]);
        
        try{
            $producto= new Producto();
            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->costo = $request->costo;
            $producto->afectaexistencias = 0;
            if($request->afectaexistencias == 'on'){
                $producto->afectaexistencias = 1;
            }
            
            $producto->save();
            return redirect()->route('productos.index')->with(['error'=>'no','mensaje'=>'Registro Exitoso']) ;
        }
        catch(Exception $x){
            return redirect()->route('productos.index')->with(['error'=>'si','mensaje'=>$x->getMessage()]) ;
        }

       
    }

    public function destroy(Producto $producto){
        try{
            $producto->delete();
            return redirect()->route('productos.index')->with(['error'=>'no','mensaje'=>'Eliminado']);
        }
        catch(Exception $x){
            return redirect()->route('productos.index')->with(['error'=>'si','mensaje'=>$x->getMessage()]) ;
        }

    }

    public function edit(Producto $producto){
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto){

        $request->validate([
            'codigo' => 'required',
            'nombre'=> 'required',
            'costo' => 'required | numeric',
        ]);

        try{
            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->costo = $request->costo;
            $producto->afectaexistencias = 0;
            if($request->afectaexistencias == 'on'){
                $producto->afectaexistencias = 1;
            }
            $producto->save();
            return redirect()->route('productos.index')->with(['error'=>'no','mensaje'=>'Modificación Exitosa']);
        }
        catch(Exception $x){
            return redirect()->route('productos.edit', $producto)->with(['error'=>'si','mensaje'=>$x-> getMessage()]);
        }

    }

    public function show(Producto $producto){

    }
    
}
