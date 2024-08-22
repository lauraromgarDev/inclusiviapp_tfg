$(document).ready(function() {
    // Obtener referencias a los elementos del formulario
    var isDirectorCheckbox = $('#is_director');
    var positionLabel = $('label[for="position"]');
    var descriptionLabel = $('label[for="description"]');
    var directorPositionLabel = $('label[for="director_position"]');
    var directorDescriptionLabel = $('label[for="director_description"]');
    var positionField = $('#position');
    var descriptionField = $('#description');
    var directorPositionField = $('#director_position');
    var directorDescriptionField = $('#director_description');

    // Ocultar labels y campos del director por defecto
    directorPositionLabel.hide();
    directorDescriptionLabel.hide();
    directorPositionField.hide();
    directorDescriptionField.hide();

    // Agregar evento de cambio al campo is_director
    isDirectorCheckbox.change(function() {
        if ($(this).is(':checked')) {
            // Si se marca como director, mostrar labels y campos del director y ocultar labels y campos regulares
            directorPositionLabel.show();
            directorDescriptionLabel.show();
            directorPositionField.show();
            directorDescriptionField.show();
            positionLabel.hide();
            descriptionLabel.hide();
            positionField.hide();
            descriptionField.hide();
        } else {
            // Si se desmarca como director, mostrar labels y campos regulares y ocultar labels y campos del director
            directorPositionLabel.hide();
            directorDescriptionLabel.hide();
            directorPositionField.hide();
            directorDescriptionField.hide();
            positionLabel.show();
            descriptionLabel.show();
            positionField.show();
            descriptionField.show();
        }
    });
});
