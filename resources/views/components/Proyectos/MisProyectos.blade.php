@extends('layouts.app')

@section('content')
    <div class="info-content">
        <div class="container-card">
            <div class="container">
                <div class="text">
                    <h2 class="custom_heading">
                        @lang('proyectos.mis') <span>@lang('proyectos.proyectos')</span>
                    </h2>
                </div>
                <div class="row">
                    @if ($estudiantes->count() > 0)
                        @foreach ($estudiantes as $estudiante)
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="{{ asset('images/' . ($estudiante->project->image)) }}" alt="{{$estudiante->project->name}}"  class="card-img">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang($estudiante->project->name)</h5>
                                                <p class="card-text">@lang($estudiante->project->destination) </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No estás inscrito en ningún proyecto.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
