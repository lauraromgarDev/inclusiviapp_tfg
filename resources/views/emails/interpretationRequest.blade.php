 <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>InclusiviApp</h1>
            </div>
            <div class="card-body">
                <h2>Datos de la solicitud:</h2>
                <p><strong>Se solicita intérprete para el día:</strong>  {{$datosSolicitud['request_date']}} </p>
                <p><strong>El mensaje de la solicitud es:</strong>  {{$datosSolicitud['request_message']}} </p>
                <p><strong>El nombre del alumno es:</strong>  {{$datosSolicitud['nombre']}} </p>
                <p><strong>El servcio solicitado es: </strong>{{$datosSolicitud['service']}}</p>
                <p><strong>La interprete solicitada es: </strong>{{$datosSolicitud['interprete']}}</p>
                <p><strong>El email del solicitante es: </strong>{{$datosSolicitud['email']}}</p>
                <p><strong>El telefono del solicitante es: </strong>{{$datosSolicitud['telefono']}}</p>
            </div>
            <p><a href="{{ Auth::check() ? url("https://daw2223a19.iestrassierra.net/es/login") : url("https://daw2223a19.iestrassierra.net/es/") }}" >
                    Entra en la página para confirmar al solicitante
            </a></p>
    </div>

</div>
