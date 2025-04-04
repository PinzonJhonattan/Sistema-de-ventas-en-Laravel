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
                        <form action="{{url('crear-empresa/create')}}" method="post" enctype="multipart/form-data" >
                            @csrf  {{-- <-token de seguridad --}}
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" id="file" name="logo" class="form-control" accept=".jpg, .jpeg, .png" required>
                                        @error('nombre_empresa')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                        <br>
                                        <center><output id="list"></output></center>
                                        <script src="{{ asset('js/preview-logo.js') }}"></script>

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pais">País</label>
                                                <select name="pais" id="select_pais" class="form-control" value="{{old('pais')}}" required>
                                                    @foreach ($paises as $paise)
                                                        <option value="{{ $paise->id }}">{{ $paise->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pais')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="estado">Departamento</label>
                                                <div id="respuesta_pais">
                                                    <select name="estado" id="select_estado" class="form-control" value="{{old('estado')}}" required></select>
                                                </div>
                                                @error('estado')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ciudad">Ciudad</label>
                                                <div id="respuesta_estado">
                                                    <select name="ciudad" value="{{old('ciudad')}}" id="select_ciudad" class="form-control" required></select>
                                                </div>
                                                @error('ciudad')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre_empresa">Nombre de la Empresa</label>
                                                <input type="text" class="form-control" value="{{old('nombre_empresa')}}" name="nombre_empresa" required>
                                                @error('nombre_empresa')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tipo_empresa">Tipo de la Empresa</label>
                                                <input type="text" class="form-control" name="tipo_empresa" value="{{old('tipo_empresa')}}" required>
                                                @error('tipo_empresa')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nit">NIT</label>
                                                <input type="text" class="form-control" name="nit" value="{{old('nit')}}" required>
                                                @error('nit')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="moneda">Moneda</label>
                                                <select name="moneda" class="form-control" value="{{old('moneda')}}" required>
                                                    @foreach ($monedas as $moneda)
                                                        <option value="{{ $moneda->code }}">{{ $moneda->code }}</option>
                                                    @endforeach
                                                </select>
                                                @error('moneda')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombre_impuesto">Nombre del Impuesto</label>
                                                <input type="text" class="form-control" name="nombre_impuesto" value="{{old('nombre_impuesto')}}" required>
                                                @error('nombre_impuesto')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="cantidad_impuesto">Cantidad %</label>
                                                <input type="number" class="form-control" name="cantidad_impuesto" value="{{old('cantidad_impuesto')}}" required>
                                                @error('cantidad_impuesto')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="correo">Correo de la Empresa</label>
                                                <input type="email" class="form-control" name="correo" value="{{old('correo')}}" required>
                                                @error('correo')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="telefono">Teléfono</label>
                                                <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}" required>
                                                @error('telefono')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <input id="pac-input" class="form-control" name="direccion" value="{{old('direccion')}}" type="text" placeholder="Buscar dirección" required>
                                                @error('direccion')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                                <br>
                                                <div id="map" style="width: 100%; height: 400px;"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="codigo_postal">Código Postal</label>
                                                <input type="text" class="form-control" value="{{old('codigo_postal')}}" name="codigo_postal" required>
                                                @error('codigo_postal')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        
                                        
                                     
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div col-md-4>
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">Crear Empresa</button>
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
    <script src="{{ asset('js/mapa-direccion.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&libraries=places&callback=initAutocomplete"></script>
    
    <script>
        $('#select_pais').on('change', function () {
            var id_pais = $('#select_pais').val();
            //alert(pais);
            if(id_pais){
                $.ajax({
                    url:"{{url('/crear-empresa/pais')}}"+'/'+id_pais,
                    type:"GET",
                    success: function (data) {
                        console.log(data);
                        $('#respuesta_pais').html(data);
                    }
                })
            }else{
                alert('Debe seleccionar un pais')
            }
        })
    </script>
    
    <script>
        $(document).on('change', '#select_estado', function () {
            var id_estado = $(this).val();
            //alert(id_estado); 
    
            if(id_estado){
                $.ajax({
                    url:"{{ url('/crear-empresa/estado') }}/" + id_estado,
                    type:"GET",
                    success: function (data) {
                        console.log(data); // Aquí debería llegar el HTML del select con ciudades
                        $('#respuesta_estado').html(data);
                    },
                    error: function(xhr) {
                        console.error('Error al obtener ciudades:', xhr.responseText);
                    }
                });
            } else {
                alert('Debe seleccionar un estado');
            }
        });
    </script>
    
@stop
