<section class="single-project">
    <div class="container-project">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>@lang($project->name)</h2>
                <div class="img text-center">
                    <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box text-left">
                    <p>
                        @lang($project->description)
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>@lang('proyectos.quien')</h2>
                <div> @lang($project->team_description)</div>
                <br>
                <h2>@lang('proyectos.que')</h2>
                <div>@lang($project->objectives)</div>
                <br>
                <h2>@lang('proyectos.a_quien')</h2>
                <div>@lang($project->destination) </div>
                <br>
                <br>

                <a href="{{ route('user.students.create', ['locale' => app()->getLocale()]) }}">
                    @lang('proyectos.inscripcion')
                </a>
            </div>
        </div>
    </div>
</section>
