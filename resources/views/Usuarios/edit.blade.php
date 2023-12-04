<form action="{{ url('/Usuarios/' . $usuario->id) }}" method="post"> {{--Signica que mediante este URL vamos
    enviar un metodo 'PATCH', esto automaticamente me dirige al metodo 'update' del archivo
    UsuariosController--}}

    {{ csrf_field() }}
    {{ method_field('PATCH') }} {{--Enviamos la informacion como cuando eliminamos, solo que en este caso usamos
                                 el metodo 'PATCH' para aceder a la funcion UPDATE--}}

    <label for="nombres">{{'Nombres'}}</label>
    <input type="text" name="Nombres" id="Nombres" value="{{ $usuario->Nombres}}">
    {{--|||||||||||||||||||||||||||||||||||||||||| Esta parte sirve para traer el dato que corresponde a ese 
        usuario, osea lo imprime en el espacio del input--}}
    <br>
    <label for="Apellidos">{{'Apellidos'}}</label>
    <input type="text" name="Apellidos" id="Apellidos" value="{{ $usuario->Apellidos}}">
    <br>
    <label for="Telefono">{{'Telefono'}}</label>
    <input type="text" name="Telefono" id="Telefono" value="{{ $usuario->Telefono}}">
    <br>
    <label for="Email">{{'Correo Electronico'}}</label>
    <input type="email" name="Email" id="Email" value="{{ $usuario->Email}}">
    <br>
    <label for="Edad">{{'Edad'}}</label>
    <input type="number" name="Edad" id="Edad" value="{{ $usuario->Edad}}"> 

    <input type="submit" value="Actualizar">

</form>


 