<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<body>
    <!-- resources/views/formulario.blade.php -->
    <form id="formData"  action="{{ route('formulario.store') }}"method="POST">
        <div class="container">
            <!-- Botón para agregar nuevo documento -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#documentoModal" style="background-color: #21243e;">
                Agregar Nuevo Documento
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="documentoModal" tabindex="-1" aria-labelledby="documentoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentoModalLabel">Agregar Nuevo Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('layouts.formulario')
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla para mostrar elementos -->
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Buscar <b>Documento</b></h2>
                    </div>
                </div>
            </div>
            <div class="row text-center" id="loader"></div>
            <div class="row">                    
                <div class="col-sm-12">
                    <div class="table-filter">
                        <div class="row">
                            <div class="col-sm-5">
                                <label>Procedencia</label>
                                <select class="form-control" id="location" onchange="load(1);">
                                    <option value="">carrera A</option>
                                    <option value="">Carrera B</option>
                                    <option value="">Carrera C</option>
                                    <option value="">Carrera D</option>
                                    <option value="">Carrera F</option>
                                    <option value="">Carrera G</option>
                                </select>
                            </div>
                            <div class="col-sm-2" style="margin-top: 0px;">
                                <label>Nro Carta</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="col-sm-1" style="margin-top: 0px;">
                                <label for="fecha" class="form-label" style="margin:0px;">Fecha</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="col-sm-2" style="margin-top: 23px; margin-left:10px;">
                                <button type="button" class="btn btn-primary" onclick="load(1);">
                                    <i class="fa fa-search"></i> 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.tabla')
        </div>
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nro" class="form-label">Nro:</label>
                    <input type="text" class="form-control" id="nro" name="nro">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha de Recibido:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" >
                </div>
                <div class="mb-3">
                    <label for="nroCarta" class="form-label">Nro Carta:</label>
                    <input type="text" class="form-control" id="nroCarta" name="nroCarta">
                </div>
                <!-- Procedencia -->
                <div class="mb-3">
                    <label for="procedencia" class="form-label">Procedencia:</label>
                    <select class="form-select" id="procedencia" name="procedencia" >
                        <option value="" selected disabled>Selecciona una procedencia</option>
                    </select>
                </div>

            <!-- //aqui iba la recoleccion de las carreras desde la base de datos -->
                <div class="mb-3">
                    <label for="detalle" class="form-label">Detalle:</label>
                    <textarea class="form-control" id="detalle" rows="3" name="detalle" ></textarea>
                </div>
            </div> 
        </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>