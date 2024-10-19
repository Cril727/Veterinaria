<div class="container">

    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Raza</h1>
            <p class="col-md-8 fs-4">
                Aqui se agregan las razas.
            </p>
        </div>
    </div>


    <div id="panelTablaRaza" class="row mt-2">
        <div class="col-md-12">
            <button id="btn-AgregarRaza" class="btn btn-primary mb-3">Agregar Raza</button>

            <div class="table-responsive">
                <table id="tablaRaza" class="table table-hover" style="width: 100%">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Descripcion raza</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div id="panelFormularioRaza" class="row" style="display: none;">
        <div class="col-md-12">
            <button id="btn-Regresar" class="btn btn-danger mb-3">Regresar</button>
            <div class="row">
                <div class="col-md-6 offset-md-4"> <!-- empuja la tabla 4 espcios--->


                    <form id="formRegistroRaza" class="row g-3 needs-validation" novalidate> <!--mira la validacion que todos esten con validacion -->

                        <div class="col-md-6">
                            <label for="txt_raza" class="form-label">Raza</label>
                            <input type="number" class="form-control" id="txt_raza" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su documento.
                            </div>

                        </div>
                       
                        <div class="col-12">
                            <button class="btn btn-primary" id="btn-RegistrarRaza" type="submit">Registrar Raza</button>
                        </div>


                    </form>

                </div>

            </div>


        </div>
    </div>