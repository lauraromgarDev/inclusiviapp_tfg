@extends('layouts.app')

@section('content')
    <div class="content-form">
        <div class="form_container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>Edit team</h2>
                    <form method="POST" action="{{ route('admin.teams.update', ['locale' => app()->getLocale(), 'team' => $team]) }}"
                    enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ old('name', isset($team) ? $team->name : '') }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_director"
                                   name="is_director" {{ old('is_director') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_director">Is director</label>
                        </div>

                        <div class="form-group">
                            <label for="director_position">Director Position:</label>
                            <input type="text" class="form-control @error('director_position') is-invalid @enderror"
                                   id="director_position" name="director_position"
                                   value="{{ old('director_position', isset($team) ? $team->director_position : '') }}">
                            @error('director_position')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="director_description">Director Description:</label>
                            <textarea class="form-control @error('director_description') is-invalid @enderror"
                                      id="director_description"
                                      name="director_description">{{ old('director_description', isset($team) ? $team->director_description : '') }}</textarea>
                            @error('director_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror"
                                   id="position" name="position"
                                   value="{{ old('position', isset($team) ? $team->position : '') }}">
                            @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                      name="description">{{ old('description', isset($team) ? $team->description : '') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                                   name="image">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="project_id">Project:</label>
                            <select class="form-control @error('project_id') is-invalid @enderror" id="project_id"
                                    name="project_id">
                                <option value="">@lang('sobreNosotros.select_project')</option>
                                @foreach($projects as $project)
                                    <option
                                        value="{{ $project->id }}" {{ old('project_id', isset($team) ? $team->project_id : '') == $project->id ? 'selected' : '' }}>@lang($project->name)</option>
                                @endforeach
                            </select>
                            @error('project_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/is_director.js') }}"></script>
@endsection
