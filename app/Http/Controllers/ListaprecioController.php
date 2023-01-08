<?php

namespace App\Http\Controllers;

use App\Models\Listaprecio;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Return_;

class ListaprecioController extends Controller
{
    //
    public function index (){
        $precios=Listaprecio::all();
        return view('listaprecios.index', compact('precios'));
    }

    public function create(){
        return view('listaprecios.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=> 'required',
        ]);
        
        try{
            $precio= new Listaprecio();
            $precio->nombre = $request->nombre;
            
            $precio->save();
            return redirect()->route('listaprecios.index')->with(['error'=>'no','mensaje'=>'Registro Exitoso']) ;
        }
        catch(Exception $x){
            return redirect()->route('listaprecios.index')->with(['error'=>'si','mensaje'=>$x->getMessage()]) ;
        }

    }

    public function edit(Listaprecio $listaprecio){
        return view('listaprecios.edit', compact ('listaprecio'));
    }

    public function update (Request $request, Listaprecio $listaprecio){
       
        $request->validate([
            'nombre'=> 'required',
        ]);

        try{
            $listaprecio->nombre = $request->nombre;

            $listaprecio->save();
            return redirect()->route('listaprecios.index')->with(['error'=>'no','mensaje'=>'Modificación Exitosa']);
        }
        catch(Exception $x){
            return redirect()->route('listaprecios.edit', $listaprecio)->with(['error'=>'si','mensaje'=>$x-> getMessage()]);
        }
    }

    public function destroy (Listaprecio $listaprecio){
        try{
            $listaprecio->delete();
            return redirect()->route('listaprecios.index')->with(['error'=>'no','mensaje'=>'Eliminado']);
        }

        catch (Exception $x){
            return redirect()->route('listaprecios.index')->with(['error'=>'si','mensaje'=>$x->getMessage()]) ;
        }
    }
        
}
