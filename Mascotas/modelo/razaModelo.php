<?php

include_once "conexion.php";

class RazaModelo {

    // 
    public static function mdlListarRaza() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("select * from raza");
            $objRespuesta->execute();
            $listarRaza = $objRespuesta->fetchAll();
            $objRespuesta = null;
            $mensaje = array("codigo"=>"200","listarRaza"=>$listarRaza);
            
        }catch(Exception $e){
            $mensaje = array("codigo"=>"401","mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}