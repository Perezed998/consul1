<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\HorarioServiceInterface;
use App\Models\Horarios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function hours(Request $request , HorarioServiceInterface $horarioServiceInterface){

        $rules = [

            'date'=>'required|date_format:"Y-m-d"',
            'doctor_id'=>'required|exists:users,id'
        ];

        $this->validate($request,$rules);
        
        $date = $request->input('date');
        //$dateCarbon = new Carbon($date);
       // $i = $dateCarbon->dayOfWeek;
        //la libreria carbon inicia la semana con el dia domingo , para cambiar esto se procede con lo siguiente 
       // $day = ($i==0 ? 6 : $i-1);
        $doctorId = $request->input('doctor_id');

        return $horarioServiceInterface->getAvailableIntervals($date,$doctorId);


    }

       

    
}
