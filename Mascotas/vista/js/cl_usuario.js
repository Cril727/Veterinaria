class Usuario {

    //-----------------------CONSTRUCTOR---------------------------
    constructor(objData) {
        this._objData = objData;
    }
    //----------------METODO MOSTRAR USUARIO-----------------------
    mostrarUsuario() {
        let objData = new FormData();
        objData.append("mostrarUsuario", this._objData.mostrarUsuario)

        fetch("controlador/usuarioControlador.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json()).catch(error => {
                console.log(error);
            })
            .then((response) => {
                console.log(response)

                if (response["codigo"] == "200") {
                    let dataSet = [];
                    response["listaUsuario"].forEach(element => {
                        let objBotones = '<div class="btn-group" role="group">';
                        objBotones += '<button id="btnEditarUsuario" type="button" class="btn btn-info" usuario="' + element.idusuario + '"  documento="' + element.documento + '" nombre="' + element.nombre + '" apellido="'+ element.apellido + '" email="' + element.email + '"><i class="bi bi-pen"></i></button>';
                        objBotones += '<button id="btnEliminarUsuario" type="button" class="btn btn-danger" usuario="' + element.idusuario + '"><i class="bi bi-x"></i></button>';
                        objBotones += '</div>';
                        dataSet.push([element.documento, element.nombre + " " + element.apellido, element.email, objBotones]);
                    });

                    $('#tablaUsuario').DataTable({
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
                    console.log("error")
                }
            })
    }

    eliminarUsuario() {
        let objData = new FormData();
        objData.append("eliminarUsuario", this._objData.eliminarUsuario);
        objData.append("idusuario", this._objData.idusuario);

        fetch("controlador/usuarioControlador.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json()).catch(error => {
                console.log(error);
            })
            .then(response => {
                if (response["codigo"] == "200") {
                    this.mostrarUsuario();
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
            })
    }

    registarUsuario() {
        let objData = new FormData();
        objData.append("registrarUsuario", this._objData.registrarUsuario);
        objData.append("documento", this._objData.documento)
        objData.append("nombre", this._objData.nombre);
        objData.append("apellido", this._objData.apellido);
        objData.append("email", this._objData.email);

        fetch("controlador/usuarioControlador.php", {
            method: 'POST',
            body: objData
        })
            .then(response => response.json()).catch(error => {
                console.log(error);
            })
            .then(response => {
                console.log(response)
                if (response["codigo"] == "200") {
                    let formulario = document.getElementById('formUsuario');
                    formulario.reset();

                    document.getElementById('panelFormularioUsuario').style.display = "none";
                    document.getElementById('panelTablaUsuario').style.display = "block";

                    this.mostrarUsuario();

                    Swal.fire({
                        position: "top-end",
                        icon: "sucess",
                        title: response["mensaje"],
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire(response["mensaje"])
                }
            })
    }

    editarUsuario(){
        let objData = new FormData();
        objData.append("editarUsuario",this._objData.editarUsuario);
        objData.append("documento", this._objData.documento);
        objData.append("nombre",this._objData.nombre);
        objData.append("apellido", this._objData.apellido);
        objData.append("email", this._objData.email);
        objData.append("idusuario", this._objData.idUsuario);

        fetch("controlador/usuarioControlador.php",{
            method: 'POST',
            body: objData
        })
            .then(response => response.json()).catch(error => {
            console.log(error);
        })
            .then(response =>{
                if (response["codigo"] == "200"){
                    let formulario = document.getElementById('formEditarUsuario');
                    formulario.reset();

                    document.getElementById('panelFormularioEditarUsuario').style.display = "none";
                    document.getElementById('panelTablaUsuario').style.display = "block";

                    this.mostrarUsuario();

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response["mensaje"],
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire(response["mensaje"])
                }
            })
    }
}