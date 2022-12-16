@extends('layouts.panel')

@section('content')



  
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo Paciente</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/pacientes')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
          <div class="card-body">

            
          
            
            <form action="{{ route('Pacientes.store')  }}" method="POST" >
                @csrf
                @method('POST')


                <div class="form-group">
                    <label for="name">Nombre del Paciente</label> 
                    <input type="text" name="name" id="name" class="form-control"  value="{{old('name')}}" >
                    @if ($errors->has('name'))
                    <div class="text-danger"> 
                      {{ $errors->first('name') }}
                    </div>
                    @endif
               </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control datepicker" placeholder="Seleccionar Fecha" type="text" value="2020/06/20" data-date-format="yyyy/mm/dd">
                   </div>
                    @if ($errors->has('fecha_nacimiento'))
                    <div class="text-danger"> 
                      {{ $errors->first('fecha_nacimiento') }}
                    </div>
                    @endif
                </div>  

                  
                <div class="form-group">
                    <label for="id">Cedula</label>
                    <input type="text" name="id" class="form-control" value="{{old('id')}}">
                    @if ($errors->has('id'))
                    <div class="text-danger"> 
                      {{ $errors->first('id') }}
                    </div>
                    @endif 
                </div> 

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                  @if ($errors->has('email'))
                  <div class="text-danger"> 
                    {{ $errors->first('email') }}
                  </div>
                  @endif
                </div>  
                
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                    @if ($errors->has('address'))
                    <div class="text-danger"> 
                      {{ $errors->first('address') }}
                    </div>
                    @endif
                </div> 
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                    @if ($errors->has('phone'))
                    <div class="text-danger"> 
                      {{ $errors->first('phone') }}
                    </div>
                    @endif
                </div> 
                
                <label for="genero">Genero</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault1" value="0">
                  <label class="form-check-label" for="flexRadioDefault1">
                   Femenino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault2" checked  value="1">
                  <label class="form-check-label" for="flexRadioDefault2">
                   Masculino
                  </label>
                </div>
                    <br>
                {{-- <div class="form-group">
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
              </div> --}}
                <br>
                <button type="submit" class="btn btn-sm btn-primary">Crear Paciente</button>  
            </form>

          </div>
        </div>
      </div>
    

@endsection
@section('scripts')

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>

@endsection
