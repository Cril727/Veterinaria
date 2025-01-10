<link rel="stylesheet" href="vista/css/usuario.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-custom-primary">
    
    <div class="container-fluid">
        <a class="navbar-brand" href="mascota"><i class="bi bi-house-heart-fill"> Mascotas</i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="raza">Raza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tipoMascota">Tipo mascota</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="fondoUsuario">
<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Usuarios</h1>
            <p class="col-md-8 fs-4">
                Observa, suprime, añade y modifica usuarios
            </p>
            <img src="vista/img/usuario.svg" alt="Persona" id="imgUsuario">
        </div>
    </div>
    <div id="panelTablaUsuario" class="row mt-2">
        <div class="col-md-12">

            <button id="btnAgregarUsuario" class="btn mb-3 text-custom-light "><i class="bi bi-plus-circle-dotted"></i> Agregar Usuario</button>

            <div class="table-responsive">
                <table id="tablaUsuario" class="table table-hoverm-top" style="width: 100% ; margin-top: 20px;">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Documento</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="panelFormularioUsuario" class="row" style="display: none;">
        <div class="col-md-12">
            <button id="btnRegresarUsuario" class="btn btn-danger mb-3">Regresar</button>
            <div class="row">
                <div class="col-md-6 offset-md-4">
                    <form id="formUsuario" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6">
                            <label for="txt_documento" class="form-label" style="text-align: start">Documento</label>
                            <input type="text" class="form-control" id="txt_documento" required>
                            <div class="invalid-feedback">
                                Ingrese su documento
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="txt_nombre" required>
                            <div class="invalid-feedback">
                                Ingrese sus nombre
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="txt_apellido" required>
                            <div class="invalid-feedback">
                                Ingrese sus apellido
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="txt_email" required>
                            <div class="invalid-feedback">
                                Ingrese su email
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="panelFormularioEditarUsuario" class="row" style="display: none;">
        <div class="col-md-12">
            <button id="btnRegresarEditar" class="btn btn-danger mb-3">Regresar</button>
            <div class="row">
                <div class="col-md-6 offset-md-4">
                    <form id="formEditarUsuario" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6">
                            <label for="txt_edit_documento" class="form-label" style="text-align: start">Documento</label>
                            <input type="text" class="form-control" id="txt_edit_documento" required>
                            <div class="invalid-feedback">
                                Ingrese su documento
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_edit_nombre" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="txt_edit_nombre" required>
                            <div class="invalid-feedback">
                                Ingrese sus nombres
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_edit_apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="txt_edit_apellido" required>
                            <div class="invalid-feedback">
                                Ingrese su apellido
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_edit_email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="txt_edit_email" required>
                            <div class="invalid-feedback">
                                Ingrese su email
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="btnEditarUsuario" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>