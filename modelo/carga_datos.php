<?php
include_once("conexion.class.php");

function cargar_datos($tabla="contactos"){
    $contactos=[];

    $con = new Conexion();

    $sql = "SELECT * FROM `".$tabla."`";
    $resultado=$con->query($sql);

    if (isset($resultado->num_rows)) {
        while ($row = $resultado->fetch_all(MYSQLI_ASSOC)) {
            array_push($contactos, $row);
        }
    }
    
    $con->close();
    return $contactos;
}
function llamada_contactos_edit($id){
    $contactos=[];
    $con = new Conexion();

    $sql = "SELECT * FROM `contactos` WHERE `id` = '".$id."'";
    $resultado=$con->query($sql);

    if (isset($resultado->num_rows)) {
        while ($row = $resultado->fetch_all(MYSQLI_ASSOC)) {
            $contactos= $row;
        }
    }
    foreach ($contactos as $contacto1){
        $contacto = $contacto1;
    }
    
    $con->close();
    return $contacto;
}


class Contactos {
    var $nombre;
    var $apellidos;
    var $descripcion;
    var $telefono_principal;
    var $telefono_secundario;
    var $correo_principal;
    var $correo_secundario;
    var $favoritos;

    function __construct($nombre,$apellidos,$descripcion,$telefono_principal,$telefono_secundario,$correo_principal,$correo_secundario){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->descripcion = $descripcion;
        $this->telefono_principal = $telefono_principal;
        $this->telefono_secundario = $telefono_secundario;
        $this->correo_principal = $correo_principal;
        $this->correo_secundario = $correo_secundario;
    }

    function insertar_contacto($con){

        $sql = "INSERT INTO `contactos`
            ( `nombre`
            , `apellidos`
            , `descripcion`
            , `telefono_principal`
            , `telefono_secundario`
            , `correo_principal`) 
                VALUES
                ('{$this->nombre}'
                ,'{$this->apellidos}'
                ,'{$this->descripcion}'
                ,'{$this->telefono_principal}'
                ,'{$this->telefono_secundario}'
                ,'{$this->correo_principal}')";
        if ($con->query($sql) === true) {
            $accion="succes";
            Header( "Location: ../vista/inicio.php?mensaje=$accion" );
        } else {
            $accion="";
            Header( "Location: ../vista/inicio.php?mensaje=$accion" );
        }
    }
    function actualiza_contacto($con,$id){        

        $sql = "UPDATE `contactos` SET 
        `nombre` = '{$this->nombre}' ,
        `apellidos` = '{$this->apellidos}' ,
        `descripcion` = '{$this->descripcion}' ,
        `telefono_principal` = '{$this->telefono_principal}' ,
        `telefono_secundario` = '{$this->telefono_secundario}' ,
        `correo_principal` = '{$this->correo_principal}'
        WHERE `id`= '".$id."'";
    
        if ($con->query($sql) === true) {
            $accion="succes";
            Header( "Location: ../vista/inicio.php?mensaje=$accion" );
        } else {
            $accion="";
            Header( "Location: ../vista/inicio.php?mensaje=$accion" );
        }
    }

    function elimina_contacto($con,$id){

        $sql = "DELETE FROM `contactos` WHERE `id`= '".$id."'";
    
        if ($con->query($sql) === true) {
            $accion="succes";
            Header( "Location: ../vista/inicio.php?mensaje=$accion" );
        } else {
            $accion="";
            Header( "Location: ../vista/inicio.php?mensaje=$accion" );
        }
    }

}


?>