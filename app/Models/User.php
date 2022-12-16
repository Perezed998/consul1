<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
         'id', 
         'address',
         'phone',
         'especialidad',
         'sede',
         'role',
         'sanidad',
         'numcolegio',
         'fecha_nacimiento',
         'genero',
         'estatus',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePatients($query){
       
        return $query->where('role','paciente');
        
    }

    public function scopeDoctors($query){
       
        
        return $query->where('role','doctor');
        
    }

    public function scopeAssistant($query){
       
        
        return $query->where('role','asistente');
        
    }

    public function Especialidad()
    {
        return $this->hasOne(Specialty::class, 'id', 'especialidad');
    }

    public function locacion()
    {
        return $this->hasOne(locations::class, 'id', 'sede');
    }


}
