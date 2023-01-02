@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Medicos</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/medicos/create')}}" class="btn btn-sm btn-primary">Agregar Medico</a>
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
                <th scope="col">Correo</th>
                <th scope="col">ID</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Sede</th>


                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($doctors as $doctor)
                  
               <tr>
                <th scope="row">
                  {{$doctor->name}}
                </th>
                <td>
                  {{$doctor->email}}
                </td>
                <td>
                    {{$doctor->id}}
                  </td>
                  <td>
                    {{$doctor->Especialidad->name }}
                  </td>
                  <td>
                    {{$doctor->locacion->name }}
                  </td>
                <td>
                  <form action="{{route('Doctor.destroy', ['id' =>$doctor->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('Doctor.edit', ['id' =>$doctor->id]) }}" class="btn btn-sm btn-primary">Editar</a>

                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Quieres borrar este doctor?')">Eliminar</a>
                  
                  </form>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    

@endsection
