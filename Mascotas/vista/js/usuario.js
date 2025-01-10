(function() {
    //----Funciones-------//
    mostrarUsuario();
    
    // setTimeout(ActualizarPagina, 5000);

    function ActualizarPagina(){
        location.reload();
    }

    function mostrarUsuario(){
        let objData = {"mostrarUsuario" : "ok"};
        let objTablaUsuario = new Usuario(objData);
        objTablaUsuario.mostrarUsuario();
    }

    let btnAgregarUsuario = document.getElementById("btnAgregarUsuario");
    btnAgregarUsuario.addEventListener("click",()=>{
        $("#panelTablaUsuario").hide();
        $("#panelFormularioUsuario").show();
    })

    let btnRegresar = document.getElementById("btnRegresarUsuario");
    btnRegresar.addEventListener("click",()=>{
        $("#panelFormularioUsuario").hide();
        $("#panelTablaUsuario").show();
    })

    $("#btnRegresarEditar").click(() => {
        $("#panelFormularioEditarUsuario").hide();
        $("#panelTablaUsuario").show();
    });
/*
    document.getElementById("btnEditarUsuario").addEventListener("click", ()=>{
        $("#panelTablaUsuario").hide();
        $("#panelFormularioEditarUsuario").show();

        let documento = $(this).attr("documento");
        $("#txt_edit_documento").val(documento);

        let nombre = $(this).attr("nombre");
        $("#txt_edit_nombre").val(nombre);

        let apellido = $(this).attr("apellido");
        $("#txt_edit_apellido").val(apellido);

        let email = $(this).attr("email");
        $("#txt_edit_email").val(email);

        let idusuario = $(this).attr("usuario");
        $("#btnEditarUsuario").attr("usuario",idusuario);
    })
*/
    
    $("#tablaUsuario").on("click","#btnEditarUsuario",function(){
        $("#panelTablaUsuario").hide();
        $("#panelFormularioEditarUsuario").show();

        let documento = $(this).attr("documento");
        $("#txt_edit_documento").val(documento);

        let nombre = $(this).attr("nombre");
        $("#txt_edit_nombre").val(nombre);

        let apellido = $(this).attr("apellido");
        $("#txt_edit_apellido").val(apellido);

        let email = $(this).attr("email");
        $("#txt_edit_email").val(email);

        let idusuario = $(this).attr("usuario");
        $("#btnEditarUsuario").attr("usuario",idusuario);
    })
    

    $("#tablaUsuario").on("click" ,"#btnEliminarUsuario",function(){
        Swal.fire({
            title: "Esta usted seguro?",
            text: "Si confirma esta opción no podra recuperar el registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        })
        .then((result) => {
            if (result.isConfirmed) {
                let idusuario = $(this).attr("usuario");
                let objData = {
                    "eliminarUsuario":"ok",
                    "idusuario" :idusuario,
                    "listarUsuario":"ok"
                };
                    
                let objUsuario = new Usuario(objData);
                objUsuario.eliminarUsuario();
            }
        });
    })

    'use strict'

    const formsUsuario = document.querySelectorAll("#formUsuario");

    Array.from(formsUsuario).forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault()
            if (!form.checkValidity()) {
                event.stopPropagation()
                form.classList.add('was-validated')
            } else {
                let documento = document.getElementById("txt_documento").value;
                let nombre = document.getElementById("txt_nombre").value;
                let apellido = document.getElementById("txt_apellido").value;
                let email = document.getElementById("txt_email").value;

                let objData = {
                    "registrarUsuario": "ok",
                    "documento": documento,
                    "nombre": nombre,
                    "apellido": apellido,
                    "email": email,
                    "mostrarUsuario": "ok"
                }

                let objUsuario = new Usuario(objData);
                objUsuario.registarUsuario();
            }
        }, false)
    })

    const formsEditarUsuario = document.querySelectorAll("#formEditarUsuario");

    Array.from(formsEditarUsuario).forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault()
            if (!form.checkValidity()) {
                event.stopPropagation()
                form.classList.add('was-validated')
            } else {
                let documento = document.getElementById("txt_edit_documento").value;
                let nombre = document.getElementById("txt_edit_nombre").value;
                let apellido = document.getElementById("txt_edit_apellido").value;
                let email = document.getElementById("txt_edit_email").value;
                let idUsuario = $("#btnEditarUsuario").attr("usuario");

                let objData = {
                    "editarUsuario": "ok",
                    "documento": documento,
                    "nombre": nombre,
                    "apellido": apellido,
                    "email": email,
                    "idUsuario":idUsuario,
                    "mostrarUsuario": "ok"
                }

                let objUsuario = new Usuario(objData);
                objUsuario.editarUsuario();
            }
        }, false)
    })
})();