<?php

include_once "conexion.php";

// MODELO LISTAR TIPO DE MASCOTA 


class tipoMascota{

    public static function mdListarTipoMascota(){
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM tipo_mascota");
            $objRespuesta->execute();                                                       // ejecuta la consuta 
            $listaTipoMascota = $objRespuesta->fetchAll();                                      // obtiene los datos de la consulta
            $objRespuesta = null;                                                                  // cierra la conexion 
            $mensaje = array("codigo" => "200", "listarTablaTipoMascota" => $listaTipoMascota);
        } catch (Exception $e) {                                                                    // Maneja la respuesta si llegasdo el caso exista algun error 

            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    // ELIMINAR 

    public static function mdlEliminarTipoMascota()
    {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM tipo_mascota WHERE idtipo_mascota=:idtipo_mascota");
            $objRespuesta->bindParam(":idtipo_mascota", $_POST["idtipo_mascota"]);
            $objRespuesta->execute();
            $objRespuesta = null;
            $mensaje = array("codigo" => "200", "mensaje" => "Tipo de mascota eliminado exitosamente");
        } catch (Exception $e) {

            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    // agregar 

    public static function mdlRegistrarTipoMascota($descripcion)
    {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO tipo_mascota (descripcion) VALUES (:descripcion)");
            $objRespuesta->bindParam(":descripcion", $descripcion);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "El usuario se ha registrado correctamente.");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al registrar al usuario.");
            }
            $objRespuesta = null;
        } catch (Exception $e) {

            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    // editar

    public static function mldEditarTipoMascota($descripcion,$idtipo_mascota)
    {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE tipo_mascota SET descripcion=:descripcion WHERE idtipo_mascota=:idtipo_mascota");
            $objRespuesta->bindParam(":descripcion", $descripcion);
            $objRespuesta->bindParam(":idtipo_mascota", $idtipo_mascota);


            if ($objRespuesta->execute()) {
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
