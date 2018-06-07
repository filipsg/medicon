<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Agenda;
use App\User;
use App\Servicio;
use App\Paciente;
use App\Medico;
use App\Estadoagenda;

class AgendasController extends Controller
{

    public function index()
    {
       $agendas = Agenda::select('id','fecha_ini as start','fecha_fin as end','paciente_id as title')->get();
       $pacientes = User::where('perfil_id',3)->orderBy('name','asc')->pluck('name','id');
       $medicos = User::where('perfil_id',2)->orderBy('name','asc')->pluck('name','id');
       $servicios = Servicio::orderBy('nombre','asc')->pluck('nombre','id');
       $estados = Estadoagenda::orderBy('nombre','asc')->pluck('nombre','id');
       return view('admin.agenda.index',compact('agendas','pacientes','medicos','servicios','estados'));
    }

    
    public function create()
    {
        
    }


    public function store(Request $request)
    {
//return $request;

        //Validar los campos
        $request->validate([
            'fecha_ini' => 'required',
            'hora_ini' => 'required',
            'fecha_fin' => 'required',
            'hora_fin' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'servicio_id' => 'required'
        ]);

        $paciente = Paciente::where('user_id',$request->paciente_id)->first();
        $medico = Medico::where('user_id',$request->medico_id)->first();


        //Insertar los datos
        $agenda = Agenda::create([
            'fecha_ini'=>$request->fecha_ini,
            'hora_ini'=>$request->hora_ini,
            'fecha_fin'=>$request->fecha_fin,
            'hora_fin'=>$request->hora_fin,
            'user_id'=> Auth::user()->id,
            'paciente_id'=>$paciente->id,
            'medico_id'=>$medico->id,
            'servicio_id'=>$request->servicio_id,
            'estado_id' =>1
        ]);

        $mensaje = $agenda?'Cita creada ok':'No se pudo crear la cita';
        return redirect()->route('calendario.index')->with('mensaje',$mensaje);

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $agenda = Agenda::find($id);
       $pacientes = DB::table('users')
                        ->join('pacientes', 'users.id', '=', 'pacientes.user_id')
                        ->pluck('users.name','pacientes.id');


       $medicos = DB::table('users')
                        ->join('medicos', 'users.id', '=', 'medicos.user_id')
                        ->pluck('users.name','medicos.id');

       $servicios = Servicio::orderBy('nombre','asc')->pluck('nombre','id');
       $estados = Estadoagenda::orderBy('nombre','asc')->pluck('nombre','id');
       return view('admin.agenda.editar',compact('agenda','pacientes','medicos','servicios','estados'));
    }

    public function update(Request $request, $id)
    {

        //Validar los campos
        $request->validate([
            'fecha_ini' => 'required',
            'hora_ini' => 'required',
            'fecha_fin' => 'required',
            'hora_fin' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'servicio_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Actualizar los datos
        $agenda = Agenda::find($id);
        $agenda->fecha_ini = $request->fecha_ini;
        $agenda->hora_ini = $request->hora_ini;
        $agenda->fecha_fin = $request->fecha_fin;
        $agenda->hora_ini = $request->hora_ini;
        $agenda->paciente_id = $request->paciente_id;
        $agenda->medico_id = $request->medico_id;
        $agenda->servicio_id = $request->servicio_id;
        $agenda->estado_id = $request->estado_id;
        $agenda->save();

        $mensaje = $agenda?'Agenda actualizada ok':'No se pudo actualizar';
        return redirect()->route('calendario.index')->with('mensaje',$mensaje);
    }

    
    public function destroy($id)
    {
        //
    }
}
