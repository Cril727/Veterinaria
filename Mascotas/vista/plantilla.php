<?php

include_once "vista/modulos/cabecera.php";



if (isset($_GET["ruta"])) {
    if (
        $_GET["ruta"] == "mascota"||
        $_GET["ruta"] == "usuario" ||
        $_GET["ruta"] == "raza" ||
        $_GET["ruta"] == "tipoMascota" ||
        $_GET["ruta"] == "mascota"
    ) {
        include_once "vista/modulos/" . $_GET["ruta"] . ".php";
    } else {
        include_once "vista/modulos/404.php";
    }
} else {
    include_once "vista/modulos/mascota.php";
}

include_once "vista/modulos/pie.php";
