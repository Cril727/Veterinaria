class Raza {

    constructor(){
        this.objData = objData
    }

    listarRaza(){
        let objData = new FormData();
        objData.append("listarRaza", this.objData.listarRaza);

        fetch('http://localhost:8080/api/raza/listar', {
            method: 'POST',
            body: this.objData
        })
        .then(response => response.json())
        .catch((error) => {
             console.error('Error:', error);
        })
        .then((response) =>{
            console.log(response);

            if (response["codigo"] == "200") {

                let dataSet = [];

                response["listarRaza"].forEach(item => {
                    let objBotones = '<div class="btn-group" role="group" aria-label="Basic example">';
                    objBotones += '<button id="btn-editar" type="button" class="btn btn-info" raza="' + item.idraza + '" descripcionRaza="'+item.descripcion_raza+'"><i class="bi bi-pen"></i></button>';
                    objBotones += '<button id="btn-eliminar" type="button" class="btn btn-danger" raza="' + item.idraza + '"><i class="bi bi-x"></i></button>';
                    objBotones += '</div>';

                    dataSet.push([ item.descripcion_raza, objBotones]);
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
                    data: dataSet
                });
            } else {
                console.log("error");
            }
        })
        
    }



}
