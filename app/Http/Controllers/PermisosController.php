<?php

namespace App\Http\Controllers;

use App\Models\PersonalPermiso;
use App\Models\Personal;    

use Illuminate\Http\Request;
use App\Models\Permiso;

class PermisosController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $permisosp = PersonalPermiso::with(['personal', 'permiso'])
        ->join('personal', 'personal_permiso.id_personal', '=', 'personal.id_personal')
        ->join('permiso', 'personal_permiso.id_permiso', '=', 'permiso.id_permiso')
        ->where('personal.control', 1)
        ->where('permiso.control', 1)
        ->where('permiso.estado', 'pendiente')
        ->get();
        $permisosa = PersonalPermiso::with(['personal', 'permiso'])
        ->join('personal', 'personal_permiso.id_personal', '=', 'personal.id_personal')
        ->join('permiso', 'personal_permiso.id_permiso', '=', 'permiso.id_permiso')
        ->where('personal.control', 1)
        ->where('permiso.control', 1)
        ->where('permiso.estado', 'aceptado')
        ->get();
        $permisosr = PersonalPermiso::with(['personal', 'permiso'])
        ->join('personal', 'personal_permiso.id_personal', '=', 'personal.id_personal')
        ->join('permiso', 'personal_permiso.id_permiso', '=', 'permiso.id_permiso')
        ->where('personal.control', 1)
        ->where('permiso.control', 1)
        ->where('permiso.estado', 'rechazado')
        ->get();



    return view('permiso.index', compact('permisosp', 'permisosa','permisosr'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo permiso
        return view('permiso.create');
    }

    public function store(Request $request)
    {
         // Validar los datos ingresados en el formulario de creación
    $request->validate([
        'dni' => 'required|string|max:8',
        'fecha_ini' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_ini',
        'motivo' => 'required',
    ]);

    // Buscar el empleado según el DNI proporcionado
    $personal = Personal::where('dni', $request->dni)->first();

    if (!$personal) {
        // Si no se encontró el empleado con el DNI proporcionado, redireccionar con un mensaje de error.
        return redirect()->route('permiso.create')->with('error', 'Empleado no encontrado con el DNI proporcionado');
    }

    // Crear un nuevo registro en la tabla 'permiso'
    $permiso = new Permiso();
    $permiso->estado = 'pendiente'; // Suponemos que el estado por defecto es 'pendiente'
    $permiso->motivo = $request->motivo;
    $permiso->control = 1; // Suponemos que el valor por defecto es 1 (registrado)
    $permiso->save();

    // Crear un nuevo registro en la tabla 'personal_permiso' (relación muchos a muchos)
    $personalPermiso = new PersonalPermiso();
    $personalPermiso->fecha_ini = $request->fecha_ini;
    $personalPermiso->fecha_fin = $request->fecha_fin;
    $personalPermiso->id_personal = $personal->id_personal;
    $personalPermiso->id_permiso = $permiso->id_permiso;
    $personalPermiso->save();
    
        return redirect()->route('permiso.index')->with('success', 'Permiso creado correctamente');
    }

    public function show($id)
    {
        // Mostrar detalles de un permiso específico
        $permiso = Permiso::findOrFail($id);
        return view('permiso.detalle', compact('permiso'));
    }

    public function edit($id)
    {
        $permiso = PersonalPermiso::where('id_permiso',$id)->first();

    // Obtener los datos del empleado asociado al permiso
    $nombre = $permiso->personal->nombre;
    $apellidos = $permiso->personal->apellidos;
    $dni = $permiso->personal->dni;
    $motivo = $permiso->permiso->motivo;

        return view('permiso.edit', compact('permiso', 'nombre', 'apellidos', 'dni', 'motivo'));
        
    }

    public function update(Request $request, $id)
    {
        // Validar los datos ingresados en el formulario de edición
        $request->validate([
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_ini',
            'motivo' => 'required',
        ]);
        
        // Buscar el permiso a actualizar
        $permiso = PersonalPermiso::where('id_permiso',$id)->first();
    
        // Actualizar los datos del permiso
        $permiso->fecha_ini = $request->fecha_ini;
        $permiso->fecha_fin = $request->fecha_fin;
        $permiso->permiso->motivo = $request->motivo;
        $permiso->save();
        $permiso->permiso->save();
    
    return redirect()->route('permiso.index')->with('success', 'Permiso actualizado correctamente');
    }

    public function destroy($id)
    {
        // Marcar el permiso como eliminado (control = 0)
        $permiso = Permiso::findOrFail($id);
        $permiso->control = 0;
        $permiso->save();

        return redirect()->route('permiso.index')->with('success', 'Permiso eliminado correctamente');
    }
    public function aceptar($id)
{
    $permiso = Permiso::find($id);

    if (!$permiso) {
        // Manejar el caso cuando no se encuentra el permiso con el ID proporcionado
        return redirect()->back()->with('error', 'Permiso no encontrado.');
    }

    // Cambiar el estado a "aceptado"
    $permiso->estado = 'aceptado';
    $permiso->save();

    return redirect()->back()->with('success', 'Permiso aceptado exitosamente.');
}
public function rechazar($id)
{
    $permiso = Permiso::find($id);

    if (!$permiso) {
        // Manejar el caso cuando no se encuentra el permiso con el ID proporcionado
        return redirect()->back()->with('error', 'Permiso no encontrado.');
    }

    // Cambiar el estado a "aceptado"
    $permiso->estado = 'rechazado';
    $permiso->save();

    return redirect()->back()->with('success', 'Permiso rechazado exitosamente.');
}
}