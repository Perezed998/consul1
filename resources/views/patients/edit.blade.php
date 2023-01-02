@extends('layouts.panel')

@section('content')



  
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar Paciente</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/pacientes')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
          <div class="card-body">

            
          
            
            <form action="{{ route('Pacientes.update',['id' => $paciente->id])  }}" method="POST" >
                @csrf
                @method('PUT')

                
                <div class="form-group">
                    <label for="name">Nombre del Paciente</label> 
                    <input type="text" name="name" id="name" class="form-control"  value="{{ old('name' , $paciente->name) }}" >
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
                  <input class="form-control datepicker" placeholder="Seleccionar Fecha" id="fecha_nacimiento" name="fecha_nacimiento" type="text" value="yyyy/mm/dd" data-date-format="yyyy/mm/dd">
               </div>
                @if ($errors->has('fecha_nacimiento'))
                <div class="text-danger"> 
                  {{ $errors->first('fecha_nacimiento') }}
                </div>
                @endif
            </div>  
                  
                <div class="form-group">
                    <label for="id">Cedula</label>
                    <input type="text" name="id" class="form-control" value="{{old('id' , $paciente->id)}}">
                    @if ($errors->has('id'))
                    <div class="text-danger"> 
                      {{ $errors->first('id') }}
                    </div>
                    @endif 
                </div> 

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="{{old('email' , $paciente->email)}}">
                  @if ($errors->has('email'))
                  <div class="text-danger"> 
                    {{ $errors->first('email') }}
                  </div>
                  @endif
                </div>  
                
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" value="{{old('address' , $paciente->address)}}">
                    @if ($errors->has('address'))
                    <div class="text-danger"> 
                      {{ $errors->first('address') }}
                    </div>
                    @endif
                </div> 
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone' , $paciente->phone)}}">
                    @if ($errors->has('phone'))
                    <div class="text-danger"> 
                      {{ $errors->first('phone') }}
                    </div>
                    @endif
                </div> 
                
                <label for="genero">Genero</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                   Femenino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                   Masculino
                  </label>
                </div>

                <br>
                <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>  
            </form>

          </div>
        </div>
      </div>
    

@endsection
@section('scripts')

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>

@endsection
