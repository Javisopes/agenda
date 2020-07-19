<?php
include_once("conexion.class.php");


//$con = new Conexion();

function cargar_datos_tabla($tabla="contactos"){
    $contactos=[];

    $con = AbrirConexion();

    $sql = "SELECT * FROM `".$tabla."`";
    $resultado=$con->query($sql);

    if (isset($resultado->num_rows)) {
        while ($row = $resultado->fetch_all(MYSQLI_ASSOC)) {
            $contactos = array("".$tabla."" => $row);
        //array_push($contactos, $item);
        }
    }
    
    CerrarConexion($con);
    return $contactos;
}

class Contactos($nombre,$apellidos,$descripcion,$telefono_principal,$telefono_secundario,$correo_principal,$correo_secundario,$favoritos){

    function __construct(){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->descripcion = $descripcion;
        $this->telefono_principal = $telefono_principal;
        $this->telefono_secundario = $telefono_secundario;
        $this->correo_principal = $correo_principal;
        $this->correo_secundario = $correo_secundario;
        $this->favoritos = $favoritos;
    }

    function insertar_contacto(Conexion $con, $contacto){
        id	nombre	apellidos	descripcion	telefono_principal	telefono_secundario	favoritos       
        $sql = "INSERT INTO `contactos`
            ( `nombre`
            , `apellidos`
            , `descripcion`
            , `telefono_principal`
            , `telefono_secundario`
            , `correo_principal`
            , `correo_secundario`
            , `favoritos`) 
                VALUES
                ('".$contacto->nombre."'
                ,'".$contacto->apellidos."'
                ,'".$contacto->descripcion."'
                ,'".$contacto->telefono_principal."'
                ,'".$contacto->telefono_secundario."'
                ,'".$contacto->correo_principal."'
                ,'".$contacto->correo_secundario."'
                ,'".$contacto->favoritos."')";
    
    
        if ($con->query($sql) === true) {
            Header( "Location: ../inicio.php" );
        } else {
            echo "Error insertando en la tabla: " . $con->error();
        }
    }
    function actualiza_contacto(Conexion $con, $contacto){

        $sql = "UPDATE `contactos` SET `nombre` = '".$contacto->nombre."' ,
        `apellidos` = '".$contacto->apellidos."' ,
        `descripcion` = '".$contacto->descripcion."' ,
        `telefono_principal` = '".$contacto->telefono_principal."' ,
        `contrasena` = '".$contacto->telefono_secundario."' ,
        `tipo` = '".$contacto->correo_principal."' ,
        `tipo` = '".$contacto->correo_secundario."' ,
        `tipo` = '".$contacto->favoritos."' 
        WHERE `id`= '".$id."'";
    
        if ($con->query($sql) === true) {
            echo "La  actualización se  ha hecho correctamente";
    
            Header( "Location: index.php" );
        } else {
            echo "Error actualización en la tabla: " . $con->error();
        }
    }

    function elimina_contacto(Conexion $con, $array_guarda){
    
        $sql = "DELETE FROM `contactos` WHERE `id`= '".$id."'";
    
    
        if ($con->query($sql) === true) {
            echo "La  eliminación se  ha hecho correctamente";
            Header( "Location: index.php" );
        } else {
            echo "Error insertando en la tabla: " . $con->error();
        }
    }

}





?>