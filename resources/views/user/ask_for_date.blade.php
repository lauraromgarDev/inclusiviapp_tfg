@extends('layouts.app')

@section('content')
    @include('components.solicitarInterprete')
    @include('components.Info')
    @include('components.Footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/ilse_gilse_requests.js') }}"></script>
@endsection


