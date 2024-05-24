document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('submitDocumento').addEventListener('click', function () {
        const formData = {
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            nro: document.getElementById('nro').value,
            fecha: document.getElementById('fecha').value,
            nroCarta: document.getElementById('nroCarta').value,
            procedencia: document.getElementById('procedencia').value,
            detalle: document.getElementById('detalle').value,
            providencia: document.getElementById('providencia') ? document.getElementById('providencia').value : null,
            carta: document.getElementById('carta') ? document.getElementById('carta').value : null,
            otro: document.getElementById('otro') ? document.getElementById('otro').value : null,
            archivado: document.getElementById('archivado') ? document.getElementById('archivado').value : null,
            repositorio: document.getElementById('repositorio') ? document.getElementById('repositorio').value : null,
        };

        $.ajax({
            url: '/formulario', // La ruta de tu endpoint
            type: 'POST',
            data: formData,
            success: function (response) {
                // Manejar la respuesta exitosa
                console.log(response);
                // Cerrar el modal y refrescar la página o hacer otra acción
                $('#exampleModal').modal('hide');
                location.reload();
            },
            error: function (error) {
                // Manejar el error
                console.error(error);
            }
        });
    });
});

    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
        };
            reader.readAsDataURL(input.files[0]);
        }
