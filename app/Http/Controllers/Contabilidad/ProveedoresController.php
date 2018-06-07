<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proveedor;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::paginate(10);
        return view('admin.proveedores.index',compact('proveedores'));
    }

    public function create()
    {
        return view('admin.proveedores.crear');
    }

    public function store(Request $request)
    {
        //Validar los campos
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required'
        ]);

        //Insertar los datos
        $proveedor = Proveedor::create([
            'nombre'=>$request->nombre,
            'telefono'=>$request->telefono
        ]);

        $mensaje = $proveedor?'Proveedor creado ok':'No se pudo crear el Proveedor';
        return redirect()->route('proveedores.index')->with('mensaje',$mensaje);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('admin.proveedores.editar',compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        //Validar los campos
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required'
        ]);

        //Actualizar el Proveedor
        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();

        $mensaje = $proveedor?'proveedor actualizado ok':'No se pudo actualizar proveedor';
        return redirect()->route('proveedores.index')->with('mensaje',$mensaje);
    }

    public function destroy($id)
    {
        //
    }
}
