@extends('layouts.app')

@section('content')
    @include('components.Carrousel')
    @include('components.SobreNosotros.SobreNosotros')
    @include('components.Proyectos.Proyectos', ['projects' => App\Models\Project::all()])
    @include('components.SobreNosotros.Equipo', ['teams' => App\Models\Team::all()])
    @include('components.Conctactanos')
    @include('components.Info')
    @include('components.Footer')
@endsection
