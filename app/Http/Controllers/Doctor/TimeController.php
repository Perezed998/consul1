<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horarios;
use Carbon\Carbon;
use PhpParser\Node\Expr\Cast\Object_;

class TimeController extends Controller
{
    
    private $days = [
        'Lunes','Martes','Miercoles','Jueves','Viernes'
    ];
    
    
    public function edit(){

        
        $horarios = Horarios::where('user_id', auth()->id())->get();


        if ($horarios->count()==0){
            foreach ($this->days as $key => $day) {
                $horarios[] = (object)[
                    'day' => $key,
                    'active' => 0,
                    'morning_start' => (new Carbon())->format('g:i A'),
                    'morning_end' => (new Carbon())->format('g:i A'),
                    'afternoon_start' =>(new Carbon())->format('g:i A'),
                    'afternoon_end' => (new Carbon())->format('g:i A'),

                 ];
            }
        }
        else{
            $horarios->map(function($horarios){
                $horarios->morning_start = (new Carbon($horarios->morning_start))->format('g:i A');
                $horarios->morning_end = (new Carbon($horarios->morning_end))->format('g:i A');
                $horarios->afternoon_start = (new Carbon($horarios->afternoon_start))->format('g:i A');
                $horarios->afternoon_end = (new Carbon($horarios->afternoon_end))->format('g:i A');
            });
        }

        $days = $this->days;

       // return $horarios;


        return view('horario',compact('days','horarios'));

    }

    public function store(Request $request){

        $active=$request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');

        $errors =[];

        for($i=0; $i<5; ++$i){

            if ($morning_start[$i]> $morning_end[$i]){

                $errors[] = 'El intervalo de las horas del turno de la mañana del dia '.$this->days[$i].' . ';

            }

            if ($afternoon_start[$i] > $afternoon_end[$i]){

                $errors[] = 'El intervalo de las horas del turno de la tarde del dia '.$this->days[$i].' . ';

            }
            
            
            Horarios::updateOrCreate(
                    [
                        'day' => $i,
                        'user_id'=> auth()->id()

                    ],
                    ['active'=> in_array($i, $active),
                    'morning_start' => $morning_start[$i],
                    'morning_end'=> $morning_end[$i],
                    'afternoon_start'=> $afternoon_start[$i], 
                    'afternoon_end'=> $afternoon_end[$i]
                    ]

                    
                );

            }

            if (count($errors) > 0 )

                return back()->with(compact('errors'));

            $notification = 'los cambios se han guardado correctamente.';
            return back()->with(compact('notification'));

    }



}
