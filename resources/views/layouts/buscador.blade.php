<div class="buscador">
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
</div>
