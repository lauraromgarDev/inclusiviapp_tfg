$(document).ready(function() {
    // esconde los campos de director
    $('#director_fields').hide();

    // maneja el evento de hacer clic en el checkbox
    $('#is_director_checkbox').click(function() {

        if ($(this).is(':checked')) {
            $('#director_fields').show();
            $('#team_fields').hide();
        } else {
            $('#director_fields').hide();
            $('#team_fields').show();
        }
    });
});
