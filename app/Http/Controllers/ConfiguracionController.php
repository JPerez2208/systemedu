<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $configuracion = Configuracion::first();
        return view('admin.configuracion.index',compact('configuracion'));
    }

    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        //BUSCAR si existe la configuracion
        $configuracion = configuracion::first();

        if($configuracion){
            //actualizar
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->web = $request->web;
            $configuracion->correo_electronico = $request->correo_electronico;

            if($request->hasFile('logo')){
                //Eliminar Logo anterior
                if($configuracion->logo){
                    unlink(public_path($configuracion->logo));
                }
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $RutaDestenio = public_path('uploads/logos');
                $logoPath->move($RutaDestenio, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')->with('success', 'Configuración actualizada correctamente');
        } else{
            //crear nueva configuracion
            $configuracion = new Configuracion();
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->web = $request->web;
            $configuracion->correo_electronico = $request->correo_electronico;

            if($request->hasFile('logo')){
                //Guardar nuevo logo
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $RutaDestenio = public_path('uploads/logos');
                $logoPath->move($RutaDestenio, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }

            $configuracion->save();
            return redirect()->route('admin.configuracion.index')->with('success', 'Configuracion creada correctamente');    
        }

    }
}