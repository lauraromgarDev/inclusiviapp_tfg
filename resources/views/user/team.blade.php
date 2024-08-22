@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$team->name}}</h1>
        <p>{{ $team->description }}</p>
    </div>
@endsection
