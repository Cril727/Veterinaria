<?php

include_once "conexion.php";

class usuarioModelo{
    public static function mdlmostrarUsuario(){
        $message = array();
        
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario");
            $objRespuesta->execute();
            $listaUsuario = $objRespuesta->fetchAll();
            $objRespuesta = null;
            
            $message = array("codigo"=>"200", "listaUsuario"=>$listaUsuario);
        } catch (Exception $e) {
            $message = array("codigo"=>"400", $e->getMessage());
        }

        return $message;
    }

    public static function mdleliminarUsuario($idusuario){
        $message = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM usuario WHERE idusuario = :idusuario");
            $objRespuesta->bindParam(":idusuario", $idusuario);
            if($objRespuesta->execute()){
                $message = array("codigo"=>"200", "mensaje"=>"El usuario fue eliminado correctamente");
            } else {
                $message = array("codigo"=>"401", "mensaje"=>"El usuario no se pudo eliminar");
            }
        } catch (Exception $e) {
            $message = array("codigo"=>"401", $e->getMessage());
        }

        return $message;
    }

    public static function mdlCrearUsuario($documento, $nombre, $apellido, $email){
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario (documento, nombre, apellido, email) VALUES (:documento, :nombre, :apellido, :email)");
            $objRespuesta->bindParam(":documento", $documento);
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":apellido", $apellido);
            $objRespuesta->bindParam(":email", $email);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Usuario creado correctamente.");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al crear el usuario.");
            }
            $objRespuesta = null;
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }

        return $mensaje;
    }

    public static function mdlEditarUsuario($documento, $nombre, $apellido, $email, $idusuario){
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE usuario SET documento=:documento, nombre=:nombre, apellido=:apellido, email=:email WHERE idusuario=:idusuario");
            $objRespuesta->bindParam(":documento", $documento);
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":apellido", $apellido);
            $objRespuesta->bindParam(":email", $email);
            $objRespuesta->bindParam(":idusuario", $idusuario);
            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Usuario actualizado correctamente.");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al actualizar el usuario.");
            }
            $objRespuesta = null;
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

}