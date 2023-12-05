<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

@extends('layouts.app')

@section('content')

    <div class="container">
        
        <form action="{{ url('/Usuarios')}}" class="form-horizontal"
        method="POST">{{--En esta parte "{{url('/Usuarios')}}" significa que 
                                                            estamos enviando toda la informacion del formulario a
                                                            "/Usuarios" utilizando el metodo POST.--}}

            {{ csrf_field() }} {{--Imprime una llave de acceso para que cuando se haga el envio a store nos deje
            entrar gracias a esto.--}}

            @include ('Usuarios.form',['Modo'=>'crear']) {{--Sirve para extraer contenido de otros archivos, lo que esta adentro de
                los corchetes sirve para distinguir que formulario se esta utilizando--}}
        </form>
    </div>

@endsection