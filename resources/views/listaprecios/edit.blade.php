@extends('adminlte::page')

@section('title', 'Lista de precios')

@section('content_header')

@stop

@section('content')

<div class="">
    <div class="row pt-3">
        <div class="col-sm-10 col-lg-8 col-xl-6 offset-sm-1 offset-lg-2 offset-xl-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-center">
                        <b>Modificar Lista de Precios</b>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{route('listaprecios.update', $listaprecio)}}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Lista de Precios</label>
                            <div class="col-md-6">
                                <input placeholder="Ingresa el nombre" id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $listaprecio->nombre) }}">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-sm-6 col-lg-9">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Guardar</button>
                            </div>                           
                        </div>                        
                    </form>
                </div>
            </div>
        </div>   
    </div>
</div>








{{-- <div class="form-group">
    <form action="{{route('productos.update', $producto)}}" method="post">
        @method('PUT')
        @csrf
        <label for="">Código</label>
        <input type="text" name="codigo" id="codigo" value="{{$producto->codigo}}">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
        <label for="">Costo</label>
        <input type="text" name="costo" id="costo" value="{{$producto->costo}}">
        <label for="">Afecta Exisencias</label>
        <input type="checkbox" name="afectaexistencias" id="afectaexistencias" @if ($producto->afectaexistencias)
            checked
        @endif>
        <button type="submit">Guardar</button>
    </form>
</div> --}}

@stop

@section('css')
@stop

@section('js')

@stop