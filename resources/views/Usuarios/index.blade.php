
{{--Si existe mensaje, entonces, mandar a imprimir el mensaje--}}
@if(Session::has('Mensaje')) {{             
    Session::get('Mensaje')
}}
@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>
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
                    <td>{{$loop->iteration}}</td> {{--Sirve para mostrar el numero de registros--}}
                    <td>{{ $usuario->Nombres}}</td>/
                    <td>{{ $usuario->Apellidos}}</td>
                    <td>{{ $usuario->Telefono}}</td>
                    <td>{{ $usuario->Email}}</td>
                    <td>{{ $usuario->Edad}}</td>
                    <td>
                        {{--En esta parte escribimos la ruta, luego el valor del id y se concatena con el
                            archivo "edit.blade.php" --}}
                        <a href="{{ url('/Usuarios/'.$usuario->id.'/edit') }}">Editar</a>

                        <form action="{{ url('/Usuarios/'.$usuario->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Quieres Borrar?')">Borrar</button>
                        </form>

                    </td>
                </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('Usuarios/create')}}">Agregar nuevo usuario</a>