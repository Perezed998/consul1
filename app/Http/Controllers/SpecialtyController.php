<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;


class SpecialtyController extends Controller
{

    public function index(){
        $specialties=Specialty::all();
        return  view('specialties.index', compact('specialties'));
    }

    public function create(){

        return view('specialties.create');
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|min:3'
        ];
        
        $this->validate($request ,$rules);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        
        $notification = 'La especialidad se a creado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));    
    }

    public function show($id){

    }

    public function edit($id){

        $specialty = Specialty::findOrFail($id);
        return view('specialties.edit' , compact('specialty'));

    }


    public function update(Request $request, $id){

        $rules = [
            'name' => 'required|min:3'
        ];

        $this->validate($request ,$rules);

        $specialty = Specialty::findOrFail($id);
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        
        $notification = 'La especcialidad se a editado correctamente.';

        return redirect('/especialidades') ->with(compact('notification'));    
    }

    public function destroy($id){
        $specialty = Specialty::findOrFail($id);
        $deleteName = $specialty->name;
        $specialty->delete(); 

        $notification = 'La especialidad '.$deleteName.' se a eliminado correctamente.';


       return redirect('/especialidades')->with(compact('notification'));    

    }
}

?>