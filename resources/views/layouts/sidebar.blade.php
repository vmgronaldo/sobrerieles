<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <div class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <img src="{{asset('images/logo.png')}}" width="120"  alt="">
        </div>
        <div class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <img src="{{asset('images/logo.png')}}"  width="120" alt="">
        </div>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('home')}}">
                <i class="fa fa-dashboard mr-2"></i> Escritorio</a></li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa fa-cube mr-2"></i> Modulo Cursos</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('categories.index')}}"><i class="fa fa-plus mr-2"></i> Categorías</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('trainers.index')}}"><i class="fa fa-user-plus mr-2"></i>  Profesores</a></li>

                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('courses.index')}}"><i class="fa fa-plus mr-2"></i> Cursos</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa fa-cube mr-2"></i> Modulo Certficados</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('participants.index')}}"><i class="fa fa-user-plus mr-2"></i>  Participantes</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('certificates.create')}}"><i class="fa fa-address-card mr-2"></i> Crear Certificado</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('calendar.index')}}">
                <i class="fa fa-calendar-o mr-2"></i> Calendario</a></li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
