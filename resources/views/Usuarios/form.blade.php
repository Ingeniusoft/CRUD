
<br>
    <label for="nombres">{{'Nombres'}}</label>
    <input type="text" name="nombres" id="nombres" 
    {{--En esta parte lo que le estoy dicendo es que si "isset($usuario->Nombres)" no esta vacio entonces "?"
    imprime "$usuario->Nombres" en caso de que no-->":" imprima vacio (' ')--}}
    value="{{ isset($usuario->Nombres) ? $usuario->Nombres:' ' }}">

    <br>
    <label for="apellidos">{{'Apellidos'}}</label>
    <input type="text" name="apellidos" id="apellidos"
    value="{{ isset($usuario->Apellidos) ? $usuario->Apellidos:' ' }}">

    <br>
    <label for="telefono">{{'Telefono'}}</label>
    <input type="text" name="telefono" id="telefono"
    value="{{ isset($usuario->Telefono) ? $usuario->Telefono:' ' }}">

    <br>
    <label for="email">{{'Correo Electronico'}}</label>
    <input type="email" name="email" id="email"
    value="{{ isset($usuario->Email) ? $usuario->Email:' ' }}">

    <br>
    <label for="edad">{{'Edad'}}</label>
    <input type="number" name="edad" id="edad" 
    value="{{ isset($usuario->Edad) ? $usuario->Edad:' ' }}">

    <br>
    <input type="submit" value="{{$Modo == 'crear' ? 'Agregar': 'Actualizar'}}">

    <a href="{{ url('Usuarios')}}">Regresar</a>