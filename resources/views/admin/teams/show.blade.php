@extends('layouts.app')

@section('content')
    <div class="info-content">
        <div class="container-card">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('images/' . basename($team->image)) }}" alt="{{ $team->name }}" width="100%">
                </div>
                <div class="col-lg-6">
                    <h1>{{ __($team->name) }}</h1>
                    <h2>{{ __($team->position) }}</h2>
                    <h3>{{ __($team->director_position) }}</h3>
                    <p>{{__($team->director_description)}}</p>
                    <p>{{ __($team->description) }}</p>
                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection
