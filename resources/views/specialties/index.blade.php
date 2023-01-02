@extends('layouts.panel')

@section('style')
    <!--Estilo para las tablas Data Table -->
    <link href="{{asset('/DataTables/datatables.css')}} " rel="stylesheet" />

@endsection


@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Especialidades</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/especialidades/create')}}" class="btn btn-sm btn-primary">Agregar Especialidad</a>
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
          <table id="example" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($specialties as $especialidad)
                <tr>
                  <td>{{$especialidad->name}}</td>
                  <td>{{$especialidad->description}}</td>
                  <td>
                    <form action="{{route ('Especialidades.destroy' , ['id' => $especialidad->id])}}" method="POST">
                      @csrf
                      @method('DELETE')

                      <a href="{{ route('Especialidades.edit', ['id' => $especialidad->id] ) }}" class="btn btn-sm btn-primary">
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

@section('scripts')
    <!--Script para las tablas Data Table -->
    <script src="{{asset('/DataTables/datatables.js')}} "></script>

    <script>
      $(document).ready(function () {
        //inicializar el datatable 
        $('#example').DataTable();
      });
    </script>

@endsection