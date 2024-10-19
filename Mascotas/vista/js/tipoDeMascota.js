(function() {

    function listarTablaTipoMascota(){ // funcion para tipos de mascotas 
        let objData= {"listarTipoMascota":"ok"};
        let objTablaTipoMascota = new tipoMascota(objData);
        objTablaTipoMascota.listarTablaTipoMascota();

    }

    let btnAgregarTipoMascota = document.getElementById("btn-AgregarTipoMascota"); // BOTONES PARA OCULTAR Y MOSTRAR EL SIGUIENTE FORMULARIO
    btnAgregarTipoMascota.addEventListener("click",()=>{
        $("#panelTablaTipoMascota").hide(); //  ocultar Tabla principal que conecta a la base de datos 
        $("#panelFormularioTipoMascota").show();// muestra el formulario para agregar un nuevo parametro

    })
    





})