<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\locations;
use Illuminate\Http\Request;

/* $assistants ->  */

class AssistantsController extends Controller
{
    public function index()
    {
        $assistants = User::assistant()->get();
        return view('assistants.index', compact('assistants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows_sede_asistente= locations::get();
        return view('assistants.create', compact('rows_sede_asistente')) ;
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
            'id' => 'required|digits:8',
            'address' =>'nullable|min:6',
            'phone' => 'required',

            
        ];

        $this->validate($request , $rules);

        User::create(
            $request->only('name','email', 'id', 'address','phone','genero','sede')
            +[
                'role' =>'asistente',
                'password' => bcrypt($request->input('password' ))
            ]);


            $notification = 'El asistente se ha creado correctamente';
            return redirect('/asistente') ->with(compact('notification'));    

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
        $assistants = User::assistant()->findOrFail($id);
        return view('assistants.edit',compact('assistants')); 
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
            'id' => 'required|digits:8',
            'address' =>'nullable|min:6',
            'phone' => 'required'
        ];

        $this->validate($request, $rules);

        $user = User::assistant()->findOrFail($id);    

        
        $data = $request->only('name','email', 'id', 'address','phone','genero','fecha_nacimiento');
        $password = $request->input('password');

        if ($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save(); 

        $notification = 'Los datos del asistente se cambiaron correctamente ';

        return redirect('/asistente')->with(compact('notification'));   
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::assistant()->findOrFail($id);
        $assistantsName=$user->name;
        $user->delete();
        $notification = "El asistente $assistantsName ha sido eliminado correctamente";
        return redirect('/asistente')->with(compact('notification'));
    }
}
