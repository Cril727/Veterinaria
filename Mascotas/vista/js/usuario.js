(function() {
    //----Funciones-------//
    
    setTimeout(ActualizarPagina, 5000);

    function ActualizarPagina(){
        location.reload();
    }

    function mostrarUsuario(){
        let objData = {
            "mostrarUsuario" : "ok"
        }
        let objTablaUsuario = new Usuario(objData);
        objTablaUsuario.mostrarUsuario()
    }
})