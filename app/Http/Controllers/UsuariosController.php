<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

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

        $datos=Usuarios::paginate(5); //Vamos a estar viendo registros de 5 en 5, 'usuarios' es un 
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
        //Para obtener la informacion de request hacemos lo siguiente
        //$datosUsuario=$request->all();/*Estamos diciendo que todo lo de store se almacene en "datosUsuario"*/

        $datosUsuario=request()->except('_token');//Significa que va a almacenar los datos a excepcion del token,
                                                // ya que los valores deben coincider con los campos la tabla 
                                                //usuarios.

        Usuarios::insert($datosUsuario);//Significa que voy a insertar los datos de usuario en la tabla 
                                        //'Usuarios'
        
        return response()->json($datosUsuario); //En lugar de retornar una vista, se retorna una respuesta
                                                //
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

        $usuario = Usuarios::findOrFail($id);
        return view('Usuarios.edit', compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) /*En lugar de recibir todo el objeto "destroy(Usuarios $usuarios), recibimos 
    solo el id"*/
    {
        //
        Usuarios::destroy($id);/*Con esto eliminamos el registro usuarios pasandole el parametro 'id' definida 
        en el index (<form action="{{ url('/usuarios/'.$usuario->id) }}")*/
        return redirect('Usuarios');//redirecciona a la vista usuarios
    }
}
