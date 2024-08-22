@extends('layouts.app')

@section('content')
    <div class="content-tablas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between mb-3">
                        <h2>@lang('proyectos.titulo')</h2>
                        <a href="{{ route('admin.projects.create', app()->getLocale()) }}" class="btn btn-light">@lang('proyectos.crear')</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <div class="table-responsive ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="d-none d-lg-table-cell">ID</th>
                                <th class="d-none d-lg-table-cell">@lang('proyectos.foto')</th>
                                <th class="d-none d-lg-table-cell">@lang('proyectos.nombre')</th>
                                <th class="d-none d-lg-table-cell">@lang('proyectos.descripcion')</th>
                                <th class="d-none d-lg-table-cell">@lang('proyectos.equipo')</th>
                                <th class="d-none d-lg-table-cell">@lang('proyectos.objetivos')</th>
                                <th class="d-none d-lg-table-cell">@lang('proyectos.informacion')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="d-none d-lg-table-cell">{{ $project->id }}</td>
{{--                                    <td class="d-none d-lg-table-cell"><img--}}
{{--                                            src="{{ asset('storage/images/' . basename($project->image)) }}"--}}
{{--                                            alt="{{ $project->name }}" width="100px">--}}
{{--                                    </td>--}}
                                    <td class="d-none d-lg-table-cell">
                                        <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->name }}" width="100px">                                </td>
                                    <td>@lang($project->name)</td>
                                    <td class="d-none d-lg-table-cell">@lang($project->description)</td>
                                    <td class="d-none d-lg-table-cell">@lang($project->team_description)</td>
                                    <td class="d-none d-lg-table-cell">@lang($project->objectives)</td>
                                    <td class="d-none d-lg-table-cell">@lang($project->destination)</td>
                                    <td>
                                        <div class="btn-group-vertical" role="group">
                                            <a href="{{ route('admin.projects.show', ['locale' => app()->getLocale(), 'project' => $project->slug]) }}"
                                               class="btn btn-info">@lang('proyectos.ver')</a>
                                            <a href="{{ route('admin.projects.edit', ['locale' => app()->getLocale(), 'id' => $project->id]) }}"
                                               class="btn btn-dark">@lang('proyectos.editar')</a>
                                            <form action="{{ route('admin.projects.destroy', ['locale' => app()->getLocale(), 'project' => $project->id]) }}"
                                                  method="POST" style="display: inline-block;" id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proyecto?')">@lang('proyectos.eliminar')</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>ID:</strong> {{ $project->id }}</td>
                                </tr>
                                <tr class="d-lg-none">
{{--                                    <td colspan="2"><strong>@lang('proyectos.foto'):</strong><br><img--}}
{{--                                            src="{{ asset('storage/images/' . basename($project->image)) }}"--}}
{{--                                            alt="{{ $project->name }}" width="100px">--}}
{{--                                    </td>--}}
                                    <td colspan="2">
                                        <strong>@lang('proyectos.foto'):</strong><br>
                                        <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->name }}" width="100px">
                                    </td>

                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('proyectos.descripcion')</strong> @lang($project->description)</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('proyectos.equipo'):</strong> @lang($project->team_description)</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('proyectos.objetivos'):</strong> @lang($project->objectives)</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('proyectos.informacion'):</strong> @lang($project->destination)</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $projects->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
