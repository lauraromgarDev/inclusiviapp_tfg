@extends('layouts.app')

@section('content')
    <div class="map_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('auth.register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register.submit', app()->getLocale()) }}">
                            @csrf

                                {{-- name --}}
                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="surname"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.apellidos') }}</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text"
                                               class="form-control @error('surname') is-invalid @enderror"
                                               name="surname" value="{{ old('surname') }}" required
                                               autocomplete="surname" autofocus>

                                        @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                        surname--}}
                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.usuario') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username" value="{{ old('username') }}" required
                                               autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                {{--                        username--}}

                                {{--                        email--}}
                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- password --}}
                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- password confirmation --}}
                                <div class="row mb-3">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.confirmar_contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                {{-- phone --}}
                                <div class="row mb-3">
                                    <label for="phone_number"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.telefono') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text"
                                               class="form-control @error('phone_number') is-invalid @enderror"
                                               name="phone_number" value="{{ old('phone_number') }}" required
                                               autocomplete="phone_number" autofocus>

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                         address --}}
                                <div class="row mb-3">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.direccion') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                               class="form-control @error('address') is-invalid @enderror"
                                               name="address" value="{{ old('address') }}" required
                                               autocomplete="address" autofocus>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                             city --}}
                                <div class="row mb-3">
                                    <label for="city"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.ciudad') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text"
                                               class="form-control @error('city') is-invalid @enderror" name="city"
                                               value="{{ old('city') }}" required autocomplete="city" autofocus>

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                         country --}}
                                <div class="row mb-3">
                                    <label for="country"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.pais') }}</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text"
                                               class="form-control @error('country') is-invalid @enderror"
                                               name="country" value="{{ old('country') }}" required
                                               autocomplete="country" autofocus>

                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                         postal code --}}
                                <div class="row mb-3">
                                    <label for="postal_code"
                                           class="col-md-4 col-form-label text-md-end">{{ __('auth.codigo_postal') }}</label>

                                    <div class="col-md-6">
                                        <input id="postal_code" type="text"
                                               class="form-control @error('postal_code') is-invalid @enderror"
                                               name="postal_code" value="{{ old('postal_code') }}" required
                                               autocomplete="postal_code" autofocus>

                                        @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
{{--                                            {{ __('auth.hacerme_socio') }}--}}
                                            {{ __('auth.register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
