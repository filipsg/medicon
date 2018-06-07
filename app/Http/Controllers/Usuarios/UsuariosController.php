<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; //para PDF
use Maatwebsite\Excel\Facades\Excel; //para Excel
use App\User;
use App\Perfil;
use App\Estado;
use App\Mail\UsuarioCreado;

class UsuariosController extends Controller
{
    
    // 2018-05-07 (parte 2)
    // Funcion de Contructor para validar usaurios
/*
    public function __construct(){
        // Validamos que este autenticado
        // con este comando le damos la indicacion de excepcion de una vista.
        //$this->middleware('auth',['except'=>'index']);
        $this->middleware('auth');

        // 2018-05-09 - Validamos que sea Admin
        $this->middleware('admin');

        // 2018-05-09 - Validamos que sea Admin, y para todos les deja ver solo index
        $this->middleware('admin',['except'=>'index']);
    }
*/

    // 2018-05-07 se le adiciona a la entrada el request para el scope
    public function index(Request $request)
    {
        //$usuarios = User::paginate(10);
        // 2018-05-07: sin scope seria como sigue
        //$usuarios = User::where('name','LIKE','%'.$request->name.'%')->paginate(10);
        // 2018-05-07 finalmente quedara como sigue - con una funcion:
        $usuarios = User::nombres($request->name)->email($request->email)->perfil($request->perfil_id)->estado($request->estado_id)->paginate(10);
        $perfiles = Perfil::orderBy('nombre','asc')->pluck('nombre','id');
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.usuarios.index',compact('usuarios','perfiles','estados'));
    }

   
    public function create()
    {
        $perfiles = Perfil::orderBy('nombre','asc')->pluck('nombre','id');
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.usuarios.crear',compact('perfiles','estados'));
    }

   
    public function store(Request $request)
    {
        //Validar los campos
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'perfil_id' => 'required',
            'estado_id' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,bmp,png | max:3000' // 2018-05-17 - carga de archivos
        ]);

        // 2018-05-17: SUBIR ARCHIVO FOTO
        $foto = $request->file('foto');
        $ruta = public_path().'/fotos';
        $nombrefoto = uniqid()."-".$foto->getClientOriginalName();
        $foto->move($ruta,$nombrefoto);



        //Insertar los datos
        $usuario = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'perfil_id'=>$request->perfil_id,
            'estado_id'=>$request->estado_id,
            'foto'=>$nombrefoto
        ]);

/* 
//comentareado 2018-05-17 carga de archivos - foto
        // 2018-05-09: Envio de Mail a quien se registro
        //Mail::to($request->email)->send(new UsuarioCreado());
        // 2018-05-09 parte2: adicionamos los siguientes campos adicionales, para que sean enviados por el mail
        $email = $request->email;
        $nombre = $request->name;
        $pass = $request->password;
        Mail::to($email)->send(new UsuarioCreado($nombre,$email,$pass));
*/
        $mensaje = $usuario?'Usuario creado ok':'No se pudo crear el usuario';
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $usuario = User::find($id);
        $perfiles = Perfil::orderBy('nombre','asc')->pluck('nombre','id');
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.usuarios.editar',compact('usuario','perfiles','estados'));
    }

    
    public function update(Request $request, $id)
    {
        //Validar los campos
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'perfil_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Actualizar el usuario
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->password)
            $usuario->password = Hash::make($request->password);
        $usuario->perfil_id = $request->perfil_id;
        $usuario->estado_id = $request->estado_id;
        $usuario->save();

        $mensaje = $usuario?'Usuario actualizado ok':'No se pudo actualizar';
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);
    }

    
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->estado_id = 2;
        $usuario->save();

        $mensaje = $usuario?'Usuario inactivado':'No se pudo inactivar';
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);
    }

    // 2018-05-16: funcion para exportar a PDF
    public function exportarPDF(){
            //return "Hola";
/*      $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1><p> esto es una prueba </p>');
        return $pdf->stream(); // para que se descargue.
*/
        
        $usuarios = User::all();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \View('admin.usuarios.pdf',compact('usuarios'))->render();
        $pdf->loadHTML($vista);
        return $pdf->download('usuarios.pdf');
        
    } 
// 2018-05-16: funcion para exportar a Excel
    public function exportarExcel(){
        //return "Hola Excel";
        Excel::create('Usuarios',function($excel){
            $excel->sheet('Usuarios',function($sheet){
                $usuarios = User::all();
                $sheet->fromArray($usuarios);
            });
        })->export('xlsx');
        
    }

    //2018-05-016 funcion para importar usuarios desde excel.
    public function importarExcel(){
        Excel::load('usuarios.xlsx',function($reader) {
            foreach($reader->get() as $user){
                User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->password),
                    'perfil_id' => $user->perfil_id,
                    'estado_id' => $user->estado_id
                ]);
            }

        });
        return redirect()->route('usuarios.index');
    }

}
