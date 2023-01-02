<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Descripción</th>
          <th scope="col">Especialidad</th>
          @if ($role == 'pacientes')
            <th scope="col">Medico</th>
          @elseif($role == 'doctor')
            <th scope="col">Paciente</th>
          @endif
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Tipo</th>
          <th scope="col">Estado</th>




          


          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($confirmedAppointments as $cita)
            
         <tr>
          <th scope="row">
            {{$cita->descripcion}}
          </th>
          <td>
            {{$cita->specialty->name}}
          </td>
          @if($role == 'paciente')
            <td>
                {{$cita->doctor->name}}
              </td>
          @elseif($role == 'doctor')
            <td>
              {{$cita->pacient->name}}
            </td>
          @endif
            <td>
              {{$cita->scheduled_date}}
            </td>
            <td>
              {{$cita->sheduled_Time_12}}
            </td>
            <td>
              {{$cita->type}}
            </td>
            <td>
              {{$cita->status}}
            </td>
          <td>
           
            @if ($role == 'admin')

            <a href="{{url('/reservarcita/'.$cita->id)}}" type="submit" class="btn btn-sm btn-info" title="Ver cita">Ver</a>
            @endif


            <a href="{{url('/reservarcita/'.$cita->id.'/cancel')}}" type="submit" class="btn btn-sm btn-danger" title="Cancelar cita">Cancelar</a>


          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>