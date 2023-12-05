<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar datos

        //dd('Hola');

        $datos=Usuarios::get(); //Vamos a estar viendo registros de 5 en 5, 'usuarios' es un 
                                                    //indice                  
        return view('Usuarios.index',['usuarios' => $datos]);//Significa que se esta pasando toda la informacion (['usuarios']) 
        //que se ha recuperado  de "Usuarios::" a la vista "index.blade".

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$campos = [
            'Nombres' => 'required | string | max:50',
            'Apellidos' => 'required | string | max:100',
            'Telefono' => 'required | string',
            'Email' => 'email',
            'Edad' => 'required | number'
        ];
        $Mensaje =["required"=>'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);*/

        $datosUsuario=request()->except('_token');//Significa que va a almacenar los datos a excepcion del token,
                                                // ya que los valores deben coincider con los campos la tabla 
                                                //usuarios.

        Usuarios::insert($datosUsuario);//Significa que voy a insertar los datos de usuario en la tabla 
                                        //'Usuarios'

        $request->session()->flash('alert-crear', [
            'type' => 'success',
            'message' => 'Usuario agregado con éxito :)'
        ]);

        return redirect(url('Usuarios/create'));
        //return redirect('Usuarios')->with('Mensaje', 'Ususario agregado con exito :)'); 
        // Significa que al momento de agregar un nuevo usuario nos va a redireccionar a Usuarios (index) y que
        // ademas va a imprimir un mensaje en pantalla

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*Recepcionamos la informacion que se esta trayendo gracias a la URL ('edit($id)') y luego, lo que
        hace es buscar el empelado que tiene ese id*/
        
        $usuario = Usuarios::findOrFail($id);/* ***IMPORTANTE*** "findOrFail($id)", este metodo sirve para 
        traer todo los datos correspondientes al registro segun su id.*/

        return view('Usuarios.edit', compact('usuario'));/* "COMPACT crea un conjunto de informaciones a traves 
        de una variable*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosUsuario=request()->except(['_token', '_method']);
        Usuarios::where('id', '=', $id)->update($datosUsuario);

        //$usuario = Usuarios::findOrFail($id);
        //return view('Usuarios.edit', compact('usuario'));

        $request->session()->flash('alert-editar', [
            'type' => 'success',
            'message' => 'Usuario actualizado con éxito :)'
        ]);
        
        return redirect(url('Usuarios/' . $id . '/edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) /*En lugar de recibir todo el objeto "destroy(Usuarios $usuarios), recibimos 
    solo el id"*/
    {
        //
        Usuarios::destroy($id);/*Con esto eliminamos el registro usuarios pasandole el parametro 'id' definida 
        en el index (<form action="{{ url('/usuarios/'.$usuario->id) }}")*/
        //return redirect('Usuarios');redirecciona a la vista usuarios (index.blade)

        $request->session()->flash('alert-eliminar', [
            'type' => 'success',
            'message' => 'Usuario eliminado con éxito :)'
        ]);
        
        return redirect(url('Usuarios'));
    }
}
