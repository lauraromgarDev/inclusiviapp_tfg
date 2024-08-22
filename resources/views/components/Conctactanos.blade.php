<section class="map_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10">
                <div class="text-center">
                    <h2 class="custom_heading">
                        @lang('contact.contacta_con') <span>@lang('contact.nosotros')</span>
                    </h2>
                </div>
                @if (Session::has('message_sent'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message_sent') }}
                    </div>
                @endif

                <form action="{{ route('contact.sendEmail', app()->getLocale()) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">@lang('contact.name') </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name" value="{{ old('name') }}" >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('contact.email')</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                               name="email" value="{{ old('email') }}" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">@lang('contact.subject')</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                               name="subject" value="{{ old('subject') }}" >
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">@lang('contact.message')</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message"
                                  name="message" rows="5" >{{ old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('contact.send')</button>
                </form>
            </div>
        </div>
    </div>
</section>
