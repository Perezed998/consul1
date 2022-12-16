<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $service=Services::all();
        return  view('services\index', compact('service'));
    }

    public function create(){

        return view('services.create');
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|min:3'
        ];
        
        $this->validate($request ,$rules);

        $service = new Services();
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->save();
        
        $notification = 'El servicio se a creado correctamente.';

        return redirect('/servicio')->with(compact('notification'));    
    }

    public function show($id){

    }

    public function edit($id){

        $service = Services::findOrFail($id);
        return view('services.edit' , compact('service'));

    }


    public function update(Request $request, $id){

        $rules = [
            'name' => 'required|min:3'
        ];

        $this->validate($request ,$rules);

        $service = Services::findOrFail($id);
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->save();
        
        $notification = 'El servicio se a editado correctamente.';

        return redirect('/servicio') ->with(compact('notification'));    
    }

    public function destroy($id){
        $service=Services::findOrFail($id);
        $deleteName = $service->name;
        $service->delete(); 

        $notification = 'El servicio '.$deleteName.' se a eliminado correctamente.';


       return redirect('/servicio')->with(compact('notification'));    

    }

}
