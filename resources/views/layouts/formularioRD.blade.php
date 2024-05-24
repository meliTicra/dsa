<!-- resources/views/formulario.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="table-public">
        <table class="table table-striped table-hover table-public">
            <thead>
                <tr class="table-title">
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
                    <td>Convocatoria</td>
                    <td><button class="btn btn-primary show-form" data-type="providencia">Providencia</button></td>
                    <td><button class="btn btn-secondary show-form" data-type="carta">Carta</button></td>
                    <td><button class="btn btn-info show-form" data-type="otro">Otro</button></td>
                    <td>Ing. Gustavo</td>
                    <td>Repositorio</td>
                    <td><button class="btn btn-danger">Eliminar</button></td>
                </tr>
                <!-- Más filas aquí -->
            </tbody>
        </table>
    </div>

    <!-- Formulario Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Nuevo Formulario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dynamicForm">
                        <div class="mb-3">
                            <label class="form-label" id="labelCampo">Campo:</label>
                            <input type="text" class="form-control" id="campo" name="campo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha:</label>
                            <input type="date" class="form-control" id="RDFecha" name="fecha">
                        </div>
                        <div class="mb-3">
                            <label for="archivado" class="form-label">Archivado:</label>
                            <input type="text" class="form-control" id="archivadoTexto" name="archivado">
                        </div>
                        <div class="mb-3">
                            <label for="repositorio" class="form-label">Repositorio:</label>
                            <input type="file" class="form-control" id="repositorio" name="repositorio" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="mb-3">
                            <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="max-width: 100%; max-height: 200px;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveButton">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluye jQuery y Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Incluye el archivo JavaScript compilado -->
    <script src="{{ mix('js/formulario.js') }}"></script>
</body>
</html>
