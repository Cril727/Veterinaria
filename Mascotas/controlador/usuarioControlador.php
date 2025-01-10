<?php

include_once "../modelo/usuarioModelo.php";

class UsuarioControlador{

    public $idusuario;
    public $documento;
    public $nombre;
    public $apellido;
    public $email;

    public function ctrMostrarUsuario(){
        $objRespuesta = usuarioModelo::mdlmostrarUsuario();
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarUsuario(){
        $objRespuesta = usuarioModelo::mdleliminarUsuario($this->idusuario);
        echo json_encode($objRespuesta);
    }

    public function ctrAnadirUsuario(){
        $objRespuesta = usuarioModelo::mdlCrearUsuario($this->documento, $this->nombre, $this->apellido, $this->email);
        echo json_encode($objRespuesta);
    }

    public function ctrEditarUsuario(){
        $objRespuesta = usuarioModelo::mdlEditarUsuario($this->documento, $this->nombre, $this->apellido,  $this->email, $this->idusuario);
        echo json_encode($objRespuesta);
    }
}

if(isset($_POST["mostrarUsuario"]) == "ok") {
    $objUsuario = new UsuarioControlador();
    $objUsuario->ctrMostrarUsuario();
}

if(isset($_POST["eliminarUsuario"]) == "ok") {
    $objUsuario = new UsuarioControlador();
    $objUsuario->idusuario = $_POST["idusuario"];
    $objUsuario->ctrEliminarUsuario();
}

if (isset($_POST["registrarUsuario"]) == "ok"){
    $objUsuarios = new UsuarioControlador();
    $objUsuarios->documento = $_POST["documento"];
    $objUsuarios->nombre = $_POST["nombre"];
    $objUsuarios->apellido = $_POST["apellido"];    
    $objUsuarios->email = $_POST["email"];
    $objUsuarios->ctrAnadirUsuario();
}

if (isset($_POST["editarUsuario"]) == "ok"){
    $objUsuarios = new UsuarioControlador();
    $objUsuarios->documento = $_POST["documento"];
    $objUsuarios->nombre = $_POST["nombre"];
    $objUsuarios->apellido = $_POST["apellido"];
    $objUsuarios->email = $_POST["email"];
    $objUsuarios->idusuario = $_POST["idusuario"];
    $objUsuarios->ctrEditarUsuario();
}