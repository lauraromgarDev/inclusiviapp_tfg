@extends('layouts.app')

@section('content')
    <div class="content-form">
    <div class="form_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <h1>@lang('alumnos.editar_alumno')</h1>

        @if (Session::has('message_sent'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message_sent') }}
            </div>
        @endif

                <form action="{{ route('admin.students.update', ['locale' => app()->getLocale(), 'student' => $student->id]) }}" method="POST">
                @csrf
            @method('PUT')
                    <div class="form-group">
                        <label for="nombre">@lang('alumnos.nombre'):</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $student->nombre) }}" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                <label for="apellidos">@lang('alumnos.apellido'):</label>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos', $student->apellidos) }}" required>
                @error('apellidos')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="edad">@lang('alumnos.edad'):</label>
                <input type="number" class="form-control @error('edad') is-invalid @enderror" id="edad" name="edad" value="{{ old('edad', $student->edad) }}" required>
                @error('edad')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>@lang('alumnos.selecciona'):</label>
                <div>
                    <label>
                        <input type="radio" name="es_socio" value="1" {{ old('es_socio', $student->es_socio) == 1 ? 'checked' : '' }}> @lang('alumnos.soy_socio')
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="es_socio" value="0" {{ old('es_socio', $student->es_socio) == 0 ? 'checked' : '' }}> @lang('alumnos.no_soy_socio')
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="project_id">@lang('alumnos.selec')</label>
                <select class="form-control @error('project_id') is-invalid @enderror" id="project_id" name="project_id" required>
                    <option value="">@lang('alumnos.selec')</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $student->project_id) == $project->id ? 'selected' : '' }}>@lang($project->name)</option>
                    @endforeach
                </select>
                @error('project_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>@lang('alumnos.seleccionar'):</label>
                <div>
                    <label>
                        <input type="radio" name="diversidad_funcional" value="true" {{ old('diversidad_funcional', $student->diversidad_funcional) == 'true' ? 'checked' : '' }}> Soy una persona con diversidad funcional
                    </label>
                    <br>
                    <label for="diversidad_desc">@lang('alumnos.mi_div'):</label>
                    <input type="text" class="form-control" id="diversidad_descripcion" name="diversidad_descripcion" value="{{ old('diversidad_descripcion', $student->diversidad_descripcion) }}">
                </div>
                <div>
                    <label>
                        <input type="radio" name="diversidad_funcional" value="false" {{ old('diversidad_funcional', $student->diversidad_funcional) == 'false' ? 'checked' : '' }}> Soy una persona sin diversidad funcional
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="email">@lang('alumnos.email'):</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="telefono">@lang('alumnos.telefono'):</label>
                <input type="tel" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono', $student->telefono) }}" required>
                @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">@lang('alumnos.actualizar')</button>

        </form>
            </div>
        </div>
    </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection


