<?php

include_once "conexion.php";

class RazaModelo {

    //-----------MODELO LISTAR RAZA---------------//
    public static function mdlListarRaza() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM raza");
            $objRespuesta->execute();
            $listarRaza = $objRespuesta->fetchAll();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "listarRaza" => $listarRaza);
        } catch(Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
    

    //-----------MODELO ELIMINAR RAZA---------------//
    public static function mdlEliminarRaza($idraza) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM raza WHERE idraza=:idraza");
            $objRespuesta->bindParam(":idraza", $idraza);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "La raza se eliminó correctamente.");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al eliminar la raza.");
            }
            $objRespuesta = null;
            
        } catch(Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje; 
    }



    //-------------MODELO AGREGAR RAZA---------//
    
    public static function mdlAgregarRaza($descripcion_raza){
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO raza (descripcion_raza)  VALUES (:descripcion_raza)");
            $objRespuesta->bindParam(":descripcion_raza",$descripcion_raza);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "La raza se a agregado correctamente.");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al agregar la raza.");
            }
            $objRespuesta = null;
        } catch (Exception $e) {
            $mensaje = array("code"=>"400", $e->getMessage());
        }
        return $mensaje;
    }



    //-----------MODELO EDITAR RAZA------------//

    public static function mdlEditarRaza($descripcion_raza, $idraza){
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE raza SET descripcion_raza=:descripcion_raza WHERE idraza=:idraza");
            $objRespuesta->bindParam(":descripcion_raza", $descripcion_raza);
            $objRespuesta->bindParam(":idraza", $idraza);
            
            if($objRespuesta->execute()){
                $mensaje = array("codigo" => "200", "mensaje" => "La raza se editó correctamente.");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al editar la raza.");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "400", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}



