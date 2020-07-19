<?php

include_once("../modelo/carga_datos.php");

function llamada_datos_generales(){
    $datos = cargar_datos_tabla();
    print_r($datos);
}



?>