@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
@stop

@section('content')
    <div class="">
        @include('layouts.mensajes')
        <div class="row pt-3">
            <div class="col-sm-10 col-lg-8 col-xl-6 offset-sm-1 offset-lg-2 offset-xl-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h2 class="text-center">
                            <b>Nuevo Cliente</b>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clientes.store') }}" method="post">
                            @method('POST')
                            @csrf

                            <div class="form-group row">
                                <label for="codigo" class="col-md-4 col-form-label text-md-right">Código</label>
                                <div class="col-md-6">
                                    <input placeholder="Ingresa el código" id="codigo" type="text"
                                        class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                                        value="{{ old('codigo') }}">
                                    @error('codigo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input placeholder="Ingresa el nombre" id="nombre" type="text"
                                        class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                <div class="col-md-6">
                                    <input placeholder="Ingresa el Telefono" id="telefono" type="tel"
                                        pattern="[0-9]{10}" class="form-control @error('telefono') is-invalid @enderror"
                                        name="telefono" value="{{ old('telefono') }}">
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>
                                <div class="col-md-6">
                                    <input placeholder="Ingresa la direccion" id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ old('direccion') }}">
                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="listaprecio_id" class="col-md-4 col-form-label text-md-right">Lista de
                                    precios</label>
                                <div class="col-md-6">
                                    <select id="listaprecio_id"
                                        class="form-control @error('listaprecio_id') is-invalid @enderror"
                                        name="listaprecio_id">
                                        <option selected value="0">Selecciona lista de precios</option>
                                        @foreach ($listaprecios as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('listaprecio_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="limitecredito" class="col-md-4 col-form-label text-md-right">Limite de
                                    crédito</label>
                                <div class="col-md-6">
                                    <input placeholder="Ingresa el limite de credito" id="limitecredito" type="number"
                                        min="1" max="999999" maxlength="6" oninput="cheklength(this)"
                                        class="form-control @error('limitecredito') is-invalid @enderror"
                                        name="limitecredito" value="{{ old('limitecredito') }}">
                                    @error('limitecredito')
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




@stop

@section('css')

@stop

@section('js')
    <script>
        function cheklength(object) {
            object.value = (object.value.length > 6) ? object.value.slice(0, 6) : object.value;
            // if (object.value.length > 6) {
            //     object.value = object.value.slice(0, 6);
            // }
        }
    </script>
@stop
