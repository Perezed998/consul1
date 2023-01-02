@extends('layouts.panel')

@section('content')



  
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Registrar Nueva Cita</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/reservarcita')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
          <div class="card-body">

            
          
            
            <form action="{{ route('Pacientes.store')  }}" method="POST" >
                @csrf
                @method('POST')




                <div class="form-row">

                  <div class="form-group col-md-6" >
                    <div class="form-group">
                        <label for="specialty">Especialidad</label>
                        <select name="specialty_id" id="specialty" class="form-control">
                            <option value="">-- Seleccionar Uno --</option>
                            @foreach ($rows as $row)
                                <option value="{{ $row->id }}" 
                                  @if (old('specialty_id')== $row->id) selected @endif>
                                  {{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div> 
              </div>
    
              <div class="form-group col-md-6">
                <label for="doctor">Medico</label>
                <select name="doctor_id" id="doctor" class="form-control" required>
                  @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id }}" 
                    @if (old('doctor_id')== $doctor->id) selected @endif>
                    {{ $doctor->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('doctor'))
                <div class="text-danger"> 
                  {{ $errors->first('doctor') }}
                </div>
                @endif
            </div> 


          </div>

                <div class="form-group">
                    <label for="date">Fecha</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control datepicker" type="text" placeholder="Seleccionar Fecha" id="scheduled_date" name="scheduled_date" 
                        value="{{ old('scheduled_date'), date('Y-m-d')}}" data-date-format="yyyy-mm-dd" data-date-star-date="{{date('d-m-Y')}}" data-date-end-date="+30d">
                   </div>
                </div>                  
                
                <div class="form-group">
                    <label for="hours">Hora de atencion</label>
                    <div class="container">
                      <div class="row">
                        <div class="col">
                            <h4 class="m-3" id="titleMorning"></h4>
                            <div id="hoursMorning">
                              @if($intervals)
                                @foreach($intervals ['morning'] as $key => $interval)

                                <!-- explicar que es esto -->
                                  <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="intervalMorning{{$key}}" name="sheduled_time" value="{{$interval['start']}}" class="custom-control-input" >
                                    <label class="custom-control-label" for="intervalMorning{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                                  </div>`

                                @endforeach
                              @else
                                <mark id="">
                                  <small class="text-warning display-5">
                                      Seleciona un medico y una fecha para ver las horas disponibles.
                                  </small>
                                </mark>
                              @endif
                            </div>
                        </div>
                        <div class="col">
                          <h4 class="m-3" id="titleAfternoon"></h4>
                          <div id="hoursAfternoon">
                            @if($intervals)
                                @foreach($intervals ['afternoon'] as $key => $interval)

                                <!-- explicar que es esto -->
                                  <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="intervalAftenoon{{$key}}" name="sheduled_time" value="{{$interval['start']}}" class="custom-control-input" >
                                    <label class="custom-control-label" for="intervalAftenoon{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                                  </div>`

                                @endforeach
                            @endif
                          </div>
                      </div>                        
                      </div>
                    </div>
                    
                </div> 
                <div class="form-group">
                    <label >Tipo de consulta</label>
                    <div class="custom-control custom-radio  mt-3 mb-3">
                      <input type="radio" id="type1" name="type" class="custom-control-input" @if(old('type') == 'Consulta') checked @endif  value="Consulta">
                      <label class="custom-control-label" for="type1">Consulta</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <input type="radio" id="type2" name="type" class="custom-control-input" @if (old('type')== 'Examen') checked @endif value="Examen" >
                      <label class="custom-control-label" for="type2">Examen</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <input type="radio" id="type3" name="type" class="custom-control-input" @if (old('type')== 'Operacion') checked @endif value="Operacion">
                      <label class="custom-control-label" for="type3">Operacion</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <input type="radio" id="type4" name="type" class="custom-control-input" @if (old('type')== 'Estudios_Especiales') checked @endif value="Estudios_Especiales">
                      <label class="custom-control-label" for="type4">Estudios Especiales</label>
                    </div>
                    <div class="custom-control custom-radio mb-5">
                      <input type="radio" id="type5" name="type" class="custom-control-input" @if (old('type')== 'Laboratorio') checked @endif value="Laboratorio">
                      <label class="custom-control-label" for="type5">Laboratorio</label>
                    </div>

                    <div class="form-group">

                      <label for="description">Sintomas</label>
                      <textarea name="description" id="description" type="text"  class="form-control" rows="5" placeholder="Descripción breve de sus sintomas" required></textarea>

                    </div>

                </div> 
                

                
               {{-- 
                
                Opcional!!

                
                <div class="form-group">
                    <div class="form-group">
                        <label for="sede">Sede de Origen</label>
                        <select name="sede" id= "sede"class="form-control">
                            <option value="">-- Seleccionar Uno --</option>
                            @foreach ($rows_sede_pacientes as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('sede'))
                            <div class="text-danger"> 
                                {{ $errors->first('sede') }}
                            </div>
                        @endif
                    </div> 
              </div>--}}
                <br>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>  
            </form>

          </div>
        </div>
      </div>
    

@endsection
@section('scripts')

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>
<script src="{{asset('/js/appointments/create.js')}}">
</script>
@endsection
