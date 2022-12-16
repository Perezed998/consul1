@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Sedes</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('sede/create') }}" class="btn btn-sm btn-primary">Agregar Sede</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        @if (session('notification'))
          <div class="alert alert-success" role="alert">
            {{session('notification')}}
        </div>
        @endif
      </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($location as $locacion)
                <tr>
                  <td>{{$locacion->name}}</td>
                  <td>{{$locacion->description}}</td>
                  <td>
                    <form action="{{route ('Sede.destroy' , ['id' => $locacion->id])}}" method="POST">
                      @csrf
                      @method('DELETE')

                      <a href="{{ route('Sede.edit', ['id' => $locacion->id] ) }}" class="btn btn-sm btn-primary">
                        Editar
                      </a>

                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</a>                    
                    </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    

@endsection
