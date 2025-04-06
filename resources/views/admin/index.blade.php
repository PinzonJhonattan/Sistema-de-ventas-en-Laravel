@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1><b>Bienvenido a {{$empresa->nombre_empresa}}</b></h1>
    <hr>
@stop

@section('content')
@stop

@section('css')
@stop

@section('js')
    @if ( ($titulo = Session::get('titulo')) && ($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')) )
        <script> 
            Swal.fire({
            title: "{{$titulo}}",
            text: "{{$mensaje}}",
            icon: "{{$icono}}"
            });
        </script>
    @endif



@stop

 