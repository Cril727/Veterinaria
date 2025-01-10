class Raza {

    constructor(objData) {
        this._objData = objData;
    }

    //---------LISTAR RAZA--------//

    listarRaza() {
        let objData = new FormData();
        objData.append("listarRaza", this._objData.listarRaza);

        fetch('controlador/razaControlador.php', {
            method: 'POST',
            body: objData
        })
            .then(response => response.json()).catch(error => {
                console.log(error);
            })
            .then ((response) => {
                console.log(response);

                if (response["codigo"] == "200") {

                    let dataset = [];

                    response["listarRaza"].forEach(item => {
                        let objBotones = '<div class="btn-group" role="group" aria-label="Basic example">';
                        objBotones += '<button id="btn-editar" type="button" class="btn btn-info" raza="' + item.idraza + '" descripcionRaza="' + item.descripcion_raza + '"><i class="bi bi-pen"></i></button>';
                        objBotones += '<button id="btn-eliminar" type="button" class="btn btn-danger" raza="' + item.idraza + '"><i class="bi bi-x"></i></button>';
                        objBotones += '</div>';

                        dataset.push([item.descripcion_raza, objBotones]);
                    });

                    $("#tablaRaza").DataTable({
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
                        data: dataset
                    });
                } else {
                    console.log("error");
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }




    //---------ELIMINAR RAZA---------//

    eliminarRaza() {
        let objData = new FormData();
        objData.append("eliminarRaza", this._objData.eliminarRaza);
        objData.append("idraza", this._objData.idraza);

        fetch('controlador/razaControlador.php', {
            method: 'POST',
            body: objData
        })

            .then(response => response.json()).catch(error => {
                console.log(error);
            })
            .then(response => {
                if (response["codigo"] == "200") {
                    this.listarRaza();
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



    //---------AGREGAR RAZA----------//


    agregarRaza() {
        let objDataRaza = new FormData();

        objDataRaza.append("agregarRaza", this._objData.agregarRaza)
        objDataRaza.append("descripcion_raza", this._objData.descripcion_raza)


        fetch('controlador/razaControlador.php', {
            method: 'POST',
            body: objDataRaza
        })

            .then(response => response.json()).catch(error => {
                console.log(error);
            })
            .then(response => {
                if (response["codigo"] == "200") {
                    let formulario = document.getElementById("formRegistroRaza")
                    formulario.reset();
                    $("#panelFormularioRaza").hide();
                    $("#panelTablaRaza").show();


                    this.listarRaza();

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response["mensaje"],
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                }else{
                    Swal.fire(response["mensaje"]);
                }
            })

    }



    //--------EDITAR RAZA---------//
    editarRaza(){
        let objDataRaza = new FormData();

        objDataRaza.append("editarRaza", this._objData.editarRaza)
        objDataRaza.append("descripcion_raza", this._objData.descripcion_raza)
        objDataRaza.append("idraza", this._objData.idraza)
        
        fetch('controlador/razaControlador.php', {
            method: 'POST',
            body: objDataRaza
        })
        .then(response => response.json()).catch(error => {
            console.log(error);
        })
        .then(response => {
            if (response["codigo"] == "200") { 
                let formularioEditar = document.getElementById("formEditarRaza");
                formularioEditar.reset();
                $("#panelFormularioEditarRaza").hide();
                $("#panelTablaRaza").show();

                this.listarRaza();

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
}