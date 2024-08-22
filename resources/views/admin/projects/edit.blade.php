@extends('layouts.app')

@section('content')
    <div class="content-form">
        <div class="form_container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>@lang('proyectos.editar_proyecto')</h2>
                    <form method="POST" action="{{ route('admin.projects.update', ['locale' => app()->getLocale(), 'id' => $project->id]) }}"
                    enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">@lang('proyectos.nombre')</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ old('name', $project->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">@lang('proyectos.descripcion')</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                      name="description">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="team_description">@lang('proyectos.equipo')</label>
                            <textarea class="form-control @error('team_description') is-invalid @enderror"
                                      id="team_description"
                                      name="team_description">{{ old('team_description', $project->team_description) }}</textarea>
                            @error('team_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="objectives">@lang('proyectos.objetivos')</label>
                            <textarea class="form-control @error('objectives') is-invalid @enderror" id="objectives"
                                      name="objectives">{{ old('objectives', $project->objectives) }}</textarea>
                            @error('objectives')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="destination">@lang('proyectos.informacion')</label>
                            <textarea class="form-control @error('destination') is-invalid @enderror" id="destination"
                                      name="destination">{{ old('destination', $project->destination ) }}</textarea>
                            @error('destination')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">@lang('proyectos.foto')</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                                   name="image">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('proyectos.actualizar')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
