<?php

namespace App\Http\Controllers;

use App\Models\locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    

        public function index(){
            $location=Locations::all();
            return  view('location.index', compact('location'));
        }
    
        public function create(){
    
            return view('location.create');
        }
    
        public function store(Request $request){
    
            $rules = [
                'name' => 'required|min:3'
            ];
            
            $this->validate($request ,$rules);
    
            $locations = new Locations();
            $locations->name = $request->input('name');
            $locations->description = $request->input('description');
            $locations->save();
            
            $notification = 'La sede se a creado correctamente.';
    
            return redirect('/sede')->with(compact('notification'));    
        }
    
        public function show($id){
    
        }
    
        public function edit($id){
    
            $locations = Locations::findOrFail($id);
            return view('location.edit' , compact('locations'));
    
        }
    
    
        public function update(Request $request, $id){
    
            $rules = [
                'name' => 'required|min:3'
            ];
    
            $this->validate($request ,$rules);
    
            $locations = Locations::findOrFail($id);
            $locations->name = $request->input('name');
            $locations->description = $request->input('description');
            $$locations->save();
            
            $notification = 'La sede se a editado correctamente.';
    
            return redirect('/sede') ->with(compact('notification'));    
        }
    
        public function destroy($id){
            $locations=Locations::findOrFail($id);
            $deleteName = $locations->name;
            $locations->delete(); 
    
            $notification = 'La sede '.$deleteName.' se a eliminado correctamente.';
    
    
           return redirect('/sede')->with(compact('notification'));    
    
        }
}
?>
