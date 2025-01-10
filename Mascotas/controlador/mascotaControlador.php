<?php

include_once "../modelo/mascotaModelo.php";

class mascotaControlador {
    public $idmascota;
    public $nombre;
    public $edad;
    public $usuario_idusuario;
    public $tipo_mascota_idtipo_mascota;
    public $raza_idraza;

    public function ctrListarMascota() {
        $objRespuesta = mascotaModelo::mdlListarMascota();
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarMascota() {
        $objRespuesta = mascotaModelo::mdlEliminarMascota($this->idmascota);
        echo json_encode($objRespuesta);
    }

    public function ctrAgregarMascota() {
        $objRespuesta = mascotaModelo::mdlAgregarMascota($this->nombre, $this->edad, $this->usuario_idusuario, $this->tipo_mascota_idtipo_mascota, $this->raza_idraza);
        echo json_encode($objRespuesta);
    }

    public function ctrEditarMascota() {
        $objRespuesta = mascotaModelo::mdlEditarMascota($this->idmascota, $this->nombre, $this->edad, $this->usuario_idusuario, $this->tipo_mascota_idtipo_mascota, $this->raza_idraza);
        echo json_encode($objRespuesta);
    }

    public function ctrListarUsuarios() {
        $objRespuesta = mascotaModelo::mdlListarUsuarios();
        echo json_encode($objRespuesta);
    }

    public function ctrListarTipos() {
        $objRespuesta = mascotaModelo::mdlListarTipos();
        echo json_encode($objRespuesta);
    }

    public function ctrListarRazas() {
        $objRespuesta = mascotaModelo::mdlListarRazas();
        echo json_encode($objRespuesta);
    }

    public function ctrObtenerMascota() {
        $objRespuesta = mascotaModelo::mdlObtenerMascota($this->idmascota);
        echo json_encode($objRespuesta);
    }
}

if (isset($_POST["listarMascota"]) == "ok") {
    $objMascota = new mascotaControlador();
    $objMascota->ctrListarMascota();
}

if (isset($_POST["eliminarMascota"]) == "ok") {
    $objMascota = new mascotaControlador();
    $objMascota->idmascota = $_POST["idmascota"];
    $objMascota->ctrEliminarMascota();
}

if (isset($_POST["agregarMascota"]) == "ok") {
    $objMascota = new mascotaControlador();
    $objMascota->nombre = $_POST["nombre"];
    $objMascota->edad = $_POST["edad"];
    $objMascota->usuario_idusuario = $_POST["usuario_id"];
    $objMascota->tipo_mascota_idtipo_mascota = $_POST["tipo_id"];
    $objMascota->raza_idraza = $_POST["raza_id"];
    $objMascota->ctrAgregarMascota();
}

if (isset($_POST["editarMascota"]) == "ok") {
    $objMascota = new mascotaControlador();
    $objMascota->idmascota = $_POST["idmascota"];
    $objMascota->nombre = $_POST["nombre"];
    $objMascota->edad = $_POST["edad"];
    $objMascota->usuario_idusuario = $_POST["usuario_id"];
    $objMascota->tipo_mascota_idtipo_mascota = $_POST["tipo_id"];
    $objMascota->raza_idraza = $_POST["raza_id"];
    $objMascota->ctrEditarMascota();
}

if (isset($_GET["accion"])) {
    $objMascota = new mascotaControlador();
    switch ($_GET["accion"]) {
        case "listarUsuarios":
            $objMascota->ctrListarUsuarios();
            break;
        case "listarTipos":
            $objMascota->ctrListarTipos();
            break;
        case "listarRazas":
            $objMascota->ctrListarRazas();
            break;
        case "obtenerMascota":
            $objMascota->idmascota = $_GET["idmascota"];
            $objMascota->ctrObtenerMascota();
            break;
    }
}