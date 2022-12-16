<?php

namespace App\Http\Controllers;

use App\Models\locations;
use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::patients()->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows_sede_pacientes = locations::get();
        return view('patients.create', compact('rows_sede_pacientes')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'id' => 'required|digits:10',
            'address' =>'nullable|min:6',
            'phone' => 'required',
            'fecha_nacimiento'=>'required|date_format:Y-m-d'

            
        ];

        $this->validate($request , $rules);

        User::create(
            $request->only('name','fecha_nacimiento','email', 'id', 'address','phone','genero')
            +[
                'role' =>'paciente',
                'password' => bcrypt($request->input('password' ))
            ]);


            $notification = 'El paciente se ha creado correctamente';
            return redirect('/pacientes') ->with(compact('notification'));    

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
        $paciente = User::patients()->findOrFail($id);
        return view('patients.edit',compact('paciente')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {


        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'id' => 'required|digits:10',
            'address' =>'nullable|min:6',
            'phone' => 'required',
            'fecha_nacimiento'=>'required|date'
        ];

        $this->validate($request, $rules);

        $user = User::patients()->findOrFail($id);    

        
        $data = $request->only('name','email', 'id', 'address','phone','genero','fecha_nacimiento');
        $password = $request->input('password');

        if ($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save(); 

        $notification = 'Los datos del pacientes se cambiaron correctamente ';

        return redirect('/pacientes')->with(compact('notification'));   
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::patients()->findOrFail($id);
        $pacienteName=$user->name;
        $user->delete();
        $notification = "El paciente $pacienteName ha sido eliminado correctamente";
        return redirect('/pacientes')->with(compact('notification'));
    }
}
