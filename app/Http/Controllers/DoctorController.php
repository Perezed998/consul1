<?php

namespace App\Http\Controllers;

use App\Models\locations;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::doctors()->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Specialty::get();
        $rows_sede = locations::get();
        return view('doctors.create', compact('rows','rows_sede'));
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
            'especialidad'=>'required',
            'sede' => 'required',
            'genero'=>'required',
            'estatus'=>'required',
            'sanidad'=>'required',
            'numcolegio'=>'required'            


        ];

        $this->validate($request , $rules);

        User::create(
            $request->only('name','email', 'id', 'address','phone','especialidad','sede','genero','estatus','sanidad','numcolegio')
            +[
                'role' =>'doctor',
                'password' => bcrypt($request->input('password' ))
            ]
        );

            $notification = 'El medico se ha creado correctamente';
            return redirect('/medicos') ->with(compact('notification'));    

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
        $doctor = User::doctors()->findOrFail($id);
        $rows = Specialty::get();
        $rows_sede = locations::get(); 
        return view('doctors.edit', compact('doctor','rows','rows_sede'));

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

            $rules = [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'id' => 'required|digits:8',
                'address' =>'nullable|min:6',
                'phone' => 'required',
                'especialidad'=>'required',
                'sede' => 'required',
                'genero'=>'required',
                'estatus'=>'required',
                'sanidad'=>'required',
                'numcolegio'=>'required'

                
            ];
    
            $this->validate($request , $rules );
            $user = User::doctors()->findOrFail($id);    

            
            $data = $request->only('name','email', 'id', 'address','phone','especialidad','sede','genero','estatus','sanidad','numcolegio');
            $password = $request->input('password');

            if ($password)
                $data['password']=bcrypt($password);

                $user->fill($data);
                $user->save(); 

   
                $notification = 'Los datos del doctor se cambiaron correctamente ' ;             
                return redirect('/medicos')->with(compact('notification'));  
                  
    
    }


    public function destroy($id)
    {

        $user= User::doctors()->findOrFail($id);
        $doctorName=$user->name;
        $user->delete();
        $notification = "EL doctor $doctorName ha sido eliminado correctamente";
        return redirect('/medicos')->with(compact('notification'));
    }
}
