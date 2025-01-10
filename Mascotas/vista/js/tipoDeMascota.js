(function() {

  listarTablaTipoMascota();

  function listarTablaTipoMascota(){ // funcion para tipos de mascotas 
      let objData= {"listarTipoMascota":"ok"}; //verificamos que venga con el "ok"
      let objTablaTipoMascota = new tipoMascota(objData);
      objTablaTipoMascota.listarTipoMascota();
  }


              // botones para ocultar y demas
  let btnAgregarTipoMascota = document.getElementById("agregarTipoMascota"); // BOTONES PARA OCULTAR Y MOSTRAR EL SIGUIENTE FORMULARIO}
  btnAgregarTipoMascota.addEventListener("click",()=>{
  $("#panelTablaTipoMascota").hide();                   //  ocultar Tabla principal que conecta a la base de datos 
  $("#panelFormularioTipoMascota").show();            // muestra el formulario para agregar un nuevo parametro
  })

  let btnRegresarTipo= document.getElementById("btn-RegresarTipo");
  btnRegresarTipo.addEventListener("click",()=>{
  $("#panelFormularioTipoMascota").hide();            // ocultar el formulario para agregar un nuevo parametro
  $("#panelTablaTipoMascota").show();                   // muestra la Tabla principal que conecta a la base de datos
  })


  let btnFormRegresarEditar= document.getElementById("btnRegresarTipo");
  btnFormRegresarEditar.addEventListener("click",()=>{
    $("#panelFormularioTipoMascotaEditar").hide();
    $("#panelTablaTipoMascota").show();
  })

// editar formulario

 
$("#tablaTipoMascota").on("click", "#btnEditarTipo", function () {
$("#panelTablaTipoMascota").hide();
$("#panelFormularioTipoMascotaEditar").show();



  let descripcion = $(this).attr("descripcion");
  $('#txt_tipoEditar').val(descripcion);

  let idtipo_mascota = $(this).attr("idtipo_mascota");
  $("#btnEditarTipo").attr('idtipo_mascota',idtipo_mascota)

})


// ELIMINAR USUAARIO 


  $("#tablaTipoMascota").on("click","#btn-eliminarTipo",function(){
      Swal.fire({
          title: "Esta usted seguro?",
          text: "Si confirma esta opción no podra recuperar el registro!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar"
      }).then((result)=>{
          if(result.isConfirmed){
              let idtipo_mascota=$(this).attr("idtipo_mascota")
              let objData = {"eliminarTipoMascota": "ok", "idtipo_mascota":idtipo_mascota,"listarTipoMascota":"ok"};
              let objTipo = new tipoMascota(objData);
              objTipo.eliminarTipoMascota();
          
          }
      })
  });


  // AGREGAR USUARIO
  
  'use srict' // bootstrap 

  const formsAgregar = document.querySelectorAll('#formRegistroTipoMascota') // se lleva todo el formulario para ingresar a la persona 

  Array.from(formsAgregar).forEach(form => {  // recorre el formulario 
      form.addEventListener('submit', event => { // sumit es el que valida el formulario


          event.preventDefault()
        if (!form.checkValidity()) { // se esta validando el formulario atraves del checkvalidity 
          event.stopPropagation()
          form.classList.add('was-validated')
        } else {
            let descripcion=document.getElementById('txt_tipo').value; // Si la validacion estuvo bien 
          

            let objData = { "agregarTipoMascota": "ok", "descripcion": descripcion, "listarTipoMascota": "ok" } // registra los let con los calues para constatar que todo funcione con el metodo listar data "reutilizando"

              let objTipo= new tipoMascota(objData);// llamamos al usuario con el obj data 
              objTipo.agregarTipoMascota(); // LLAMAMOS AL USUARIO CON LA CLASE CL USUARIO


        }
  
          // comprueba si los imput estan en el formulario 
      }, false)
    }) 


      // EDITAR
      
      
      const formsEditarTipo = document.querySelectorAll('#formEditarTipoMascota') // se lleva todo el formulario para ingresar a la persona 

     Array.from(formsEditarTipo).forEach(form => {  // recorre el formulario 
      form.addEventListener('submit', event => { // sumit es el que valida el formulario
          event.preventDefault()
          if (!form.checkValidity()) { // se esta validando el formulario atraves del checkvalidity 
              event.stopPropagation()
              form.classList.add('was-validated')
          } else {
              let descripcion=document.getElementById('txt_tipoEditar').value; // Si la validacion estuvo bien 
             let idTipo = $('#btnEditarTipo').attr("idtipo_mascota")
              let objData = { "editarTipoMascota": "ok","idtipo_mascota":idTipo, "descripcion": descripcion, "listarTipoMascota": "ok" } // registra los let con los calues para constatar que todo funcione con el metodo listar data "reutilizando"

              let objTipo= new tipoMascota(objData);// llamamos al usuario con el obj data 
              objTipo.editarTipoMascota(); // LLAMAMOS AL USUARIO CON LA CLASE CL USUARIO


        }
  
          // comprueba si los imput estan en el formulario 
      }, false)
    }) 


      


 
})();