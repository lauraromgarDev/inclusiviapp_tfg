<section class="content-tablas">
    <div class="container">
        <div class="text-center">
            <h2 class="custom_heading">
                @lang('interpreters.mis') <span> @lang('interpreters.solicitudes')</span>
            </h2>
            <br>
            <div class="row">
                <div class="col-md-12">
                    @if ($requests->isEmpty())
                        <p>No tienes ninguna solicitud.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> @lang('interpreters.fecha_para')</th>
                                    <th> @lang('interpreters.mensaje')</th>
                                    <th> @lang('interpreters.estado')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($requests as $request)
                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>{{ $request->request_date }}</td>
                                        <td>{{ $request->request_message }}</td>
                                        <td>{{ $request->status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {!! $requests->withQueryString()->links('pagination::bootstrap-5') !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
