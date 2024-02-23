<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::where('control', 1)->get();
        return view('area.index')->with(compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        $area = new Area();
        $area->area=$request->Area;
        $area->control='1';
        $area->save();
        return redirect()->route('area.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
             //
             $area=Area::findOrFail($id);

    
             return view('area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $area=Area::findOrFail($id);
        $area->area=$request->Area;
        $area->save();
        return redirect()->route('area.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $areas=Area::findOrFail($id);
        $areas->control='0';
        $areas->save();
        return redirect()->route('area.index')->with('datos','Registro Eliminado...!');
    }
}
