@extends('layouts.app')

@section('content')
    <div class="info-content">
        <div class="container">
            <div class="card-header">
                <b>@lang('interpreters.detalles')</b>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title"><strong>@lang('interpreters.solicitante'):</strong> {{ $request->user->name }}</p>
                    <p class="card-text"><strong>@lang('interpreters.interprete'):</strong> {{ $request->interpreter->interpreter_name }}</p>
                    <p class="card-text"><strong>@lang('interpreters.fecha_solicitud'):</strong> {{ $request->request_date }}</p>
                    <p class="card-text"><strong>@lang('interpreters.mensaje'):</strong> {{ $request->request_message }}</p>
                    <p class="card-text"><strong>@lang('interpreters.servicio'):</strong> {{ $request->service }}</p>
                    <p class="card-text"><strong>@lang('interpreters.estado'):</strong> {{ $request->status }}</p>
                    <a href="{{ route('admin.requests.edit', ['locale' => app()->getLocale(), 'id' => $request->id]) }}" class="btn btn-dark">@lang('interpreters.editar')</a>
                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection

