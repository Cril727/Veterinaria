class Mascota {
    constructor(objData) {
        this._objData = objData;
    }

    listarMascota() {
        let objData = new FormData();
        objData.append("listarMascota", this._objData.mascota);
        fetch("controlador/mascotaControlador.php", {
            method: 'POST',
            body: objData
        })
        .then(response => response.json())
        .catch(error => {
            console.log(error);
        })
        .then(response => {
            console.log(response);

            if (response["codigo"] == "200") {
                let dataSet = [];

                response["listarMascota"].forEach(item => {
                    let objBotones = '<div class="btn-group" role="group">';
                    objBotones += '<button id="btnEditarMascota" type="button" class="btn btn-info" idMascota="' + item.idmascota + '" nombre="' + item.nombre + '" edad="' + item.edad + '" nombreMascota="' + item.nombre_mascota + '" descripcion_tipo="' + item.descripcion + '" raza="'+item.raz+'"  ><i class="bi bi-pen"></i></button>';
                    objBotones += '<button id="btnEliminarMascota" type="button" class="btn btn-danger" idMascota="' + item.idmascota + '"><i class="bi bi-x"></i></button>';
                    objBotones += '</div>';

                    dataSet.push([item.nombre,item.edad,item.usuario,item.descripcion,item.descripcion_raza,objBotones]);
                });

                $("#tablaMascota").DataTable({
                    buttons: [{
                        extend: "colvis",
                        text: "Columnas"
                        
                    },
                    "excel",
                    "pdf",
                    "print"
                    ],
                    dom: "Bfrtip",
                    responsive: true,
                    destroy: true,

                    data: dataSet
                });
            } else {
                console.log("error");
            }
        })
        .catch((error) => {
            console.log('Error:' + error);
        });
    }

    eliminarMascota() {
        let objData = new FormData();
        objData.append("eliminarMascota", this._objData.eliminarMascota);
        objData.append("idmascota", this._objData.idmascota);

        fetch("controlador/mascotaControlador.php", {
            method: "POST",
            body: objData
        })
        .then(response => response.json())
        .catch(error => {
            console.log(error);
        })
        .then(response => {
            if (response["codigo"] == "200") {
                this.listarMascota();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire(response["mensaje"]);
            }
        });
    }

    cargarDropdowns() {
        fetch("controlador/mascotaControlador.php?accion=listarUsuarios")
            .then(response => response.json())
            .then(data => {
                const usuarios = data.usuarios;
                const selectUsuarios = document.querySelectorAll("#usuarioMascota, #usuarioMascotaEdit");
                selectUsuarios.forEach(select => {
                    select.innerHTML = '<option value="">Seleccione un usuario</option>';
                    usuarios.forEach(usuario => {
                        select.innerHTML += `<option value="${usuario.idusuario}">${usuario.nombre}</option>`;
                    });
                });
            });

        fetch("controlador/mascotaControlador.php?accion=listarTipos")
            .then(response => response.json())
            .then(data => {
                const tipos = data.tipos;
                const selectTipos = document.querySelectorAll("#tipoMascota, #tipoMascotaEdit");
                selectTipos.forEach(select => {
                    select.innerHTML = '<option value="">Seleccione un tipo</option>';
                    tipos.forEach(tipo => {
                        select.innerHTML += `<option value="${tipo.idtipo_mascota}">${tipo.descripcion}</option>`;
                    });
                });
            });

        fetch("controlador/mascotaControlador.php?accion=listarRazas")
            .then(response => response.json())
            .then(data => {
                const razas = data.razas;
                const selectRazas = document.querySelectorAll("#razaMascota, #razaMascotaEdit");
                selectRazas.forEach(select => {
                    select.innerHTML = '<option value="">Seleccione una raza</option>';
                    razas.forEach(raza => {
                        select.innerHTML += `<option value="${raza.idraza}">${raza.descripcion_raza}</option>`;
                    });
                });
            });
    }

    agregarMascota() {
        const formData = new FormData();
        formData.append("agregarMascota", "ok");
        formData.append("nombre", document.getElementById("nombreMascota").value);
        formData.append("edad", document.getElementById("edadMascota").value);
        formData.append("usuario_id", document.getElementById("usuarioMascota").value);
        formData.append("tipo_id", document.getElementById("tipoMascota").value);
        formData.append("raza_id", document.getElementById("razaMascota").value);

        fetch("controlador/mascotaControlador.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(response => {
            if (response.codigo == "200") {
                $("#panelFormularioMascotas").hide();
                $("#panelTablaDeLaMascota").show();
                this.listarMascota();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById("formAgregarMascota").reset();
            } else {
                Swal.fire(response.mensaje);
            }
        });
    }

    editarMascota() {
        const formData = new FormData();
        formData.append("editarMascota", "ok");
        formData.append("idmascota", document.getElementById("idMascotaEdit").value);
        formData.append("nombre", document.getElementById("nombreMascotaEdit").value);
        formData.append("edad", document.getElementById("edadMascotaEdit").value);
        formData.append("usuario_id", document.getElementById("usuarioMascotaEdit").value);
        formData.append("tipo_id", document.getElementById("tipoMascotaEdit").value);
        formData.append("raza_id", document.getElementById("razaMascotaEdit").value);

        fetch("controlador/mascotaControlador.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(response => {
            if (response.codigo == "200") {
                $("#panelFormularioEditarMascota").hide();
                $("#panelTablaDeLaMascota").show();
                this.listarMascota();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire(response.mensaje);
            }
        });
    }
}
