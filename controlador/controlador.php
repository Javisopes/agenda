<?php

include_once("../modelo/carga_datos.php");

function llamada_datos_generales(){
    $data = cargar_datos();
    return $data;
}



?>