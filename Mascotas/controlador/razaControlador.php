<?php

include_once "../modelo/razaModelo.php";

class razaControlador {
    public $idraza;
    public $descripcion_raza;


    public function ctrListarRaza() {
        $objRespuesta = RazaModelo::mdlListarRaza();
        echo json_encode($objRespuesta);
    }


    public function ctrEliminarRaza(){
        $objRespuesta = RazaModelo::mdlEliminarRaza($this->idraza);
        echo json_encode($objRespuesta);
    }


    public function ctrAgregarRaza(){
        $objRespuesta = RazaModelo::mdlAgregarRaza($this->descripcion_raza);
        echo json_encode($objRespuesta);
    }


    public function ctrEditarRaza(){
        $objRespuesta = RazaModelo::mdlEditarRaza( $this->descripcion_raza,$this->idraza);
        echo json_encode($objRespuesta);
    }
}


if (isset($_POST["listarRaza"]) == "ok") {
    $objRaza = new razaControlador();
    $objRaza->ctrListarRaza();
}
    
if(isset($_POST["eliminarRaza"]) == "ok"){
    $objRaza = new razaControlador();
    $objRaza-> idraza = $_POST['idraza'];
    $objRaza->ctrEliminarRaza();
}

if(isset($_POST["agregarRaza"]) == "ok"){
    $objRaza = new razaControlador();
    $objRaza->descripcion_raza = $_POST['descripcion_raza'];
    $objRaza->ctrAgregarRaza();
}

if(isset($_POST["editarRaza"]) == "ok"){
    $objRaza = new razaControlador();
    $objRaza->descripcion_raza = $_POST['descripcion_raza'];
    $objRaza->idraza = $_POST['idraza'];
    $objRaza->ctrEditarRaza();
}