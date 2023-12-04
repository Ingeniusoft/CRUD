<form action="{{ url('/Usuarios/' . $usuario->id) }}" method="post"> {{--Signica que mediante este URL vamos
    enviar un metodo 'PATCH', esto automaticamente me dirige al metodo 'update' del archivo
    UsuariosController--}}

    {{ csrf_field() }}
    {{ method_field('PATCH') }} {{--Enviamos la informacion como cuando eliminamos, solo que en este caso usamos
                                 el metodo 'PATCH' para aceder a la funcion UPDATE--}}

    @include ('Usuarios.form',['Modo'=>'editar'])

</form>


 