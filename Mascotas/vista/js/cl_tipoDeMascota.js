class tipoMascota {      // clase TIPO MASCOTA CONTIENE TODO EL CONTENIDO DE TODO EL CL 

    constructor(objData) {    // constructor que va ha lleva la propiedad objData
        this._objData = objData;
    }

    listarTipoMascota() {
        let objData = new FormData(); // CREA ESTRUCTURAS DONDE VAMOS A AÑADIR LAS PROPIEDADES 
        objData.append("listarTablaTipoMascota", this._objData.listarTipoMascota);


        fetch("controlador/tipoMascotaControlador.php", { // PETICION POR POST ASINCRONA
            method: "POST",
            body: objData
        })
            .then(response => response.json()).catch(error => {
                console.log(error); 
            })

            .then(response => {

                console.log(response); // RESPUESTA DEL SERVIDOR
                
                if (response ["codigo"]=="200"){

                    let dataSet = [];


                    response["listarTablaTipoMascota"].forEach(item => {
                    let objBotones = '<div class="btn-group" role="group" aria-="Basic example">';
                                                
                    objBotones += '<button id="btnEditarTipo" type="button" class="btn btn-info" idtipo_mascota="'+item.idtipo_mascota+'" descripcion="'+item.descripcion+'"><i class="bi bi-pen"></i></button>';
                    objBotones += '<button id="btn-eliminarTipo" type="button" class="btn btn-danger" idtipo_mascota="'+item.idtipo_mascota+'"><i class="bi bi-x"></i></button>';                       
                    objBotones += '</div>';
   

                     dataSet.push([item.descripcion, objBotones]);

                    });
                    
                    $('#tablaTipoMascota').DataTable({
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


    eliminarTipoMascota(){
        let objData = new FormData(); // CREA ESTRUCTURAS DONDE VAMOS A AñADIR LAS PROPIEDADES 
        objData.append("eliminarTipoMascota", this._objData.eliminarTipoMascota);
        objData.append("idtipo_mascota",this._objData.idtipo_mascota);

        fetch('controlador/tipoMascotaControlador.php',{
            method: 'POST',
            body: objData

        })

        .then(response=> response.json()).catch(error=>{
            console.log(error);
        })
        .then(response=>{
            if(response["codigo"]=="200"){
                this.listarTipoMascota();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });

            } else {
                swal.fire(response["mensaje"]);
            }
        })
    }


    //
    agregarTipoMascota(){
        console.log(this._objData);    
        let objData = new FormData(); // CREA ESTRUCTURAS DONDE VAMOS A AñADIR LAS PROPIEDADES 
        objData.append("agregarTipoMascota", this._objData.agregarTipoMascota);
        objData.append("descripcion",this._objData.descripcion);

    

        fetch('controlador/tipoMascotaControlador.php',{
            method: 'POST',
            body: objData
        })

        .then(response => response.json()).catch(error=>{
               console.log(error);
        })
        .then(response=>{
            if(response["codigo"]=="200"){
                this.listarTipoMascota();
                let formulario=document.getElementById("formRegistroTipoMascota")
                formulario.reset();
                $("#panelFormularioTipoMascota").hide();            // ocultar el formulario para agregar un nuevo parametro
                $("#panelTablaTipoMascota").show(); 
                
                this.listarTipoMascota();

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });

          
            }else {
                Swal.fire(response["mensaje"]);
            }
        })
    }

    // editar Tipo Mascota

    editarTipoMascota(){
        let objDataTipoMascota = new FormData();

        objDataTipoMascota.append("editarTipoMascota", this._objData.editarTipoMascota);
        objDataTipoMascota.append("descripcion",this._objData.descripcion);
        objDataTipoMascota.append("idtipo_mascota",this._objData.idtipo_mascota);

        fetch('controlador/tipoMascotaControlador.php',{
            method: 'POST',
            body: objDataTipoMascota
        })
        .then(response => response.json()).catch(error=>{
            console.log(error);
        })
        .then(response=>{
            if(response["codigo"]==="200"){
                let formulario = document.getElementById("formEditarTipoMascota");
                formulario.reset();
                 $("#panelFormularioTipoMascotaEditar").hide();
                 $("#panelTablaTipoMascota").show();          // ocultar el formulario para agregar un nuevo parametro

                this.listarTipoMascota();

                Swal.fire({
                    position: "top-end",
                    icon: "sucess",
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