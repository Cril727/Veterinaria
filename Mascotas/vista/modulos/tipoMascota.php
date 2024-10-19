<div class="container">
    
        <!-- JOUNBUTRON-->
        <div class="p-5 mb-4 bg-light rounded-3"  style="background-color: #4CAF50; color: blue;" >
        <div class="container-fluid py-5" >
            <h1 class="display-5 fw-bold" style="color:black" >CRUD TIPO MASCOTA</h1>
            <p class="col-md-8 fs-4" style="color:black"style="color:black" >
                Tipo de mascota
            </p>
        </div>
    </div>


<!--FORMULARIO PRINCIPAL-->
    <div id="panelTablaTipoMascota" class="row mt-2">
        <div class="col-md-12">
            <button id="btn-AgregarTipoMascota" class="btn btn-primary mb-3">Agregar tipo mascota</button>

            <div class="table-responsive">
                <table id="tablaTipoMascota" class="table table-hover" style="width: 100%">
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
            <button id="btn-Regresar" class="btn btn-primary mb-3">Regresar</button>
            <div class="row">
                <div class="col-md-6 offset-md-4"> <!-- empuja la tabla 4 espcios--->


                <form id="formRegistroTipoMascota"class="row g-3 needs-validation" novalidate> <!--mira la validacion que todos esten con validacion -->
                     <div class="col-md-6">
                        
                        <label for="txt_tipo" class="form-label" style="text-align: start">Tipo</label>
                         <input type="text" class="form-control" id="txt_tipo" required>
                        <div class="invalid-feedback">
                     Por favor ingrese el tipo de mascota
                     </div>
                    </div>







</div>