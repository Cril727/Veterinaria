(function() {

    
    //------ LLAMADAS A FUNCIONES ------//
    listarTablaRaza();
    



    //-------------FUNCIONES-----------------//

    function listarTablaRaza() {

        let objData = {"listarRaza" : "ok"} 
        let objTablaRaza = new Raza(objData);
        objTablaRaza.listarRaza();
    }


    

    //--------------BOTONES------------------//

    let btnAgregarRaza = document.getElementById("btn-AgregarRaza");
    btnAgregarRaza.addEventListener("click", () => {
        $("#panelTablaRaza").hide();
        $("#panelFormularioRaza").show();
    })

})

