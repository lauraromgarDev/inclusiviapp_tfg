<section class="map_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10">
                <div class="text-center">
                    <h2 class="custom_heading">
                        @lang('proyectos.formulario')<span>@lang('proyectos.inscripcion')</span>
                    </h2>
                </div>
                @if (Session::has('message_sent'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif

                <div class="form_container">
                    <form action="{{ route('students.store', ['locale' => app()->getLocale()]) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nombre">@lang('proyectos.nombre')</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" >
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="apellidos">@lang('proyectos.apellidos')</label>
                        <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" >
                        @error('apellidos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="edad">@lang('proyectos.edad')</label>
                        <input type="number" class="form-control @error('edad') is-invalid @enderror" id="edad" name="edad" value="{{ old('edad') }}" >
                        @error('edad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>@lang('proyectos.selecciona')</label>
                        <div class="row">
                            <div class="col">
                                <label>
                                    <input type="radio" name="es_socio" value="1"> @lang('proyectos.soy_socia')
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>
                                    <input type="radio" name="es_socio" value="0"> @lang('proyectos.no_soy_socia')
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="project_id">@lang('proyectos.selecciona_proyecto')</label>
                        <select class="form-control @error('project_id') is-invalid @enderror" id="project_id" name="project_id" >
                            <option value="">@lang('proyectos.selecciona_proyecto')</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">@lang($project->name)</option>
                            @endforeach
                        </select>
                        @error('project_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>@lang('proyectos.selecciona')</label>
                        <div>
                            <label>
                                <input type="radio" name="diversidad_funcional" value="true"> @lang('proyectos.soy')
                            </label>
                            <br>
                            <label for="diversidad_desc">@lang('proyectos.mi_div')</label>
                            <input type="text" class="form-control" id="diversidad_descripcion" name="diversidad_descripcion" value="{{ old('diversidad_desc') }}">
                        </div>
                        <div>
                            <label>
                                <input type="radio" name="diversidad_funcional" value="false"> @lang('proyectos.no_soy')
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">@lang('proyectos.correo')</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" >
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telefono">@lang('proyectos.telefono')</label>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" >
                        @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('proyectos.enviar')</button>

                </form>
                </div>
            </div>
        </div>
    </div>
</section>
