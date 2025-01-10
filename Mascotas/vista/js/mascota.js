(function () {
    listarMascota();
    
    function listarMascota() {
        let objData = {
            "mascota": "ok"
        };
        let objTablaMascota = new Mascota(objData);
        objTablaMascota.listarMascota();
    }

    let btnAgregarMascota = document.getElementById("btnAgregarMascota");
    btnAgregarMascota.addEventListener("click", () => {
        $("#panelTablaDeLaMascota").hide();
        $("#panelFormularioMascotas").show();
        const mascota = new Mascota({});
        mascota.cargarDropdowns();
    });

    let btnRegresarAgregarMascota = document.getElementById("btnRegresartableMascota");
    btnRegresarAgregarMascota.addEventListener("click", () => {
        $("#panelFormularioMascotas").hide();
        $("#panelTablaDeLaMascota").show();
    });

    $("#tablaMascota").on("click", "#btnEliminarMascota", function() {
        Swal.fire({
            title: "Esta usted seguro?",
            text: "Si confirma esta opción no podrá recuperar el registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                let idmascota = $(this).attr("idMascota");
                let objData = {
                    "eliminarMascota": "ok",
                    "idmascota": idmascota,
                };
                let objMascota = new Mascota(objData);
                objMascota.eliminarMascota();
            }
        });
    });

    'use strict';

    const formsAgregarMascota = document.querySelectorAll("#formAgregarMascota");
    Array.from(formsAgregarMascota).forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault();
            if (!form.checkValidity()) {
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                const mascota = new Mascota({});
                mascota.agregarMascota();
                listarMascota();
            }
        }, false);
    });

    $("#tablaMascota").on("click", "#btnEditarMascota", function() {
        const idMascota = $(this).attr("idMascota");
        fetch(`controlador/mascotaControlador.php?accion=obtenerMascota&idmascota=${idMascota}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("idMascotaEdit").value = data.mascota.idmascota;
                document.getElementById("nombreMascotaEdit").value = data.mascota.nombre;
                document.getElementById("edadMascotaEdit").value = data.mascota.edad;
                document.getElementById("usuarioMascotaEdit").value = data.mascota.usuario_idusuario;
                document.getElementById("tipoMascotaEdit").value = data.mascota.tipo_mascota_idtipo_mascota;
                document.getElementById("razaMascotaEdit").value = data.mascota.raza_idraza;

                $("#panelFormularioEditarMascota").show();
                $("#panelTablaDeLaMascota").hide();
            });
    });

    const formsEditarMascota = document.querySelectorAll("#formEditarMascota");
    Array.from(formsEditarMascota).forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault();
            if (!form.checkValidity()) {
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                const mascota = new Mascota({});
                mascota.editarMascota();
                listarMascota();
            }
        }, false);
    });
})();



