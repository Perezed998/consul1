<!-- Heading -->
<h1>Oriental de Salud Integral C.A</h1>
<h6 class="navbar-heading text-muted">Gestion</h6>
<!-- Navigation -->
<ul class="navbar-nav">

 {{-- @if(auth()->user()->role == 'admin')--}}
    <li class="nav-item  active ">
      <a class="nav-link  active " href="{{url('/home')}}">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/especialidades')}}">
        <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/medicos')}}">
        <i class="fas fa-stethoscope text-info"></i> Medicos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/pacientes')}}">
        <i class="fas fa-bed text-warning"></i> Pacientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/reservarcita')}}">
        <i class="ni ni-calendar-grid-58 text-blue"></i> Citas medicas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/sede') }}">
        <i class="ni ni-building text-black"></i> Sedes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/servicio') }}">
        <i class="ni ni-archive-2 text-pink"></i> Servicios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/asistente') }}">
        <i class="ni ni-badge text-green"></i> Asistente
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{url('/reservarcita')}}">
        <i class="ni ni-calendar-grid-58 text-blue"></i> Mis Citas
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link " href="{{route('Horarios.edit', ['id' => auth()->id()])}}">
        <i class="ni ni-calendar-grid-58 text-blue"></i> Gestionar Horario
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{route('Cita.create')}}">
        <i class="ni ni-calendar-grid-58 text-blue"></i> Gestionar Cita
      </a>
    </li>


    
    <li class="nav-item">
      <a class="nav-link" href="{{route('logout')}}"
       onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
      
      >
        <i class="fas fa-sign-in-alt"></i> Cerrar Sesion
      </a>
      <form action="{{route('logout')}}" method="POST" style="display:none;" id="formLogout">
        @csrf
    </form>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-books text-default"></i> Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-chart-bar-32 text warning"></i> Opcion 01
      </a>
    </li>
  </ul>