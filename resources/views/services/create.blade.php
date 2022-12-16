@extends('layouts.panel')

@section('content')



  
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva Servicio</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/servicio')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
          <div class="card-body">

              
            
            <form action="{{ route('Servicio.store')  }}" method="POST" >
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="name">Nombre del Servicio</label> 
                    <input type="text" name="name" id="name" class="form-control"  value="{{old('name')}}" >
                    @if ($errors->has('name'))
                    <div class="text-danger"> 
                      {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control" value="{{old('description')}}">
                  </div>  
                <button type="submit" class="btn btn-sm btn-primary">Crear Servicio</button>  
            </form>

          </div>
        </div>
      </div>
    

@endsection
