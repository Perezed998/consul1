<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [

        'scheduled_date',
        'scheduled_time',
        'type',
        'description',
        'doctor_id',
        'patient_id',
        'specialty_id'

    ];

    //relacion entre el model appointment y el model specialty

    public function specialty(){

        return $this->belongsTo(Specialty::class);
    }

    //relacion entre el model appointment y el model user-> doctores

    public function doctor(){
        return $this->belongsTo(User::class);
    }

    public function patient(){
        return $this->belongsTo(User::class);
    }



    // formato carbon -> g->formato 12H   i-> minutos A-> es AM y PM 
    public function getScheduledTime12Attribute(){
        return(new Carbon($this->scheduled_time))
        ->format('g:i A');
    }

    public function cancellation(){
        return $this->hasOne(CancelleAppointment::class);
    }

}
