@extends('layout')

@section('title')

@section('content')
<body>
    <!-- Formulario emergente para agregar nuevo elemento -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <script>
            const formData = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            nro: $('#nro').val(),
            fecha: $('#fecha').val(),
            nro_carta: $('#nroCarta').val(),
            procedencia: $('#procedencia').val(),
            detalle: $('#detalle').val(),
            providencia: $('#providencia').val(),
            carta: $('#carta').val(),
            otro: $('#otro').val(),
            archivado: $('#archivado').val(),
            repositorio: $('#repositorio').val()
            };
        </script>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" id="#form-he">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formData" action="/documento" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nro" class="form-label">Nro:</label>
                                    <input type="text" class="form-control" id="nro" name="nro">
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha de Recibido:</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha">
                                </div>
                                <div class="mb-3">
                                    <label for="nroCarta" class="form-label">Nro Carta:</label>
                                    <input type="text" class="form-control" id="nroCarta" name="nroCarta">
                                </div>
                                <div class="mb-3">
                                    <label for="procedencia" class="form-label">Procedencia:</label>
                                    <input type="text" class="form-control" id="procedencia" name="procedencia">
                                    <select name="procedencia">
                                       
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="detalle" class="form-label">Detalle:</label>
                                    <textarea class="form-control" id="detalle" rows="3" name="detalle"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div id="ruta_destino">
                                    <label class="form-label">Ruta - Destino:</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcion" id="providenciaRadio" value="providencia">
                                        <label class="form-check-label" for="providenciaRadio">Providencia</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcion" id="cartaRadio" value="carta">
                                        <label class="form-check-label" for="cartaRadio">Carta</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcion" id="otroRadio" value="otro">
                                        <label class="form-check-label" for="otroRadio">Otro</label>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label" id="labelCampo"></label>
                                        <input type="text" class="form-control" id="campo">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fecha:</label><br>
                                        <input type="date" class="form-control" id="RDFecha" aria-describedby="RDAddon">
                                    </div>
                                    <!-- agrgar las procedencias -->
                                    <div class="mb-3">
                                        <label for="archivado" class="form-label">Archivado:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="archivadoTexto" aria-describedby="archivadoAddon">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="repositorio" class="form-label">Repositorio:</label>
                                    <input type="file" class="form-control" id="repositorio" accept="image/*" onchange="previewImage(event)">
                                </div>
                                <div class="mb-3">
                                    <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="max-width: 100%; max-height: 200px;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
    // Función para cargar los elementos desde el backend y renderizarlos en la tabla
        function loadItems() {
            $.ajax({
            url: '/documento', // Endpoint para obtener elementos desde el backend
            method: 'GET',
            success: function(response) {
                const itemList = $('#itemList');
                itemList.empty();
                if (Array.isArray(response)) {
                    response.forEach(function(item) {
                        itemList.append(`
                            <tr>
                                <td>${item.nro}</td>
                                <td>${item.fecha}</td>
                                <td>${item.nro_carta}</td>
                                <td>${item.procedencia}</td>
                                <td>${item.detalle}</td>
                                <td>${item.providencia}</td>
                                <td>${item.carta}</td>
                                <td>${item.otro}</td>
                                <td>${item.archivado}</td>
                                <td>${item.repositorio}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteItem(${item.id})">Eliminar</button>
                                </td>
                            </tr>
                        `);
                    });
                console.error('agregado:', response);
            } else {
                console.error('La respuesta no es un array:', response);
            }
        }
        });
    }

    // Función para agregar un nuevo elemento
    $('#crudForm').submit(function(event) {
    event.preventDefault();
    const formData = {
        // Datos del formulario
    };
    $.ajax({
        url: '/documento',
        method: 'POST',
        data: formData,
        success: function(response) {
            // Procesar la respuesta exitosa
        },
        error: function(xhr, status, error) {
            // Manejar los errores de validación
            var errors = xhr.responseJSON.errors;
            // Limpiar los mensajes de error previos
            $('.text-danger').remove();
            // Mostrar los errores de validación
            $.each(errors, function(key, value) {
                $('#' + key).after('<span class="text-danger">' + value[0] + '</span>');
            });}
        });
    });


    // Función para editar un elemento
    function editItem(id) {
        // Implementar la lógica para editar un elemento
        console.log('Editar elemento con ID:', id);
    }

    // Función para eliminar un elemento
    function deleteItem(id) {
        // Implementar la lógica para eliminar un elemento
        console.log('Eliminar elemento con ID:', id);
    }

    // Cargar los elementos al cargar la página
    $(document).ready(function() {
        loadItems();
    });
    </script>
    <script>
        const providenciaRadio = document.getElementById('providenciaRadio');
        const cartaRadio = document.getElementById('cartaRadio');
        const otroRadio = document.getElementById('otroRadio');
        const labelCampo = document.getElementById('labelCampo');
        const campo = document.getElementById('campo');

        providenciaRadio.addEventListener('change', function() {
            labelCampo.textContent = 'Providencia:';
            campo.type = 'text';
        });

        cartaRadio.addEventListener('change', function() {
            labelCampo.textContent = 'Carta:';
            campo.type = 'text';
        });

        otroRadio.addEventListener('change', function() {
            labelCampo.textContent = 'Otro:';
            campo.type = 'text';
        });
    </script>
    
    <script>
        $.ajax({
            url: '/documento',
            method: 'POST',
            data: formData,
            _token: $('meta[name="csrf-token"]').attr('content'),
            success: function(response) {
                // Procesar la respuesta exitosa, si es necesario
            },
            error: function(xhr, status, error) {
                var errors = xhr.responseJSON.errors;
                // Manejar los errores de validación aquí
                // Por ejemplo, puedes mostrar los errores cerca de los campos correspondientes en el formulario
                $.each(errors, function(key, value) {
                    // Mostrar el mensaje de error cerca del campo correspondiente
                    $('#' + key).after('<span class="text-danger">' + value[0] + '</span>');
                });
            }
        });
    </script>

</body>
@endsection
