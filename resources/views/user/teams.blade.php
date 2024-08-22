@extends('layouts.app')

@section('content')
        @include('components.SobreNosotros.SobreNosotros')
        @include('components.SobreNosotros.nuestraIdentidad')
        @include('components.SobreNosotros.MisionEticaValores')
        @include('components.SobreNosotros.Equipo', ['teams' => App\Models\Team::all()])
        @include('components.Conctactanos')
        @include('components.Info')
        @include('components.Footer')
@endsection
