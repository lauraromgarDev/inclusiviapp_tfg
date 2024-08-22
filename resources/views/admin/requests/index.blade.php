@extends('layouts.app')

@section('content')
    <div class="content-tablas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between mb-3">
                        <h2>@lang('interpreters.soli')</h2>
                    </div>

                    @if (session('message_sent'))
                        <div class="alert alert-success">
                            {{ session('message_sent') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="d-none d-lg-table-cell">ID</th>
                                <th class="d-none d-lg-table-cell">@lang('interpreters.solicitante')</th>
                                <th class="d-none d-lg-table-cell">@lang('interpreters.fecha')</th>
                                <th class="d-none d-lg-table-cell">@lang('interpreters.mensaje')</th>
                                <th class="d-none d-lg-table-cell">@lang('interpreters.estado')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($interpretationRequests as $request)
                                <tr>
                                    <td class="d-none d-lg-table-cell">{{ $request->id }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $request->user->name }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $request->request_date }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $request->request_message }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $request->status }}</td>
                                    <td>
                                        <div class="btn-group-vertical" role="group">

                                            <a href="{{ route('admin.requests.show', ['locale' => app()->getLocale(), 'id' => $request->id]) }}" class="btn btn-info">@lang('interpreters.ver')</a>
                                            <a href="{{ route('admin.requests.edit', ['locale' => app()->getLocale(), 'id' => $request->id]) }}" class="btn btn-dark">@lang('interpreters.editar')</a>
                                            <form action="{{ route('admin.requests.destroy', ['locale' => app()->getLocale(), 'id' => $request->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">@lang('interpreters.eliminar')</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>ID:</strong> {{ $request->id }}</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('interpreters.solicitante'):</strong> {{ $request->user->name }}</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('interpreters.fecha'):</strong> {{ $request->request_date }}</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('interpreters.mensaje')</strong> {{ $request->request_message }}</td>
                                </tr>
                                <tr class="d-lg-none">
                                    <td colspan="2"><strong>@lang('interpreters.estado'):</strong> {{ $request->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    {!! $interpretationRequests->withQueryString()->links('pagination::bootstrap-5') !!}

                </div>
            </div>
        </div>
    </div>
    @include('components.Info')
    @include('components.Footer')
@endsection

