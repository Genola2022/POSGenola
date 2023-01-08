@extends('adminlte::page')

@section('title', 'Lista de Precios')

@section('content_header')
    <h1>Lista de precios</h1>
@stop

@section('content')
@include('layouts.mensajes')
<div class="card-body">
    <a href="{{route('listaprecios.create')}}" class="btn btn-success">Nuevo</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($precios as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>
                        <a href="{{route('listaprecios.edit', $item)}}">Editar</a>
                        <form action="{{route('listaprecios.destroy', $item)}}" method="POST">    
                            @csrf
                            @method('delete')                                   
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>                                                             
                        </form>
                    </td>
                </tr>
                
            @endforeach

        </tbody>
    </table>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../../../vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css?v=3.2.0">
@stop

@section('js')
<script src="../../../vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

<script src="../../../vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../../vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@stop