<?php

namespace App\Http\Controllers;
use App\Models\Personal;
use App\Models\Vacaciones;
use App\Models\PersonalVacaciones;

use Illuminate\Http\Request;

class VacacionesController extends Controller
{
    public function index()
    {
        $vacaciones = PersonalVacaciones::with(['personal', 'vacaciones'])
        ->join('personal', 'personal_vacaciones.id_personal', '=', 'personal.id_personal')
        ->join('vacaciones', 'personal_vacaciones.id_vacaciones', '=', 'vacaciones.id_vacaciones')
        ->where('personal.control', 1)
        ->where('vacaciones.control', 1)
        ->get();
        return view('vacaciones.index', compact('vacaciones'));
    }

    public function create()
    {
        $personal = Personal::all();
        $vacaciones = Vacaciones::all();
        return view('Vacaciones.create', compact('personal', 'vacaciones'));
    }

    public function store(Request $request)
    {
        $personal = Personal::where('dni', $request->dni)->first();
        if (!$personal) {
            // Si no se encontró el empleado con el DNI proporcionado, redireccionar con un mensaje de error.
            return redirect()->route('vacaciones.create')->with('error', 'Empleado no encontrado con el DNI proporcionado');
        }
        // Valida los datos aquí según tus necesidades.
        $vacaciones = new Vacaciones();
        $vacaciones->fecha_ini = $request->fecha_ini;
        $vacaciones->fecha_fin = $request->fecha_fin;
        $vacaciones->tipo_vac = $request->tipo_vac;
        $vacaciones->control = 1; // Suponemos que el valor por defecto es 1 (registrado)
        $vacaciones->save();


        $personal_vacaciones = new PersonalVacaciones;
        $personal_vacaciones->id_personal = $personal->id_personal;
        $personal_vacaciones->id_vacaciones =$vacaciones->id_vacaciones;
        $personal_vacaciones->save();


        return redirect()->route('vacaciones.index')->with('success', 'Vacaciones registradas exitosamente.');
    }

    public function edit($id)
    {
        $vacaciones = Vacaciones::where('id_vacaciones',$id)->first();
        $det = PersonalVacaciones::where('id_vacaciones',$id)->first();
        $per = Personal::where('id_personal',$det->id_personal)->first();

        $nombre = $per->nombre;
        $apellidos = $per->apellidos;
        $dni = $per->dni;
        $fecha_ini=$vacaciones->fecha_ini;
        $fecha_fin=$vacaciones->fecha_fin;
        $tipo_vac = $vacaciones->tipo_vac;

        return view('vacaciones.edit', compact('vacaciones', 'nombre', 'apellidos', 'dni', 'tipo_vac','fecha_ini','fecha_fin'));
    }

    public function update(Request $request, $id)
    {
        // Valida los datos aquí según tus necesidades.
        $vacaciones = Vacaciones::findOrFail($id);
   

        $vacaciones->fecha_ini = $request->fecha_ini;
        $vacaciones->fecha_fin = $request->fecha_ini;
        $vacaciones->tipo_vac = $request->tipo_vac;
        $vacaciones->save();

        return redirect()->route('vacaciones.index')->with('success', 'Vacaciones actualizadas exitosamente.');
    }

    public function destroy($id)
    {
        $vacaciones = Vacaciones::findOrFail($id);
        $vacaciones->control = 0;
        $vacaciones->save();

        return redirect()->route('vacaciones.index')->with('success', 'Vacaciones eliminadas correctamente');
    }

}
