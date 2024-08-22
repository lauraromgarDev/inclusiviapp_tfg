<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Logo en la barra de navegación (visible en móviles) -->
        <a class="navbar-brand d-lg-none" href="{{ Auth::guest() ? url('/') : (Auth::guard('admin')->check() ? route('admin.dashboard', app()->getLocale()) : route('main.index', app()->getLocale())) }}">
            <img src="{{ asset('storage/images/logoB2.png') }}" style="width: 250px; height: auto;" alt="Logo">
        </a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex justify-content-center align-items-center">
                @guest
                    <li class="nav-item d-none d-lg-block">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('storage/images/logoB2.png') }}" style="width: 250px; height: auto;" alt="Logo">
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url(app()->getLocale() . '/user/equipo') }}" class="nav-link">@lang('nabvar.sobreNosotros')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center" href="#" id="projectsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('nabvar.proyectos') @endlang
                        </a>
                        <div class="dropdown-menu custom-dropdown" aria-labelledby="projectsDropdown">
                            <a class="dropdown-item" href="{{ url(app()->getLocale().'/user/proyectos') }}">@lang('nabvar.todos') @endlang</a>
                            <div class="dropdown-divider"></div>
                            @foreach($projects as $project)
                                <a class="dropdown-item" href="{{ url(app()->getLocale().'/user/proyectos/'.$project->slug) }}" style="white-space: normal;">@lang($project->name)</a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('user.students.create', ['locale' => app()->getLocale()]) }}">
                                @lang('nabvar.inscripcion')
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url(app()->getLocale() . '/contacto') }}" class="nav-link">@lang('nabvar.contacto')</a>
                    </li>


                @else
                    <!-- Si el usuario se ha registrado y ha iniciado sesión como administrador -->
                    @if(Auth::guard('admin')->check())
                        <li class="nav-item d-none d-lg-block">
                            <a class="navbar-brand" href="{{ route('admin.dashboard', app()->getLocale()) }}">
                                <img src="{{ asset('storage/images/logoB2.png') }}" style="width: 250px; height: auto;" alt="Logo">
                            </a>
                        </li>

                        <!-- Resto del menú para administradores -->
                        <li class="nav-item">
                            <a href="{{ url(app()->getLocale().'/projects') }}" class="nav-link">@lang('nabvar.adminProyects')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url(app()->getLocale() . '/teams') }}" class="nav-link">@lang('nabvar.adminTeam')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url(app()->getLocale() . '/alumnos') }}" class="nav-link">@lang('nabvar.pupils')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url(app()->getLocale() . '/solicitudes') }}" class="nav-link">@lang('nabvar.solicitudes')</a>
                        </li>
                    @else
                        <li class="nav-item d-none d-lg-block">
                            <a class="navbar-brand" href="{{ route('main.index', app()->getLocale()) }}">
                                <img src="{{ asset('storage/images/logoB2.png') }}" style="width: 250px; height: auto;" alt="Logo">
                            </a>
                        </li>

                        <!-- Resto del menú para usuarios logueados -->
                        <li class="nav-item">
                            <a href="{{ route('user.teams', app()->getLocale()) }}" class="nav-link">@lang('nabvar.sobreNosotros')</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-center" href="#" id="projectsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('nabvar.proyectos') @endlang
                            </a>
                            <div class="dropdown-menu custom-dropdown " aria-labelledby="projectsDropdown" style="min-width: 0;">
                                <a class="dropdown-item" href="{{ url(app()->getLocale().'/user/proyectos') }}" style="white-space: normal;">@lang('nabvar.todos') @endlang</a>
                                <div class="dropdown-divider"></div>
                                @foreach($projects as $project)
                                    <a class="dropdown-item" href="{{ url(app()->getLocale().'/user/proyectos/'.$project->slug) }}" style="white-space: normal;">@lang($project->name)</a>
                                @endforeach
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('user.students.create', ['locale' => app()->getLocale()]) }}" style="white-space: normal;">
                                    @lang('nabvar.inscripcion')
                                </a>
                                <a class="dropdown-item" href="{{ url(app()->getLocale() . '/mis-proyectos') }}" style="white-space: normal;">@lang('nabvar.misProyectos')</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ilseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('nabvar.solicitudes')
                            </a>
                            <div class="dropdown-menu text-center" aria-labelledby="ilseDropdown">
                                <a class="dropdown-item" href="{{ url(app()->getLocale() . '/user/solicitar-interprete') }}">@lang('nabvar.solicitarInterprete') @endlang</a>
                                <a class="dropdown-item" href="{{ url(app()->getLocale() . '/user/mis-solicitudes') }}">@lang('nabvar.misSolicitudes') @endlang</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url(app()->getLocale() . '/contacto') }}" class="nav-link">@lang('nabvar.contacto')</a>
                        </li>

                    @endif
                @endguest
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item text-center" >
                        <a class="nav-link" href="{{ url(app()->getLocale().'/login') }}">
                            @lang('nabvar.login')
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item text-center">
                            <a class="nav-link" href="{{ url(app()->getLocale().'/register') }}">
                                @lang('nabvar.registro')
                            </a>
                        </li>
                    @endif
                @else
                    @if(Auth::guard('admin')->check())
                        <li class="nav-item dropdown text-center">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
               document.getElementById('admin-logout-form').submit();">
                                    @lang('nabvar.logout') @endlang
                                </a>

                                <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown text-center">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    @lang('nabvar.logout') @endlang
                                </a>

                                <form id="logout-form" action="{{ url('{locale}/logout') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                @endguest
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ app()->getLocale() == 'es' ? 'Español' : 'English' }}
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item " href="{{ url(preg_replace('/\b(es|en)\b(?![\w-])/', app()->getLocale() == 'es' ? 'en' : 'es', request()->getRequestUri())) }}">
                                {{ app()->getLocale() == 'es' ? 'English' : 'Español' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>
