<!-- info section -->
<section class="info_section">
    <div class="container">
        <div class="info_items">
            <div class="item">
                <div class="detail-box">
                    <p>
                        <img src="{{ asset('images/logoB2.png') }}" style="width: 250px; height: auto;" alt="Logo">
                    </p>

                </div>
            </div>
            <div class="item">
                <div class="detail-box">
                    <ul>
                        <li>
                            <a href="{{ url(app()->getLocale().'/user/proyectos') }}">
                                @lang('nabvar.proyectos')
                            </a>
                        </li>

                        <li>
                            <a href="{{ url(app()->getLocale() . '/user/solicitar-interprete') }}">
                                @lang('nabvar.servicio_ilse_gilse')
                            </a>
                        </li>
                        <li>
                            <a href="{{ url(app()->getLocale() . '/acerca-de') }}">
                                @lang('nabvar.acerca')
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="item">
                <div class="detail-box">
                    <ul>
                        <li>
                            608853345
                        </li>
                        <li>
                            <a href="https://www.inclusivosydiversos.org/" target="_blank">www.inclusivosydiversos.org</a>
                        </li>

                        <li>
                            C/ San Juan de Dios, 1, Córdoba.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
