(function () {
    //------ LLAMADAS A FUNCIONES ------//
    listarTablaRaza();

    //-------------FUNCION LISTAR RAZA-----------------//
    function listarTablaRaza() {
        let objData = { "listarRaza": "ok" };
        let objTablaRaza = new Raza(objData);
        objTablaRaza.listarRaza();
    }

    //--------------BOTONES------------------//
    let btnAgregarRaza = document.getElementById("btn-AgregarRaza");
    btnAgregarRaza.addEventListener("click", () => {
        $("#panelTablaRaza").hide();
        $("#panelFormularioRaza").show();
    });


    let btnRegresar_formulario = document.getElementById("btn-Regresar");
    btnRegresar_formulario.addEventListener("click", () => {
        $("#panelFormularioRaza").hide();
        $("#panelTablaRaza").show();
    });


    let btnRegresarEditar = document.getElementById("btn-RegresarEditar");
    btnRegresarEditar.addEventListener("click", () => {
        $("#panelFormularioEditarRaza").hide();
        $("#panelTablaRaza").show();
    })

    //--------BOTON EDITAR RAZA ------------//
    $("#tablaRaza").on("click", "#btn-editar", function () {
        $("#panelTablaRaza").hide();
        $("#panelFormularioEditarRaza").show();

        let descripcionRaza = $(this).attr("descripcionRaza");
        let idraza = $(this).attr("raza");


        $("#txt_edit_raza").val(descripcionRaza);
        $("#btn-EditarRaza").attr('raza', idraza)
    })

    //--------------ELIMINAR RAZA------------------//

    $("#tablaRaza").on("click", "#btn-eliminar", function () {
        Swal.fire({
            title: "Esta usted seguro?",
            text: "Si confirma esta opción no podra recuperar el registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                let idraza = $(this).attr("raza");
                let objData = { "eliminarRaza": "ok", "idraza": idraza };
                let objRaza = new Raza(objData);
                objRaza.eliminarRaza();
            }
        });
    })


    //--------------AGREGAR RAZA-------------------//

    'use strict'

    const forms = document.querySelectorAll("#formRegistroRaza");

    Array.from(forms).forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault();
            if (!form.checkValidity()) {
                event.stopPropagation()
                form.classList.add('was-validated')
            } else {
                let descripcion_raza = document.getElementById("txt_raza").value;

                let objData = { "agregarRaza": "ok", "descripcion_raza": descripcion_raza }

                let objRaza = new Raza(objData);
                objRaza.agregarRaza();
            }
        }, false);
    });



    //---------------EDITAR RAZA---------------------//
    const formsEditar = document.querySelectorAll("#formEditarRaza");

    Array.from(formsEditar).forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault();
            if (!form.checkValidity()) {
                event.stopPropagation()
                form.classList.add('was-validated')
            } else {
                let descripcion_raza = document.getElementById("txt_edit_raza").value;
                
                let idraza = $("#btn-EditarRaza").attr("raza")

                let objData = { "editarRaza": "ok", "idraza": idraza, "descripcion_raza": descripcion_raza }

                let objRaza = new Raza(objData);
                objRaza.editarRaza();
            }
        }, false);
    });


})();