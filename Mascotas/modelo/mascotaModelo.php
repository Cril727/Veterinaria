<?php

include_once "conexion.php";

class mascotaModelo {
    public static function mdlListarMascota() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare(
                "SELECT mascota.idmascota, mascota.nombre, mascota.edad, usuario.nombre as usuario, tipo_mascota.descripcion, raza.descripcion_raza
                 FROM mascota 
                 JOIN usuario ON usuario.idusuario = mascota.usuario_idusuario
                 JOIN tipo_mascota on tipo_mascota.idtipo_mascota = mascota.tipo_mascota_idtipo_mascota
                 JOIN raza ON raza.idraza=mascota.raza_idraza"
            );
            $objRespuesta->execute();
            $listarMascota = $objRespuesta->fetchAll();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "listarMascota" => $listarMascota);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlEliminarMascota($idmascota) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM mascota WHERE idmascota = :idmascota");
            $objRespuesta->bindParam(":idmascota", $idmascota);
            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "La mascota fue eliminada correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "La mascota no se pudo eliminar");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlAgregarMascota($nombre, $edad, $usuario_idusuario, $tipo_mascota_idtipo_mascota, $raza_idraza) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare(
                "INSERT INTO mascota (nombre, edad, usuario_idusuario, tipo_mascota_idtipo_mascota, raza_idraza) 
                 VALUES (:nombre, :edad, :usuario_idusuario, :tipo_mascota_idtipo_mascota, :raza_idraza)"
            );
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":edad", $edad);
            $objRespuesta->bindParam(":usuario_idusuario", $usuario_idusuario);
            $objRespuesta->bindParam(":tipo_mascota_idtipo_mascota", $tipo_mascota_idtipo_mascota);
            $objRespuesta->bindParam(":raza_idraza", $raza_idraza);
            
            if ($objRespuesta->execute()) 
                $mensaje = array("codigo" => "200", "mensaje" => "Mascota agregada correctamente");
            else
                $mensaje = array("codigo" => "401", "mensaje" => "Error al agregar la mascota");
            
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlEditarMascota($idmascota, $nombre, $edad, $usuario_idusuario, $tipo_mascota_idtipo_mascota, $raza_idraza) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare(
                "UPDATE mascota SET nombre = :nombre, edad = :edad, usuario_idusuario = :usuario_idusuario, 
                 tipo_mascota_idtipo_mascota = :tipo_mascota_idtipo_mascota, raza_idraza = :raza_idraza 
                 WHERE idmascota = :idmascota"
            );
            $objRespuesta->bindParam(":idmascota", $idmascota);
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":edad", $edad);
            $objRespuesta->bindParam(":usuario_idusuario", $usuario_idusuario);
            $objRespuesta->bindParam(":tipo_mascota_idtipo_mascota", $tipo_mascota_idtipo_mascota);
            $objRespuesta->bindParam(":raza_idraza", $raza_idraza);
            
            if ($objRespuesta->execute())
                $mensaje = array("codigo" => "200", "mensaje" => "Mascota actualizada correctamente");
            else
                $mensaje = array("codigo" => "401", "mensaje" => "Error al actualizar la mascota");
            
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlListarUsuarios() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT idusuario, nombre FROM usuario");
            $objRespuesta->execute();
            $usuarios = $objRespuesta->fetchAll();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "usuarios" => $usuarios);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlListarTipos() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT idtipo_mascota, descripcion FROM tipo_mascota");
            $objRespuesta->execute();
            $tipos = $objRespuesta->fetchAll();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "tipos" => $tipos);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlListarRazas() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT idraza, descripcion_raza FROM raza");
            $objRespuesta->execute();
            $razas = $objRespuesta->fetchAll();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "razas" => $razas);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlObtenerMascota($idmascota) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare(
                "SELECT * FROM mascota WHERE idmascota = :idmascota"
            );
            $objRespuesta->bindParam(":idmascota", $idmascota);
            $objRespuesta->execute();
            $mascota = $objRespuesta->fetch();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "mascota" => $mascota);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}