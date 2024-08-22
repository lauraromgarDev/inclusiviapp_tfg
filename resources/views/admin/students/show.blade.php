@extends('layouts.app')

@section('content')
    <div class="info-content">
    <div class="container">
        <h1>@lang('alumnos.detalles')</h1>

        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $student->nombre }} {{ $student->apellidos }}</p>
                <p class="card-text"><b>@lang('alumnos.edad'):</b> {{ $student->edad }}</p>
                <p class="card-text"><b>@lang('alumnos.es_socio'):</b> {{ $student->es_socio ? 'Sí' : 'No' }}</p>
                <p class="card-text"><b>@lang('alumnos.proyecto'):</b> {{ $student->project->name }}</p>
                <p class="card-text"><b>@lang('alumnos.diversidad_funcional'):</b> {{ $student->diversidad_funcional ? 'Sí' : 'No' }}</p>
                @if($student->diversidad_funcional)
                    <p class="card-text"><b>@lang('alumnos.desc_div'):</b> {{ $student->diversidad_descripcion }}</p>
                @endif
                <p class="card-text"><b>@lang('alumnos.email'):</b> {{ $student->email }}</p>
                <p class="card-text"><b>@lang('alumnos.telefono'):</b> {{ $student->telefono }}</p>
                <a href="{{ route('admin.students.edit', ['locale' => app()->getLocale(), 'student' => $student->id]) }}" class="btn btn-dark"><b>@lang('alumnos.editar')</b></a>
            </div>

        </div>
    </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
