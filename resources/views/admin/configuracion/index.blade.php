@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos del sistema</h1>
    <hr>
    
@stop

@section('content')
    
    <div class="row">
    <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <p>Bienvenido ala seccion de configuracion del sistema</p></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form action="{{ url('/admin/configuracion/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="row">
                             <div class="col-md-4">
                              <div class="form-group">
                                 <label for="">Logo de la Institucion</label>
                                   <div class="input-group mb-3>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        <input type="File" class="form-control" value="{{ old('logo', $configuracion->logo ?? '') }}" 
                                        name="logo" placeholder="Escribe aqui..." onchange="mostrarImagen(event)" accept="image/*">
                                        <br>
                                        <center>
                                        <img id="preview" src="{{ url($configuracion->logo) }}" style="max-width: 200px; margin-top: 10px;">
                                        </center>
                                      
                                        @error('logo')
                                        <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                                   </div>
                               </div>
                    <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4>
                       <div class="from-group">
                       <label for="">Nombre</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}" 
                            name="nombre" placeholder="Escriba aqui..." required>
                            @error('nombre')
                              <small style="color: red;">{{ $message }}</small>
                            @enderror
                          </div>
                       </div>
                        <div class="colm-md-12">
                           <div class="from-group">
                           <label for="">Descripcion</label><b> (*)</b>
                              <div class="input-group mb-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                </div>
                                <input type="text" class="from-control" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" name="descripcion" placeholder="Escribe aqui..." required>
                                </div>
                                @error('descripcion')
                                <small style="color: red;">{{ $message }}</small>
                                @enderror
                              </div>
                                </div>
                              </div>
                           
                           <div class="row">
                            <div class="col-md-6">
                             <div class="from-group">
                               <label for="">Direccion</label><b> (*)</b>
                                 <div class="input-group mb-3">
                                   <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                   </div>
                                   <input class="form-control" value="{{ old('direccion', $configuracion->dirreccion ?? '') }}" name="direccion" placeholder="Escribe aqui..." required>
                                   @error('direccion')
                                   <small style="color: red;">{{ $message }}</small>
                                   @enderror
                                 </div>
                             </div>
                                </div>

                             <div class="row">
                             <div class="col-md-12">
                             <div class="from-group">
                             <label for="">Telefono</label><b> (*)</b>
                                <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                 </div>
                                 <input type="text" class="form-control" value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono" placeholder="Escribe aqui..." required>
                                 @error('telefono')
                                 <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                 </div>
                                </div>
                             </div>
                             </div>
                            </div>

                            <div class="row">
                            <div class="col-md-4"
                            <div class="from-group">
                            <label for="">Correo Electronico</label><b> (*)</b>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="correo_electronico" class="form control" value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}" name="correo_electronico" placeholder="Escribe aqui..." required>
                                  @error('correo_electronico')
                                  <small style="color: red;">{{ $message }}</small>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                 <label for="">Sitio Web</label><b> (*)</b>
                                   <div class="input-group mb-3>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                          
                                        <input type="text" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" name="web" placeholder="Escribe aqui...">
                                        @error('web')
                                        <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                      </div>
                                   </div>
                                      </div>
                                   </div>
                              </div>
                            </div>
                           
                           <hr>
                            <div class="row">
                            <div class="col-md-12">
                            <a href="{{ url('/admin') }}" class="btn btn-default"><i
                                class="fas fa-arrow-left"></i>Cancelar</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                            Guardar</button>
                            </div>
                            </div>
                            </div>
                            </div>
                           </div>
                           </div>
                        </div>
               </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop