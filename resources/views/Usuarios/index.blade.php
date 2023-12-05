
@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('alert-eliminar'))
            <div class="alert alert-{{ session('alert-eliminar.type') }}">
                {{ session('alert-eliminar.message') }}
            </div>
        @endif

        {{--Si existe mensaje, entonces, mandar a imprimir el mensaje--}}
        @if(Session::has('Mensaje')) {{             
            Session::get('Mensaje')
        }}
        @endif

        <a href="{{ url('Usuarios/create')}}" class="btn btn-success">Agregar nuevo usuario</a>
        <a href="{{ route('usuarios.generar-pdf') }}" class="btn btn-primary">Generar reporte</a>

        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th></th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($usuarios as $usuario){{--'usuarios' es la variable que se declaro en el archivo 
                'UsuariosController', especificamente dentro de los corchetes (['usuarios' => $datos])--}}
                        <tr>
                            <td>{{$usuario->id}}</td> {{--Sirve para mostrar el numero de registros--}}
                            <td>{{ $usuario->Nombres}}</td>/
                            <td>{{ $usuario->Apellidos}}</td>
                            <td>{{ $usuario->Telefono}}</td>
                            <td>{{ $usuario->Email}}</td>
                            <td>{{ $usuario->Edad}}</td>
                            <td>
                                {{--En esta parte escribimos la ruta, luego el valor del id y se concatena con el
                                    archivo "edit.blade.php" --}}
                                <a href="{{ url('/Usuarios/'.$usuario->id.'/edit') }}" class="btn btn-warning"
                                    >Editar</a>
                                
                                <form action="{{ url('/Usuarios/'.$usuario->id) }}" method="POST"
                                    style="display:inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Quieres Borrar?')" 
                                    class="btn btn-danger">Borrar</button>
                                </form>
                            
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection