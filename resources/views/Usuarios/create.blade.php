Seccion para crear empleados

<form action="{{ url('/Usuarios')}}" method="POST">{{--En esta parte "{{url('/Usuarios')}}" significa que 
                                                    estamos enviando toda la informacion del formulario a
                                                    "/Usuarios" utilizando el metodo POST.--}}

    {{ csrf_field() }} {{--Imprime una llave de acceso para que cuando se haga el envio a store nos deje
    entrar gracias a esto.--}}
    <br>
    <label for="nombres">{{'Nombres'}}</label>
    <input type="text" name="nombres" id="nombres">
    <br>
    <label for="apellidos">{{'Apellidos'}}</label>
    <input type="text" name="apellidos" id="apellidos">
    <br>
    <label for="telefono">{{'Telefono'}}</label>
    <input type="text" name="telefono" id="telefono">
    <br>
    <label for="email">{{'Correo Electronico'}}</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="edad">{{'Edad'}}</label>
    <input type="number" name="edad" id="edad">    
    <br>
    <input type="submit" value="Agregar">

</form>