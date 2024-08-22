$(document).ready(function() {
    // Obtener el servicio seleccionado inicialmente
    var selectedService = $('#service').val();

    // Obtener los intérpretes iniciales según el servicio seleccionado
    getInterpreters(selectedService);

    // Actualizar los intérpretes cuando se cambie el servicio seleccionado
    $('#service').change(function() {
        var service = $(this).val();
        getInterpreters(service);
    });

    // Función para obtener los intérpretes según el servicio seleccionado
    function getInterpreters(service) {
        // Obtener el valor del locale de la URL actual
        var locale = window.location.pathname.split('/')[1];

        // Realizar una petición AJAX para obtener los intérpretes según el servicio seleccionado
        $.ajax({
            url: '/' + locale + '/get-interpreters',
            type: 'GET',
            data: {
                service: service
            },
            success: function(response) {
                var interpreters = response.interpreters;

                // Limpiar el select de intérpretes
                $('#interpreter_id').empty();

                // Agregar la opción predeterminada
                $('#interpreter_id').append($('<option>').val('').text('Seleccionar intérprete'));

                // Agregar las opciones de intérpretes según el servicio seleccionado
                if (Array.isArray(interpreters)) {
                    interpreters.forEach(function(interpreter) {
                        $('#interpreter_id').append($('<option>').val(interpreter.id).text(interpreter.interpreter_name));
                    });
                }

                // Seleccionar el intérprete previamente seleccionado, si existe
                var selectedInterpreter = $('#interpreter_id').data('selected');
                if (selectedInterpreter) {
                    $('#interpreter_id').val(selectedInterpreter);
                }
            },
            error: function(xhr) {
                // Manejar el error si la petición AJAX falla
                console.log(xhr.responseText);
            }
        });
    }
});


// $(document).ready(function() {
//     // Obtener el servicio seleccionado inicialmente
//     var selectedService = $('#service').val();
//
//     // Obtener los intérpretes iniciales según el servicio seleccionado
//     getInterpreters(selectedService);
//
//     // Actualizar los intérpretes cuando se cambie el servicio seleccionado
//     $('#service').change(function() {
//         var service = $(this).val();
//         getInterpreters(service);
//     });
//
//     // Función para obtener los intérpretes según el servicio seleccionado
//     function getInterpreters(service) {
//         // Obtener el valor del locale de la URL actual
//         var locale = window.location.pathname.split('/')[1];
//
//         // Realizar una petición AJAX para obtener los intérpretes según el servicio seleccionado
//         $.ajax({
//             url: '/' + locale + '/get-interpreters',
//             type: 'GET',
//             data: {
//                 service: service
//             },
//             success: function(response) {
//                 var interpreters = response.interpreters;
//
//                 // Limpiar el select de intérpretes
//                 $('#interpreter_id').empty();
//
//                 // Agregar la opción predeterminada
//                 $('#interpreter_id').append($('<option>').val('').text('Seleccionar intérprete'));
//
//                 // Agregar las opciones de intérpretes según el servicio seleccionado
//                 if (Array.isArray(interpreters)) {
//                     interpreters.forEach(function(interpreter) {
//                         $('#interpreter_id').append($('<option>').val(interpreter.id).text(interpreter.interpreter_name));
//                     });
//                 }
//
//                 // Seleccionar el intérprete previamente seleccionado, si existe
//                 var selectedInterpreter = $('#interpreter_id').data('selected');
//                 if (selectedInterpreter) {
//                     $('#interpreter_id').val(selectedInterpreter);
//                 }
//             },
//             error: function(xhr) {
//                 // Manejar el error si la petición AJAX falla
//                 console.log(xhr.responseText);
//             }
//         });
//     }
// });
