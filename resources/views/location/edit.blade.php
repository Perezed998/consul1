@extends('layouts.panel')

@section('content')



  
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar Sede</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/sede')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
          <div class="card-body">
            
            <form action="{{ route('Sede.update', ['id' => $locations->id]) }}" method="POST" >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nombre de la Sede</label> 
                    <input type="text" name="name" class="form-control"  value="{{old('name' , $locations->name)}}">
                    @if ($errors->has('name'))
                    <div class="text-danger"> 
                      {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control" value="{{old('description' , $locations->description)}}">
                </div>  
                <button type="submit" class="btn btn-sm btn-primary">Guardar Sede</button>  
            </form>

          </div>
        </div>
      </div>
    

@endsection
