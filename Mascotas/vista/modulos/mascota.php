<link rel="stylesheet" href="vista/css/mascota.css">
<div id="fondoMascota">
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
                    <li class="nav-item">
                        <a class="nav-link" href="tipoMascota">Tipo Mascotas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="panelMascota" class="container">
        <div class="p-5 mb-4 bg-custom-secondary rounded-3 shadow">
            <div class="container-fluid py-5 ">
                <h1 class="display-5 fw-bold text-custom-light">Mascotas</h1>
                <p class="col-md-8 fs-4 text-custom-light">
                    Aca se listan todas las mascotas con su usuario y raza
                </p>
                <img src="vista/img/gatito.svg" alt="Gatito" id="gatitoSvg">
            </div>
        </div>

        <div id="containerFluid" class="container">

        <br>
            <div class="table-responsive" id="panelTablaDeLaMascota">
                <button id="btnAgregarMascota" class="btn mb-3">
                    <i class="fas fa-plus me-2 text-custom-light"></i>
                    <i class="bi bi-database-add text-custom-light"> Agregar</i>
                </button>
                <table id="tablaMascota" class="table table-hover m-top">
                    <thead class="table-custom-secondary">
                        <tr>
                            <th scope="col">Nombre Mascota</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Nombre Usuario</th>
                            <th scope="col">Tipo Mascota</th>
                            <th scope="col">Raza</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div id="panelFormularioMascotas" class="card mt-4 shadow-sm bg-custom-light" style="display: none;">
                <div class="col-md-12">
                    <button id="btnRegresartableMascota" class="btn mb-3">
                        <i class="fas fa-arrow-left me-2"></i><i class="bi bi-back"></i> Regresar
                    </button>
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                            <form id="formAgregarMascota" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-6">
                                    <label for="nombreMascota" class="form-label" style="text-align: start">Nombre Mascota</label>
                                    <input type="text" class="form-control" id="nombreMascota" required>
                                    <div class="invalid-feedback">
                                        Ingrese El Nombre De La Mascota
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="edadMascota" class="form-label">Edad</label>
                                    <input type="number" class="form-control" id="edadMascota" required>
                                    <div class="invalid-feedback">
                                        Ingrese La Edad De La Mascota
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="usuarioMascota" class="form-label">Usuario</label>
                                    <select class="form-select" id="usuarioMascota" required>
                                        <option value="">Seleccione un usuario</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione un usuario
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tipoMascota" class="form-label">Tipo Mascota</label>
                                    <select class="form-select" id="tipoMascota" required>
                                        <option value="">Seleccione un tipo de mascota</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione el tipo de mascota
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="razaMascota" class="form-label">Raza</label>
                                    <select class="form-select" id="razaMascota" required>
                                        <option value="">Seleccione una raza</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione la raza de la mascota
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Registrar Mascota</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de edición de mascota -->
            <div id="panelFormularioEditarMascota" class="card mt-4 shadow-sm bg-custom-light" style="display: none;">
                <div class="col-md-12">
                    <h5 class="mb-3">Editar Mascota</h5>
                    <form id="formEditarMascota" class="needs-validation" novalidate>
                        <input type="hidden" id="idMascotaEdit">
                        <div class="mb-3">
                            <label for="nombreMascotaEdit" class="form-label">Nombre Mascota</label>
                            <input type="text" class="form-control" id="nombreMascotaEdit" required>
                            <div class="invalid-feedback">
                                Ingrese el nombre de la mascota
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edadMascotaEdit" class="form-label">Edad</label>
                            <input type="number" class="form-control" id="edadMascotaEdit" required>
                            <div class="invalid-feedback">
                                Ingrese la edad de la mascota
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="usuarioMascotaEdit" class="form-label">Usuario</label>
                            <select class="form-select" id="usuarioMascotaEdit" required>
                                <option value="">Seleccione un usuario</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un usuario
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tipoMascotaEdit" class="form-label">Tipo Mascota</label>
                            <select class="form-select" id="tipoMascotaEdit" required>
                                <option value="">Seleccione un tipo de mascota</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione el tipo de mascota
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="razaMascotaEdit" class="form-label">Raza</label>
                            <select class="form-select" id="razaMascotaEdit" required>
                                <option value="">Seleccione una raza</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione la raza de la mascota
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
            <div>
         </div>
     </div>