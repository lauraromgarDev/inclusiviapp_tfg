@extends('layouts.app')

@section ('content')
    <section class="map_section">
    <div class="container">
        <h1>Solicitud de Citas</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.requests.update', ['locale' => app()->getLocale(), 'id' => $request->id]) }}" method="POST">

            @csrf

            @method('PUT')

            <input type="hidden" name="original_user_id" value="{{ $request->user_id }}">

            <div class="form-group">
                <label for="requester_name">Nombre del solicitante:</label>
                <input type="text" class="form-control" id="requester_name" name="requester_name" value="{{ $request->requester_name }}" readonly>
            </div>

            <div class="form-group">
                <label for="request_date">Fecha de la solicitud:</label>
                <input type="datetime-local" class="form-control @error('request_date') is-invalid @enderror" id="request_date" name="request_date" value="{{ old('request_date', $request->request_date) }}" required >
                @error('request_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="request_message">Mensaje de la solicitud:</label>
                <textarea class="form-control @error('request_message') is-invalid @enderror" id="request_message" name="request_message" rows="5" required>{{ old('request_message', $request->request_message) }}</textarea>
                @error('request_message')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="service">Servicio:</label>
                <select class="form-control @error('service') is-invalid @enderror" id="service" name="service" required >
                    <option value="" disabled selected>Seleccione su servicio</option>
                    <option value="ilse" {{ old('service', $request->service) === 'ilse' ? 'selected' : '' }}>ILSE</option>
                    <option value="gilse" {{ old('service', $request->service) === 'gilse' ? 'selected' : '' }}>GILSE</option>
                </select>
                @error('service')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="interpreter_id">Selecciona un intérprete:</label>--}}
{{--                <select class="form-control @error('interpreter_id') is-invalid @enderror" id="interpreter_id" name="interpreter_id" required>--}}
{{--                    <option value="">Seleccionar intérprete</option>--}}
{{--                </select>--}}
{{--                @error('interpreter_id')--}}
{{--                <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="interpreter_id">Selecciona un intérprete:</label>
                <select class="form-control @error('interpreter_id') is-invalid @enderror" id="interpreter_id" name="interpreter_id" required data-selected="{{ $selectedInterpreter }}">
                    <option value="">Seleccionar intérprete</option>
                    @foreach ($interpreters as $interpreter)
                        <option value="{{ $interpreter->id }}" {{ old('interpreter_id', $request->interpreter_id) == $interpreter->id ? 'selected' : '' }}>
                            {{ $interpreter->interpreter_name }}
                        </option>
                    @endforeach
                </select>
                @error('interpreter_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="request_status">Estado de la solicitud:</label>
                <select class="form-control @error('request_status') is-invalid @enderror" id="request_status" name="request_status" required>
                    <option value="" disabled selected>Seleccione el estado de la solicitud</option>
                    <option value="pendiente" {{ old('request_status', $request->status) === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptada" {{ old('request_status', $request->status) === 'aceptada' ? 'selected' : '' }}>Aceptada</option>
                    <option value="rechazada" {{ old('request_status', $request->status) === 'rechazada' ? 'selected' : '' }}>Rechazada</option>
                </select>
                @error('request_status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar </button>
        </form>
    </div>
    </section>
    @include('components.Info')
    @include('components.Footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/ilse_gilse_requests.js') }}"></script>
@endsection
