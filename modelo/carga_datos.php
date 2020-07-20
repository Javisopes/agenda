<?php
include_once("conexion.class.php");

function cargar_datos($tabla="contactos"){
    $contactos=[];

    //$con = AbrirConexion();
    $con = new Conexion();

    $sql = "SELECT * FROM `".$tabla."`";
    $resultado=$con->query($sql);
    $numero_lista=0;

    if (isset($resultado->num_rows)) {
        while ($row = $resultado->fetch_all(MYSQLI_ASSOC)) {
            array_push($contactos, $row);
        }
    }
    
    
    //CerrarConexion($con);
    $con->close();
    return $contactos;
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
        //$this->favoritos = $favoritos;
    }

    function insertar_contacto(){
        //$con = AbrirConexion();
        $con = new Conexion();

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
                //,'".$contacto->favoritos."'
        if ($con->query($sql) === true) {
            Header( "Location: ../vista/inicio.php" );
        } else {
            echo "Error insertando en la tabla: " . $con->error();
            print_r($con->error());
            die;
        }
    }
    function actualiza_contacto(Conexion $con, $contacto){

        $sql = "UPDATE `contactos` SET `nombre` = '".$contacto->nombre."' ,
        `apellidos` = '".$contacto->apellidos."' ,
        `descripcion` = '".$contacto->descripcion."' ,
        `telefono_principal` = '".$contacto->telefono_principal."' ,
        `contrasena` = '".$contacto->telefono_secundario."' ,
        `tipo` = '".$contacto->correo_principal."'
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