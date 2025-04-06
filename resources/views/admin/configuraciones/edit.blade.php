@extends('adminlte::page')

@section('title', 'Sistema de Ventas')

@section('content_header')
    <h1><b>Configuraciones/Editar</b></h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        {{-- Card Box --}}
        <div class="card card-outline card-success" 
        style="box-shadow: 0 6px 6px hsl(0deg 0% 0% / 0.3);" >

          
            <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                <h3 class="card-title float-none">
                     <b>Datos Registrados</b>
                 </h3>
             </div>
            
            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }} {{ config('adminlte.classes_auth_body', '') }}">
                <form action="{{url('admin/configuracion',$empresa->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf  {{-- <-token de seguridad --}}
                    @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control" id="file" name="logo" class="form-control" accept=".jpg, .jpeg, .png" >
                                @error('nombre_empresa')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <center>
                                    <output id="list">
                                        <img src="{{asset('storage/'.$empresa->logo)}}" width="80%" alt="logo">
                                    </output>
                                </center>
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
                                                <option value="{{ $paise->id }}"{{$empresa->pais == $paise->id ? 'selected':''}} >{{ $paise->name }}</option>
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
                                        <select name="departamento" id="select_departamento_2" class="form-control">

                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}"{{$empresa->departamento == $departamento->id ? 'selected':''}} >{{ $departamento->name }}</option>
                                            @endforeach

                                        </select>
                                        <div id="respuesta_pais">
                                            
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
                                            <select name="ciudad" id="select_ciudad_2" class="form-control" required>

                                                @foreach ($ciudades as $ciudade)
                                                <option value="{{ $ciudade->id }}"{{$empresa->ciudad == $ciudade->id ? 'selected':''}} >{{ $ciudade->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('ciudad')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre_empresa">Nombre de la Empresa</label>
                                        <input type="text" class="form-control" value="{{$empresa->nombre_empresa}}" name="nombre_empresa" required>
                                        @error('nombre_empresa')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tipo_empresa">Tipo de la Empresa</label>
                                        <input type="text" class="form-control" name="tipo_empresa" value="{{$empresa->tipo_empresa}}" required>
                                        @error('tipo_empresa')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nit">NIT</label>
                                        <input type="text" class="form-control" name="nit" value="{{$empresa->nit}}" required>
                                        @error('nit')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="moneda">Moneda</label>
                                        <select name="moneda" class="form-control" required>
                                            @foreach ($monedas as $moneda)
                                                <option value="{{ $moneda->code }}" {{$empresa->moneda == $moneda->id ? 'selected':''}} >{{ $moneda->code }}</option>
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
                                        <input type="text" class="form-control" name="nombre_impuesto" value="{{$empresa->nombre_impuesto}}" required>
                                        @error('nombre_impuesto')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cantidad_impuesto">Cantidad %</label>
                                        <input type="number" class="form-control" name="cantidad_impuesto" value="{{$empresa->cantidad_impuesto}}" required>
                                        @error('cantidad_impuesto')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="correo">Correo de la Empresa</label>
                                        <input type="email" class="form-control" name="correo" value="{{$empresa->correo}}" required>
                                        @error('correo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" value="{{$empresa->telefono}}" required>
                                        @error('telefono')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input id="pac-input" class="form-control" name="direccion" value="{{$empresa->direccion}}" type="text" placeholder="Buscar dirección" required>
                                        @error('direccion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                      
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo_postal">Código Postal</label>
                                        <input type="text" class="form-control" value="{{$empresa->codigo_postal}}" name="codigo_postal" required>
                                        @error('codigo_postal')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                
                             
                            </div>

                            <hr>
                            <div class="row">
                                <div col-md-4>
                                    <button type="submit" class="btn btn-success btn-block">Actualizar Empresa</button>
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
@stop

@section('css')
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>


    <script>
        $('#select_pais').on('change', function () {
            var id_pais = $('#select_pais').val();
            //alert(pais);
            if(id_pais){
                $.ajax({
                    url:"{{url('/admin/configuracion/pais')}}"+'/'+id_pais,
                    type:"GET",
                    success: function (data) {
                        $('#select_departamento_2').css('display','none');
                        
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
                    url:"{{ url('/admin/configuracion/estado') }}/" + id_estado,
                    type:"GET",
                    success: function (data) {
                        $('#select_ciudad_2').css('display','none');
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