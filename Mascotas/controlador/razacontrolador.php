<?php

include_once "../modelo/razaModelo.php";


class razaControlador{

    public $idraza;
    public $descripcion_raza;

    public function ctrListarRaza(){
        $objRespuesta = RazaModelo::mdlListarRaza();
        echo json_encode($objRespuesta);
    }
    
}



if (isset($_POST["listarRaza"]) == "ok"){
    $objRaza = new razaControlador();
    $objRaza -> ctrListarRaza();
}