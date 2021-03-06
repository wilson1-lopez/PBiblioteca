<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='home') ? 'active':'' }}" href="{{ route('home') }}">
                <i class="ni ni-tv-2 text-orange"></i>
                <span class="nav-link-text">Inicio</span>
            </a>
        </li>

       
        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='user') ? 'active':'' }}" href="{{ route('user.index') }}">
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">Usuarios</span>
            </a>
        </li>
      

        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='roles') ? 'active':'' }}" href="{{ route('roles.index') }}">
                <i class="ni ni-paper-diploma text-orange"></i>
                <span class="nav-link-text">Roles</span>
            </a>
        </li>
       
        
        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='libro') ? 'active':'' }}" href="{{ route('libro.index') }}">
                <i class="ni ni-paper-diploma text-orange"></i>
                <span class="nav-link-text">Libro</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='pais') ? 'active':'' }}" href="{{ route('pais.index') }}">
                <i class="ni ni-paper-diploma text-orange"></i>
                <span class="nav-link-text">Pais</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='editorial') ? 'active':'' }}" href="{{ route('editorial.index') }}">
                <i class="ni ni-paper-diploma text-orange"></i>
                <span class="nav-link-text">Editorial</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='autor') ? 'active':'' }}" href="{{ route('autor.index') }}">
                <i class="ni ni-paper-diploma text-orange"></i>
                <span class="nav-link-text">Autor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{(request()->segment(1)=='area') ? 'active':'' }}" href="{{ route('area.index') }}">
                <i class="ni ni-paper-diploma text-orange"></i>
                <span class="nav-link-text">Area</span>
            </a>
        </li>
    </ul>
</div>
