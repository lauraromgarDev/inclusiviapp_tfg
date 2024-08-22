<section class="map_section">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10">
                <div class="text-center">
                    <h2 class="custom_heading">
                        @lang('interpreters.solicita')  <span> @lang('interpreters.tu_interprete')</span>
                    </h2>
                </div>
                @if (Session::has('message_sent'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif
                <form action="{{ route('requests.store', app()->getLocale()) }}" method="POST">

                    @csrf

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <label for="requester_name">@lang('interpreters.nombre_solicitante')</label>
                        <input type="text" class="form-control" id="requester_name" name="requester_name" value="{{ Auth::user()->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="request_date">@lang('interpreters.fecha')</label>
                        <input type="datetime-local" class="form-control @error('request_date') is-invalid @enderror" id="request_date"
                               name="request_date" value="{{ old('request_date') }}" required>
                        @error('request_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="request_message">@lang('interpreters.mensaje')</label>
                        <textarea class="form-control @error('request_message') is-invalid @enderror" id="request_message" name="request_message" rows="5" required>{{ old('request_message') }}</textarea>
                        @error('request_message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="service">@lang('interpreters.servicio'):</label>
                        <select class="form-control @error('service') is-invalid @enderror" id="service" name="service" required>
                            <option value="" disabled selected>Seleccione su servicio</option>
                            <option value="ilse">ILSE</option>
                            <option value="gilse">GILSE</option>
                        </select>
                        @error('service')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="interpreter_id">@lang('interpreters.select_interpreter')</label>
                        <select class="form-control @error('interpreter_id') is-invalid @enderror" id="interpreter_id" name="interpreter_id" required data-selected="{{ old('interpreter_id') }}">
                            <option value="">Seleccionar intérprete</option>
                        </select>
                        @error('interpreter_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('interpreters.email')</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telefono">@lang('interpreters.telefono')</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                        @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('interpreters.enviar')</button>
                </form>
            </div>
        </div>
    </div>
</section>
