<link rel="stylesheet" href="vista/css/tipo.css">

<div id="fondo">
<nav class="navbar navbar-expand-lg navbar-dark bg-custom-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="mascota"><i class="bi bi-house-heart-fill"> Mascotas</i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuario">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="raza">Raza</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">


    <div class="p-5 mb-4 bg-light rounded-3" id="" style="background-color: #4CAF50; color: blue;">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold" style="color:black">CRUD TIPO MASCOTA</h1>

            <p class="col-md-8 fs-4" style="color:black" style="color:black">
                Tipo de mascota
            </p>
            <img id="tigre" src="vista/img/tigre.svg" alt="tigre">
            
        </div>
    </div>


    <!--FORMULARIO PRINCIPAL-->
    <div id="panelTablaTipoMascota" class="row mt-2">
        <div class="col-md-12">
            <button id="agregarTipoMascota" class="btn  mb-3"  .style.display ><i class="bi bi-capslock-fill"></i> Agregar tipo </button>

            <div class="table-responsive">
                <table id="tablaTipoMascota" class="table table-hover m-top" style="width: 100%">
                    <thead class="table-light">
                        <tr>

                            <th scope="col">Tipo de Mascota</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!--FORMULARIO AGREGAR-->
    <div id="panelFormularioTipoMascota" class="row" style="display: none;">
        <div class="col-md-12">
            <button id="btn-RegresarTipo" class="btn btn-primary mb-3">Regresar</button>
            <div class="row">
                <div class="col-md-6 offset-md-4"> <!-- empuja la tabla 4 espcios--->


                    <form id="formRegistroTipoMascota" class="row g-3 needs-validation" novalidate> <!--mira la validacion que todos esten con validacion -->
                        <div class="col-md-6">

                            <label for="txt_tipo" class="form-label" style="text-align: start">Tipo</label>
                            <input type="text" class="form-control" id="txt_tipo" required>
                            <div class="invalid-feedback">
                                Por favor ingrese el tipo de mascota
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="btnAgregarTipoMascota" class="btn btn-primary" type="submit">Registrar tipo Mascota</button><br><br>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <!--EDITAR -->
    <div id="panelFormularioTipoMascotaEditar" class="row" style="display: none;">
        <div class="col-md-12">
            <button id="btnRegresarTipo" class="btn btn-primary mb-3">Regresar</button>
            <div class="row">
                <div class="col-md-6 offset-md-4"> <!-- empuja la tabla 4 espcios--->


                    <form id="formEditarTipoMascota" class="row g-3 needs-validation" novalidate> <!--mira la validacion que todos esten con validacion -->
                        <div class="col-md-6">

                            <label for="txt_tipoEditar" class="form-label" style="text-align: start">Tipo</label>
                            <input type="text" class="form-control" id="txt_tipoEditar" required>
                            <div class="invalid-feedback">
                                Por favor ingrese el tipo de mascota a editar
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="btnEditarTipoMascota" class="btn btn-primary" type="submit">editar tipo Mascota</button><br><br>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>