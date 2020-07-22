<?php

include_once("../modelo/carga_datos.php");
if(isset($_POST["id"])){
    $data = llamada_contactos_edit($_POST["id"]);
    echo json_encode($data);
}else{
    echo [];
}

?>