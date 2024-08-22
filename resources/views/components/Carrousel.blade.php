<!-- slider section -->
<section class=" slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <div class="slider_detail-box">
                                <h1>
                                    inlusiviApp
                                    <span>
                    @lang('sobreNosotros.quienesSomos')
                </span>
                                </h1>
                                <p>
                                    @lang('sobreNosotros.defMision')
                                </p>
                                <div class="btn-box">
                                    <a href="{{ route('user.teams', app()->getLocale()) }}" class="btn-2">@lang('nabvar.sobreNosotros')</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="slider_img-box">
                                <img src="{{ asset('storage/images/3.svg') }}" alt="picture">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <div class="slider_detail-box">
                                <h1>
                                    InclusiviApp
                                    <span>
                        @lang('proyectos.descubre')
                      </span>
                                </h1>
                                <ul>
                                    <li> @lang('proyectos.musicoterapia')</li>
                                    <li> @lang('proyectos.teatro_inclusivo')</li>
                                    <li> @lang('proyectos.escuela_lengua_signos')</li>
                                    <li> @lang('proyectos.escuela_accesibilidad')</li>
                                    <li> @lang('proyectos.ocio_inclusivo')</li>
                                </ul>

                                <div class="btn-box">
                                    <a href="{{ route('user.projects', app()->getLocale()) }}" class="btn-1">
                                        @lang('proyectos.descubrir')
                                    </a>

                                    <a href="{{ route('user.students.create', ['locale' => app()->getLocale()]) }}" class="btn-2">
                                        @lang('proyectos.inscribirse')
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="slider_img-box">
                                <img src="{{ asset('storage/images/havingfun.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <div class="slider_detail-box">
                                <h1>
                                    InclusiviApp
                                    <span>
                        @lang('interpreters.titulo')
                      </span>
                                </h1>
                                <p>
                                    @lang('interpreters.info')
                                </p>
                                <div class="btn-box">
                                    <a href="{{ Auth::check() ? url(app()->getLocale() . '/user/solicitar-interprete') : url(app()->getLocale() . '/login') }}" class="btn-1">
                                        @lang('interpreters.solicita')
                                    </a>

                                    <a href="{{ url(app()->getLocale().'/register') }}" class="btn-2">
                                        @lang('interpreters.hacerse_socio')
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="slider_img-box">
                                <img src="{{ asset('storage/images/2.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end slider section -->

