// resources/js/formulario_rd.js

$(document).ready(function() {
    // Muestra el formulario modal al hacer clic en los botones
    $('.show-form').click(function() {
        var type = $(this).data('type');
        $('#labelCampo').text(type.charAt(0).toUpperCase() + type.slice(1) + ':');
        $('#campo').attr('name', type);
        $('#formModal').modal('show');
    });

    // Muestra la vista previa de la imagen seleccionada
    window.previewImage = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };

    // Guardar la información del formulario (ejemplo)
    $('#saveButton').click(function() {
        var formData = new FormData($('#dynamicForm')[0]);
        // Aquí puedes hacer una solicitud AJAX para enviar los datos al servidor
        console.log('Datos del formulario:', formData);

        // Cierra el modal después de guardar
        $('#formModal').modal('hide');
    });
});
