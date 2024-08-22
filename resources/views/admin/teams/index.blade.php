@extends('layouts.app')

@section('content')
    <div class="content-tablas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between mb-3">
                        <h2>@lang('sobreNosotros.admin_equipo') </h2>
                        <a href="{{ route('admin.teams.create', ['locale' => app()->getLocale()]) }}" class="btn btn-light">@lang('sobreNosotros.añadir') </a>

                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <form action="{{ route('admin.teams.index', ['locale' => app()->getLocale()]) }}" method="get" class="form-inline">
                        <label for="teamType" class="mr-2">Selecciona:</label>
                            <select class="form-control" name="teamType" onchange="this.form.submit()">
                                <option value="">@lang('sobreNosotros.seleccionar')</option>
                                @if ($teamType == '')
                                    <option value="directors" selected>@lang('sobreNosotros.junta_directiva')</option>
                                @else
                                    <option value="directors">@lang('sobreNosotros.junta_directiva')</option>
                                @endif
                                @if ($teamType == 'non_directors')
                                    <option value="non_directors" selected>@lang('sobreNosotros.equipo')</option>
                                @else
                                    <option value="non_directors">@lang('sobreNosotros.equipo')</option>
                                @endif
                            </select>

                            <button type="submit" class="btn btn-outline-dark ml-2">@lang('sobreNosotros.mostrar')</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="d-none d-lg-table-cell">ID</th>
                                <th class="d-none d-lg-table-cell">@lang('sobreNosotros.nombre')</th>
                                <th class="d-none d-lg-table-cell">@lang('sobreNosotros.posicion')</th>
                                <th class="d-none d-lg-table-cell">@lang('sobreNosotros.descripcion')</th>
                                <th class="d-none d-lg-table-cell">@lang('sobreNosotros.foto')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td class="d-none d-lg-table-cell">{{ $team->id }}</td>
                                    <td>{{ __($team->name) }}</td>
                                    <td class="d-none d-lg-table-cell">
                                        @if ($team->is_director)
                                            {{ __($team->director_position) }}
                                        @else
                                            {{ __($team->position) }}
                                        @endif
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        @if ($team->is_director)
                                            {{ __($team->director_description) }}
                                        @else
                                            {{ __($team->description) }}
                                        @endif
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        <img src="{{ asset('storage/images/' . basename($team->image)) }}"
                                             alt="{{ $team->name }}" width="100px">
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical" role="group">
                                            <a href="{{ route('admin.teams.show', ['locale' => app()->getLocale(), 'slug' => $team->slug]) }}"
                                               class="btn btn-info">@lang('sobreNosotros.ver')</a>

                                            <a href="{{ route('admin.teams.edit', ['locale' => app()->getLocale(), 'team' => $team->id]) }}" class="btn btn-dark">@lang('sobreNosotros.editar')</a>

                                            <form action="{{ route('admin.teams.destroy', ['locale' => app()->getLocale(), 'team' => $team->id]) }}"
                                                  method="post" class="d-inline">

                                            @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this team?')">@lang('sobreNosotros.eliminar')
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>ID:</strong> {{ $team->id }}</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('sobreNosotros.nombre')</strong> {{ __($team->name) }}</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('sobreNosotros.posicion')</strong>
                                        @if ($team->is_director)
                                            {{ __($team->director_position) }}
                                        @else
                                            {{ __($team->position) }}
                                        @endif
                                    </td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('sobreNosotros.descripcion')</strong>
                                        @if ($team->is_director)
                                            {{ __($team->director_description) }}
                                        @else
                                            {{ __($team->description) }}
                                        @endif
                                    </td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('sobreNosotros.foto'):</strong><br><img
                                            src="{{ asset('storage/images/' . basename($team->image)) }}"
                                            alt="{{ $team->name }}" width="100px"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
