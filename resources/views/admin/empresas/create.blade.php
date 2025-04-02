@extends('adminlte::master')

@php
    $authType = $authType ?? 'login';
    $dashboardUrl = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home');

    if (config('adminlte.use_route_url', false)) {
        $dashboardUrl = $dashboardUrl ? route($dashboardUrl) : '';
    } else {
        $dashboardUrl = $dashboardUrl ? url($dashboardUrl) : '';
    }

    $bodyClasses = "{$authType}-page";

    if (! empty(config('adminlte.layout_dark_mode', null))) {
        $bodyClasses .= ' dark-mode';
    }
@endphp

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ $bodyClasses }}@stop

@section('body')
    <div class="container">

        {{-- Logo --}}
        <center>
            <img src="{{ asset('/images/logo.png') }}" width="300px"  alt="">
        </center>

        <div class="row">
            <div class="col-md-12">
       
                {{-- Card Box --}}
                <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}"
                style="box-shadow: 0 6px 6px hsl(0deg 0% 0% / 0.3);">
        
                  
                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                        <h3 class="card-title float-none text-center">
                             <b>Registro de nueva empresa</b>
                         </h3>
                     </div>
                    
                    {{-- Card Body --}}
                    <div class="card-body {{ $authType }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                        <form action="">
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pais">País</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Argentina">Argentina</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre_empresa">Nombre de la Empresa</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipo_empresa">Tipo de la Empresa</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nit">NIT</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="telefono">Telefono</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="correo">Correo de la Empresa</label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cantidad_impuesto">Cantidad de Impuesto</label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre_impuesto">Nombre del Impuesto</label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="moneda">Moneda</label>
                                            <select name="" id="" class="form-control">
                                                <option value="cos">Cos</option>
                                                <option value="$">$</option>
                                                <option value="dolar">Dollar</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <input type="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="departamento">Departamento</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ciudad">Ciudad</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="codigo_postal">Codigo Postal</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
        
                    {{-- Card Footer --}}
                    @hasSection('auth_footer')
                        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                            @yield('auth_footer')
                        </div>
                    @endif
        
                </div>

            </div>
        </div>
        

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
