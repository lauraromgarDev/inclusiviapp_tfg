<section class="gallery-section layout_padding">
    <div class="container">
        <div class="text-center">
            <h2 class="custom_heading" style="color: #0c0c0c">
                @lang('proyectos.nuestros')  <span>@lang('proyectos.proyectos')</span>
            </h2>
        </div>
    </div>
    <div class="container project-container">
        @foreach($projects as $project)
            <div class="col-md-4 mb-3 project-card">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/' . $project->image) }}" alt="{{ $project->name }}">
                    <div class="card-body">
                        <h5 class="card-title">@lang($project->name)</h5>
                        <a href="{{ url(app()->getLocale().'/user/proyectos/'.$project->slug) }}" class="btn btn-primary">{{ __('proyectos.ver_proyecto') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</section>

