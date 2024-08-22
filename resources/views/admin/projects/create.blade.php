@extends('layouts.app')

@section('content')
    <div class="map_section">
        <div class="container">
            <h1>@lang('proyectos.crear')</h1>
            <form action="{{ route('admin.projects.store', app()->getLocale()) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">@lang('proyectos.nombre')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">@lang('proyectos.descripcion')</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                              name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="team_description">@lang('proyectos.equipo')</label>
                    <textarea class="form-control @error('team_description') is-invalid @enderror" id="team_description"
                              name="team_description">{{ old('team_description') }}</textarea>
                    @error('team_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="objectives">@lang('proyectos.objetivos')</label>
                    <textarea class="form-control @error('objectives') is-invalid @enderror" id="objectives"
                              name="objectives">{{ old('objectives') }}</textarea>
                    @error('objectives')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="destination">@lang('proyectos.informacion')</label>
                    <textarea class="form-control @error('destination') is-invalid @enderror" id="destination"
                              name="destination">{{ old('destination') }}</textarea>
                    @error('destination')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">@lang('proyectos.foto'):</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                           name="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">@lang('proyectos.crear')</button>
            </form>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
