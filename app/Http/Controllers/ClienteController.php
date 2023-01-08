<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Listaprecio;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ClienteController extends Controller
{
    //
    public function index(){
        $clientes=Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create(){
        $listaprecios=Listaprecio::all();
        return view('clientes.create', compact('listaprecios'));
    }

    public function store(Request $request){
        //Producto::create($request->all());
        $request->validate([
            'codigo' => 'required',
            'nombre'=> 'required',
            'telefono' => 'required | numeric',
            'direccion' => 'required',
            'limitecredito'=> 'required | numeric',
        ]);
        
        try{
            $cliente= new Cliente();
            $cliente->codigo = $request->codigo;
            $cliente->nombre = $request->nombre;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->listaprecio_id = $request->listaprecio_id;
            $cliente->limitecredito = $request->limitecredito;
            
            $cliente->save();
            return redirect()->route('clientes.index')->with(['error'=>'no','mensaje'=>'Registro Exitoso']) ;
        }
        catch(Exception $x){
            return redirect()->route('clientes.index')->with(['error'=>'si','mensaje'=>$x->getMessage()]) ;
        }

       
    }

    public function destroy(Cliente $cliente){
        try{
            $cliente->delete();
            return redirect()->route('clientes.index')->with(['error'=>'no','mensaje'=>'Eliminado']);
        }
        catch(Exception $x){
            return redirect()->route('clientes.index')->with(['error'=>'si','mensaje'=>$x->getMessage()]) ;
        }

    }

    public function edit(Cliente $cliente){
        $listaprecios=Listaprecio::all();
        return view('clientes.edit', compact('cliente', 'listaprecios'));
    }

    public function update(Request $request, Cliente $cliente){

        $request->validate([
            'codigo' => 'required',
            'nombre'=> 'required',
            'telefono' => 'required | numeric',
            'direccion'=> 'required',
            'listaprecio_id'=>'required',
            'limitecredito'=>'required | numeric'
        ]);

        try{
            $cliente->codigo = $request->codigo;
            $cliente->nombre = $request->nombre;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->listaprecio_id = $request->listaprecio_id;
            $cliente->limitecredito = $request->limitecredito;
            $cliente->save();
            return redirect()->route('clientes.index')->with(['error'=>'no','mensaje'=>'Modificación Exitosa']);
        }
        catch(Exception $x){
            return redirect()->route('clientes.edit', $cliente)->with(['error'=>'si','mensaje'=>$x-> getMessage()]);
        }

    }

    public function show(Cliente $cliente){

    }
    

}
