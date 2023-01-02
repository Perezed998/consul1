<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Especialidad</th>
          <th scope="col">Fecha</th>
          <th scope="col">Estado</th>

          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($oldAppointments as $cita)
            
         <tr>
          
          <td>
            {{$cita->specialty->name}}
          </td>
          
            <td>
              {{$cita->scheduled_date}}
            </td>
            
            
            <td>
              {{$cita->status}}
            </td>
          <td>
            {{--<form action=" {{url('/reservarcita/' .$citas->id)  }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-sm btn-danger" title="Cancelar cita">Cancelar</a>
            
            </form>--}}

            <a href="{{url('/reservarcita/'.$cita->id)}}" class="btn btn-info btn-sm">
              Ver
            </a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>