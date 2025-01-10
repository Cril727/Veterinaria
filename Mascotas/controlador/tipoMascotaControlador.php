<?php

include_once "../modelo/tipoMascotaModelo.php";


// parametros para consulta de la tabla

class tipoMascotaControlador{
    public $idtipo_mascota;
    public $descripcion;




    // ctr que llama a los valores 
    public function ctrListarTipoMascota (){
           $objRespuesta = tipoMascota::mdListarTipoMascota();
           echo json_encode($objRespuesta);
    }
  


    // ctr eliminar 
    public function ctrEliminarTipoMascota(){
        $objRespuesta = tipoMascota::mdlEliminarTipoMascota($this->idtipo_mascota);
        echo json_encode($objRespuesta);
    }


    // ctr Registrar
    public function ctrRegistrarTipoMascota(){
        $objRespuesta = tipoMascota::mdlRegistrarTipoMascota($this->descripcion);
        echo json_encode($objRespuesta);
    }
    

    // ctr editar
    public function ctrEditarTipoMascota(){
        $objRespuesta = tipoMascota::mldEditarTipoMascota($this->descripcion,$this->idtipo_mascota);
        echo json_encode($objRespuesta);
    }





}



if (isset($_POST["listarTablaTipoMascota"]) == "ok") {
    $objTipo = new tipoMascotaControlador();
    $objTipo->ctrListarTipoMascota();
}


if (isset($_POST["eliminarTipoMascota"]) == "ok") {
    $objTipo = new tipoMascotaControlador();
    $objTipo ->idtipo_mascota=$_POST['idtipo_mascota'];
    $objTipo->ctrEliminarTipoMascota();
}



if (isset($_POST["agregarTipoMascota"]) == "ok") {
    $objTipo = new tipoMascotaControlador();
    $objTipo ->descripcion = $_POST['descripcion'];
    $objTipo->ctrRegistrarTipoMascota();
}


if (isset($_POST["editarTipoMascota"]) == "ok"){
    $objTipo = new tipoMascotaControlador();
    $objTipo -> descripcion = $_POST['descripcion'];
    $objTipo -> idtipo_mascota=$_POST['idtipo_mascota'];
    $objTipo->ctrEditarTipoMascota();
}