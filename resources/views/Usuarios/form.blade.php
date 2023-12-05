<div class="container">

    @if($Modo == 'crear' && session('alert-crear'))
        <div class="alert alert-{{ session('alert-crear.type') }}">
            {{ session('alert-crear.message') }}
        </div>
            @elseif($Modo == 'editar' && session('alert-editar'))
                <div class="alert alert-{{ session('alert-editar.type') }}">
                    {{ session('alert-editar.message') }}
                </div>
            @endif

    <div class="form-group">
        <label for="nombres" class="control-label">{{'Nombres'}}</label>
        <input type="text" class="form-control w-75  {{$errors->has('Nombres')?'is-invalid': '' }}" {{--Ojo--}}
        name="nombres" id="nombres" 
        value="{{ isset($usuario->Nombres)?$usuario->Nombres:old('Nombres') }}">

        {{--Protege el contenido para que el mensaje no envie informacion en formato de script--}}
        {!! $errors->first('Nombres', '<div class="invalid-feedback">Se requiere llenar el campo</div>') !!}
    </div>

    <div class="form-group">
        <label for="apellidos" class="control-label">{{'Apellidos'}}</label>
        <input type="text" class="form-control w-75 {{$errors->has('Apellidos')?'is-invalid': '' }}" 
        name="apellidos" id="apellidos"
        value="{{ isset($usuario->Apellidos) ? $usuario->Apellidos:old('Apellidos') }}">

        {{--Protege el contenido para que el mensaje no envie informacion en formato de script--}}
        {!! $errors->first('Apellidos', '<div class="invalid-feedback">Se requiere llenar el campo</div>') !!}
    </div>

    <div class="form-group">
        <label for="telefono" class="control-label">{{'Telefono'}}</label>
        <input type="text" class="form-control w-75 {{$errors->has('Telefono')?'is-invalid': '' }}" 
        name="telefono" id="telefono"
        value="{{ isset($usuario->Telefono) ? $usuario->Telefono:old('Telefono') }}">

        {{--Protege el contenido para que el mensaje no envie informacion en formato de script--}}
        {!! $errors->first('Telefono', '<div class="invalid-feedback">Se requiere llenar el campo</div>') !!}
    </div>

    <div class="form-group">
        <label for="email" class="control-label">{{'Correo Electronico'}}</label>
        <input type="email" class="form-control w-75" name="email" id="email"
        value="{{ isset($usuario->Email) ? $usuario->Email:' ' }}">
    </div>

    <div class="form-group">
        <label for="edad" class="control-label">{{'Edad'}}</label>
        <input type="number" class="form-control w-75 {{$errors->has('Edad')?'is-invalid': '' }}" 
        name="edad" id="edad" 
        value="{{ isset($usuario->Edad) ? $usuario->Edad:' ' }}">

        {{--Protege el contenido para que el mensaje no envie informacion en formato de script--}}
        {!! $errors->first('Edad', '<div class="invalid-feedback">Se requiere llenar el campo</div>') !!}
    </div>

        <div class="mt-4" style="text-align: center">
            <input type="submit" value="{{$Modo == 'crear' ? 'Agregar': 'Actualizar'}}" 
            class="btn btn-success" style="margin-right:15px;">
            <a href="{{ url('Usuarios')}}" class="btn  btn-primary" style="margin-left:15px">Regresar</a>
        </div>
</div>
