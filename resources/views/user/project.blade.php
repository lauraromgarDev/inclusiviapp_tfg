@extends('layouts.app')

@section('content')
    @include('components.Proyectos.Proyecto', ['project' => $project])
    @include('components.Info')
    @include('components.Footer')
@endsection
+
