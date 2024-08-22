
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>InclusiviApp</h1>
        </div>
        <div class="card-body">
            <h2>Datos del nuevo alumno:</h2>
            <p><strong>Nombre:</strong>  {{$datosInscripcion['nombre']}} </p>
            <p><strong>Apellidos:</strong> {{$datosInscripcion['apellidos']}} </p>
            <p><strong>Edad:</strong> {{$datosInscripcion['edad']}} </p>
            <p><strong>¿Es socio?:</strong> {{$datosInscripcion['es_socio']}} </p>
            <p><strong>Telefono:</strong> {{$datosInscripcion['telefono']}}</p>
            <p><strong>Correo electrónico:</strong> {{$datosInscripcion['email']}} </p>
            <p><strong>Diversidad funcional:</strong> {{$datosInscripcion['diversidad_funcional']}} </p>
            <p><strong>Descripcion diversidad:</strong> {{$datosInscripcion['diversidad_descripcion']}}</p>
            <p><strong>Proyecto:</strong> {{ __($datosInscripcion['nombreProyecto']) }} </p>
        </div>
    </div>
</div>


