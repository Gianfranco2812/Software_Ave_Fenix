<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{

  /*   function __construct() 
    {
        
        $this->middleware('permission:user.create', ['only'=>['create','store']]);
        $this->middleware('permission:user.edit', ['only'=>['edit','update']]);
        $this->middleware('permission:user.destroy', ['only'=>['destroy']]);
    
        $this->middleware('permission:role.create', ['only'=>['create','store']]); 
        $this->middleware('permission:role.edit', ['only'=>['edit','update']]);
        $this->middleware('permission:role.destroy', ['only'=>['destroy']]);
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     const PAGINATION=6;
   /*   public function index(Request $request)
     {
         $buscarpor=trim($request->get('buscarpor'));
         $cliente=Cliente::where('nombre','LIKE','%'.$buscarpor.'%')
         ->paginate($this::PAGINATION);;
         //return $cliente;
         return view('clientes.index', compact('cliente'));
     } */

     public function index(Request $request)
    {
        //
        $buscarpor=trim($request->get('buscarpor'));
        $roles=Role::where('name','LIKE','%'.$buscarpor.'%')
        ->paginate($this::PAGINATION);
        //return $cliente;
        return view('roles.index', compact('roles'));
    }

   /*  public function index()
    {
        //
        $roles = Role::paginate(5);
        return view('roles.index',compact('roles'));
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission = Permission::get();
        return view('roles.crear',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role=Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //usamos metodo pluck que recupera todos los valores de un id determinado
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
           ->pluck('role_has_permissions.permission_id')
           ->all();
           return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role=Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
