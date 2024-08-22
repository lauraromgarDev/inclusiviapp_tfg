@extends('layouts.app')

@section('content')
    <div class="map_section">
    <div class="container">
    <h2>@lang('sobreNosotros.create_miembro')</h2>

        <form action="{{ route('admin.teams.store', ['locale' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">@lang('sobreNosotros.nombre')</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_director" name="is_director" {{ old('is_director') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_director">@lang('sobreNosotros.is_director')</label>
        </div>

        <div class="form-group">
            <label for="director_position">@lang('sobreNosotros.dir_pos')</label>
            <input type="text" class="form-control @error('director_position') is-invalid @enderror" id="director_position" name="director_position" value="{{ old('director_position') }}">
            @error('director_position')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="director_description">@lang('sobreNosotros.dir_desc')</label>
            <textarea class="form-control @error('director_description') is-invalid @enderror" id="director_description" name="director_description">{{ old('director_description') }}</textarea>
            @error('director_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="position">@lang('sobreNosotros.pos')</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}">
            @error('position')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">@lang('sobreNosotros.desc')</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">@lang('sobreNosotros.foto')</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_id">@lang('sobreNosotros.project')</label>
            <select class="form-control @error('project_id') is-invalid @enderror" id="project_id" name="project_id">
                <option value="">@lang('sobreNosotros.select_project')</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>@lang($project->name)</option>
                @endforeach
            </select>
            @error('project_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">@lang('sobreNosotros.añadir')</button>
    </form>
    </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/is_director.js') }}"></script>
@endsection
