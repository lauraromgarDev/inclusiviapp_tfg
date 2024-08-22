@extends('layouts.app')

@section('content')
    @include('components.Proyectos.Proyectos', ['projects' => $projects])
    @include('components.Info')
    @include('components.Footer')
@endsection
