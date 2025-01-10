<link rel="stylesheet" href="vista/css/raza.css">

<!-- Barra de Navegación -->
 <div id="contenedorRaza">

     <nav class="navbar navbar-expand-lg navbar-dark bg-custom-primary">
         <div class="container-fluid">
             <a class="navbar-brand" href="mascota"><i class="bi bi-house-heart-fill"> Mascotas</i></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav ms-auto">
                     <li class="nav-item">
                         <a class="nav-link custom-light" href="usuario">Usuario</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link custom-light" href="tipoMascota">Tipo mascota</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     
     <div class="container mt-4">
     
         <div class="p-5 mb-4 bg-custom-secondary rounded-3 shadow">
             <div class="container-fluid py-5">
                 <h1 class="display-5 fw-bold text-custom-light">Raza</h1>
                 <p class="col-md-8 fs-4 text-custom-light">
                     Aquí se agregan las razas.
                 </p>
                 <img src="vista/img/Perros.svg" alt="imgRaza" id="imgRaza">
             </div>
         </div>
     
         <!-- Panel de Tabla de Razas -->
         <div id="panelTablaRaza" class="card shadow-sm bg-custom-light">
             <div class="card-body">
                 <h5 class="card-title mb-3 text-custom-dark">Lista de Razas</h5>
                 <button id="btn-AgregarRaza" class="btn mb-3">
                     <i class="fas fa-plus me-2"></i><i class="bi bi-database-add"></i> Agregar
                 </button>
                 <div class="table-responsive">
                     <table id="tablaRaza" class="table table-hover m-top">
                         <thead class="table-custom-secondary">
                             <tr>
                                 <th scope="col">Descripción Raza</th>
                                 <th scope="col">Acciones</th>
                             </tr>
                         </thead>
                         <tbody>
                            
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     
         <!-- Formulario para Agregar Raza -->
         <div id="panelFormularioRaza" class="card mt-4 shadow-sm bg-custom-light" style="display: none;">
             <div class="card-body">
                 <h5 class="card-title mb-3">Agregar Nueva Raza</h5>
                 <button id="btn-Regresar" class="btn mb-3">
                     <i class="fas fa-arrow-left me-2"></i><i class="bi bi-back"></i> Regresar
                 </button>
                 <form id="formRegistroRaza" class="needs-validation" novalidate>
                     <div class="mb-3">
                         <label for="txt_raza" class="form-label">Raza</label>
                         <input type="text" class="form-control" id="txt_raza" required>
                         <div class="invalid-feedback">
                             Por favor ingrese la raza.
                         </div>
                     </div>
                     <button class="btn" id="btn-RegistrarRaza" type="submit">
                         <i class="fas fa-save me-2"></i></i><i class="bi bi-floppy-fill"></i> Registrar Raza
                     </button>
                 </form>
             </div>
         </div>
     
         <!-- Formulario de Edición de Raza -->
         <div id="panelFormularioEditarRaza" class="card mt-4 shadow-sm bg-custom-light" style="display: none;">
             <div class="card-body">
                 <h5 class="card-title mb-3 text-custom-dark">Editar Raza</h5>
                 <button id="btn-RegresarEditar" class="btn mb-3">
                     <i class="fas fa-arrow-left me-2"></i><i class="bi bi-back"></i> Regresar
                 </button>
                 <form id="formEditarRaza" class="needs-validation" novalidate>
                     <div class="mb-3">
                         <label for="txt_edit_raza" class="form-label text-custom-dark">Raza</label>
                         <input type="text" class="form-control" id="txt_edit_raza" required>
                         <div class="invalid-feedback">
                             Por favor ingrese la raza.
                         </div>
                     </div>
                     <button class="btn" id="btn-EditarRaza" type="submit">
                         <i class="fas fa-edit me-2"></i><i class="bi bi-floppy-fill"></i> Editar Raza
                     </button>
                 </form>
             </div>
         </div>
     </div>
 </div>