<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DSA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="app.scss">    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    
</head>
<body>
    <header>
        <section class="text-header">
            <video autoplay muted loop class="video-header">
            <source src="{{ asset('images/video3.mp4') }}" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
            <h1>Registro de Documentación</h1>
            <h2>Dirección de Servicios Académicos</h2>
            <div id="wave" style="height: 140px; " >
                <div style="overflow: hidden;">
                    <svg
                        preserveAspectRatio="none"
                        viewBox="0 0 1200 120"
                        xmlns="http://www.w3.org/2000/svg"
                        style="fill: #f5f5f5; width: 100%; height: 145px; transform: rotate(180deg);">
                    <path
                    d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
                    opacity=".25"/>
                    <path
                    d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
                    opacity=".5"/>
                    <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
                </svg>
                </div>
        </section>        
    </header>

    <div class="container">
        <!-- Botón para agregar nuevo elemento -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:#21243e ;"  >Agregar Nuevo Documento</button>
        <!-- Tabla para mostrar elementos -->
        <table class="table">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Buscar  <b>Documento</b></h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center" id="loader"></div>
                <div class="row">                    
                    <div class="col-sm-12">
                        <div class="table-filter">
                            <div class="row">
                                <div class="col-sm-5"> <!-- Ajustamos el ancho de la celda de procedencia -->
                                    <label>Procedencia</label>
                                        <select class="form-control" id="location" onchange="load(1);">
                                            <option value="">Todos</option>                                                
                                            <option value="Berlin">Berlin</option>
                                            <option value="London">London</option>
                                            <option value="Madrid">Madrid</option>
                                            <option value="New York">New York</option>
                                            <option value="Paris">Paris</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 0px;">
                                        <label>Nro Carta</label>
                                        <input type="text" class="form-control" id="name" >
                                    </div>
                                    <div class="col-sm-1" style="margin-top: 0px;" >
                                        <label for="fecha" class="form-label"style="margin:0px;">Fecha </label> <!-- Ajustamos la posición de la etiqueta Fecha -->
                                        <input type="date" class="form-control" id="date">
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 23px; margin-left:10px;"> <!-- Ajustamos la posición del botón -->
                                        <button type="button" class="btn btn-primary" onclick="load(1);">
                                            <i class="fa fa-search"></i> 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha</th>
                                    <th>Nro Carta</th>
                                    <th>Procedencia</th>
                                    <th>Detalle</th>
                                    <th>Providencia</th>
                                    <th>Carta</th>
                                    <th>Otro</th>
                                    <th>Archivado</th>
                                    <th>Repositorio</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2/4/2024</td>
                                    <td>5152</td>
                                    <td>Ing. de Sistemas</td>
                                    <td>Elit ipsum adipisicing ut proident officia sit. Officia qui duis adipisicing proident.</td>
                                    <td>Tecnico Coordinador 3/4/2024</td>
                                    <td></td>
                                    <td></td>
                                    <td>Ing. Gustavo</td>
                                    <td>Repositorio</td>
                                    <td>eliminar</td>
                                </tr>
                                <!-- Aquí se mostrarán los elementos adicionales -->
                                <tr>
                                    <td>1</td>
                                    <td>2/4/2024</td>
                                    <td>5152</td>
                                    <td>Ing. de Sistemas</td>
                                    <td>Convocatoria</td>
                                    <td></td>
                                    <td>Tecnico Coordinador 3/4/2024</td>
                                    <td></td>
                                    <td>Ing. Gustavo</td>
                                    <td>Repositorio</td>
                                    <td>eliminar</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2/4/2024</td>
                                    <td>5152</td>
                                    <td>Ing. de Sistemas</td>
                                    <td>Convocatoria</td>
                                    <td></td>
                                    <td></td>
                                    <td>Tecnico Coordinador 3/4/2024</td>
                                    <td>Ing. Gustavo</td>
                                    <td>Repositorio</td>
                                    <td>eliminar</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2/4/2024</td>
                                    <td>5152</td>
                                    <td>Ing. de Sistemas</td>
                                    <td>Convocatoria</td>
                                    <td></td>
                                    <td>Tecnico Coordinador 3/4/2024</td>
                                    <td></td>
                                    <td>Ing. Gustavo</td>
                                    <td>Repositorio</td>
                                    <td>eliminar</td>
                                </tr>
                            </tbody>
                            
                    </table>
                </div>
            </div>
        </table>
    </div>
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
                                    <input type="text" class="form-control" id="nro" name="nro" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha de Recibido:</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nroCarta" class="form-label">Nro Carta:</label>
                                    <input type="text" class="form-control" id="nroCarta" name="nroCarta" required>
                                </div>
                                <div class="mb-3">
                                    <label for="procedencia" class="form-label">Procedencia:</label>
                                    <input type="text" class="form-control" id="procedencia" name="procedencia" required>
                                </div>
                                <div class="mb-3">
                                    <label for="detalle" class="form-label">Detalle:</label>
                                    <textarea class="form-control" id="detalle" rows="3" name="detalle" required></textarea>
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
                                        <input type="text" class="form-control" id="campo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fecha:</label><br>
                                        <input type="date" class="form-control" id="RDFecha" aria-describedby="RDAddon">
                                    </div>
                                    

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
            });
        }
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
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
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
</html>
