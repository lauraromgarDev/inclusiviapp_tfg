@extends('layouts.app')

@section('content')
    <div class="content-tablas">
        <div class="container">
            <h1>@lang('alumnos.lista') </h1>

            <form action="{{ route('admin.students.index', app()->getLocale()) }}" method="GET" class="mb-3">
            <div class="form-group">
                    <label for="project_id">@lang('alumnos.selec')</label>
                    <select class="form-control" id="project_id" name="project_id">
                        <option value="">@lang('alumnos.todos')</option>
                        @foreach($projects as $projectId => $projectName)
                            <option value="{{ $projectId }}" {{ $projectId == $selectedProjectId ? 'selected' : '' }}>
                                {{ __($projectName) }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-dark">@lang('alumnos.mostrar')</button>
            </form>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>@lang('alumnos.nombre')</th>
                    <th>@lang('alumnos.proyecto')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->nombre }} {{ $student->apellidos }}</td>
{{--                        <td>{{($student->project)->name }}</td>--}}
                        <td>{{ __($student->project->name) }}</td>



                        <td>
                            <a href="{{ route('admin.students.show', ['locale' => app()->getLocale(), 'id' => $student->id]) }}" class="btn btn-info">@lang('alumnos.ver')</a>
                            <a href="{{ route('admin.students.edit', ['locale' => app()->getLocale(), 'student' => $student->id]) }}" class="btn btn-dark">@lang('alumnos.editar')</a>


                            <form action="{{ route('admin.students.destroy', ['locale' => app()->getLocale(), 'student' => $student->id]) }}" method="POST" style="display: inline-block;">

                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">@lang('alumnos.eliminar')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $students->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
