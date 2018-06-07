<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Proveedor;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('admin.productos.index',compact('productos'));
    
    }

    public function create()
    {
        $proveedores = Proveedor::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.productos.crear',compact('proveedores'));
    }

    public function store(Request $request)
    {
        //Validar los campos
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'proveedor_id' => 'required'
        ]);

        //Insertar los datos
        $producto = Producto::create([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'proveedor_id'=>$request->proveedor_id
        ]);

        $mensaje = $producto?'Producto creado ok':'No se pudo crear el Producto';
        return redirect()->route('productos.index')->with('mensaje',$mensaje);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $proveedores = Proveedor::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.productos.editar',compact('producto','proveedores'));
    }

    public function update(Request $request, $id)
    {
        //Validar los campos
        $request->validate([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'proveedor_id'=>$request->proveedor_id
        ]);

        //Actualizar el Producto
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->save();

        $mensaje = $producto?'Producto actualizado ok':'No se pudo actualizar Producto';
        return redirect()->route('productos.index')->with('mensaje',$mensaje);
    }

    public function destroy($id)
    {
        //
    }
}
