<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

//se obtendran los medicos asociados con una especialidad en formato JSON

class SpecialtyController extends Controller
{
    public function doctors(Specialty $specialty){


        return $specialty->users()->get([

            'users.id',
            'users.name'

        ]);



    }
}
