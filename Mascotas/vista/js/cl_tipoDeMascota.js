class tipoMascota{      // clase TIPO MASCOTA CONTIENE TODO EL CONTENIDO DE TODO EL CL 

    constructor(objData){    // constructor que va ha lleva la propiedad objData
        this._objData = objData;
    }

   listarTipoMascota(){   
        let objData = new FormData(); // CREA ESTRUCTURAS DONDE VAMOS A AÑADIR LAS PROPIEDADES 
        objData.append("listarTipoMascota", this._objData.listarTipoMascota); 


        fetch("controlador/tipoMascotaControlador.php",{ // PETICION POR POST ASINCRONA
            method: "POST",
            body: objData
        })
        .then(response => response.json()).catch(error=>{
            console.log(Error);
        })

   }
    
}
