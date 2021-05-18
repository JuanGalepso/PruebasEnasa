@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')



@section('content')

   
      <div class="container">
        <div class="col-md-6">
          <div class="btn-group">
           
           @can('RegistrarUsuario')
            <a href="{{ url('user/create') }}" class="btn blue darken-3 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>  
           @endcan
          </div>
        </div>
      <br>
      
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class=" text-secondary">Listado de usuarios</h3>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                     <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user/create" class="link_ruta">
                        Nuevo
                      </a>
                    </li>
                  </ul><br>
                <table id="example" class="table table-sm table-striped " style="width:100%">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Género</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr class="row{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
               
                      
                       @if ($user->genero == 'F')
                      <td><i class="mdi mdi-human-female fa-3x pink-text"></i></td>
                      @else
                      <td><i class="mdi mdi-human-male fa-3x blue-text "></i></td>
                      @endif


                    <td>{!! $user->hasRole('Administrador') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                    <td>{{ $user->email  }}</td>
                    <td>
                      @if ($user->status == 1)
                        <span class="badge badge-success">Activo</span>
                      @else
                      <span class="badge badge-danger">Bloqueado</span>
                      @endif
                    </td>
                    <td>
                       @can('VerUsuario')
                       <a class="btn btn-round blue darken-4" href="{{route('admin.user.show',$user)}}"><i class="mdi mdi-face text-center" style="color: white;"></i> </a>
                       @endcan
                      @can('EditarUsuario')
                       <a class="btn btn-round blue darken-4" href="{{route('admin.user.edit',$user)}}"><i class="mdi mdi-pencil text-center" style="color: white;"></i> </a>
                     @endcan
                       
                    </td>
                    </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
   



@endsection

