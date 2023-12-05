<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->Nombres }}</td>
                    <td>{{ $usuario->Apellidos }}</td>
                    <td>{{ $usuario->Telefono }}</td>
                    <td>{{ $usuario->Email }}</td>
                    <td>{{ $usuario->Edad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
