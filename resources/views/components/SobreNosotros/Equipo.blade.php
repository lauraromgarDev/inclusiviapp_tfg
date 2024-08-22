<section class="team_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2 ">
                <h2 class="custom_heading">
                    {{ __('sobreNosotros.nuestro') }} <span>{{ __('sobreNosotros.equipo') }}</span>
                </h2>

                <h3>{{ __('sobreNosotros.juntaDirectiva') }}</h3><br>
                <div class="row">
                    @foreach($teams as $team)
                        @if($team->is_director == true)
                            <div class="col-md-4 mb-4">
                                <div class="img_box">
                                    <div class="img_container">
                                        <img src="{{ asset('storage/images/' . $team->image) }}" class="card-img-top"
                                             alt="Imagen de {{$team->name}}">
                                    </div>
                                </div>
                                <div class="detail_box">
                                    <h6 class="card-title">{{ __($team->director_position) }}</h6>
                                    <p class="card-text">{{ __($team->director_description) }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container layout_padding2">
        <h3>{{ __('sobreNosotros.equipo') }}</h3><br>
        <div class="row justify-content-center">
            @foreach($teams as $team)
                @if($team->is_director == false)
                    <div class="col-md-3 mb-4">
                        <div class="img_box">
                            <div class="img_container">
                                <img src="{{ asset('storage/images/' . $team->image) }}" class="card-img-top"
                                     alt="Imagen de {{$team->name}}">
                            </div>
                        </div>
                        <div class="detail_box text-center">
                            <h6 class="card-title">{{ __( $team->position) }}</h6>
                            <p class="card-text">{{ __($team->description) }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
