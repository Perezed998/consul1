@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Pacientes</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/pacientes/create')}}" class="btn btn-sm btn-primary">Nuevo Paciente</a>
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
                


                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($patients as $paciente)
                  
               <tr>
                <th scope="row">
                  {{$paciente->name}}
                </th>
                <td>
                  {{$paciente->email}}
                </td>
                <td>
                    {{$paciente->id}}
                  </td>
                <td>
                  <form action=" {{route('Pacientes.destroy',['id' => $paciente->id])  }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('Pacientes.edit',['id' => $paciente->id])  }}" class="btn btn-sm btn-primary">Editar</a>

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
