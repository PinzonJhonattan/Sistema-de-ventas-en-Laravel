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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop