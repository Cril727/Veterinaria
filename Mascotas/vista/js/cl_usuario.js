class Usuario{
    constructor(objData){
        this._objData = objData;
    }
    
    mostrarUsuario(){
        let objData = FormData();
        objData.append("mostrarUsuario", this._objData.mostrarUsuario)

        fetch("controlador/usuarioControlador.php",{
            method: "POST",
            body: objData
        })
        .then(response => response.json()).catch(error => {
            console.log(error);
        })
        .then(response =>{
            if(response["codigo"] = "200") {
                
            }
        })
    }
}