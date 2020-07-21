
<?php
include_once("../modelo/conexion.class.php");
include_once("../controlador/controlador.php");

if(!isset($_POST["bt_enviar"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <script type="text/javascript" src="../js/inicio.js"></script>

  <style type="text/css">
  	
  </style>
    
    <title>Mi agenda</title>

  </head>
<body>


<div class="container p-3 my-3 bg-primary text-white jumbotron">
  	<div class="container">
	    <h1 class="centro">Mi agenda</h1> 
          

        <div>
        <!--Alert en función de si se realiza la acción a la base de datos de forma correcta o no-->
        <div class="justify-content-end">
            <?php
            if(isset($_GET["mensaje"])){
                $accion = $_GET["mensaje"];
                if($accion=="succes"){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show col-sm-5 mx-auto" role="alert">
                        <strong>La acción se ha realizado exitosamente!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show col-sm-5 mx-auto" role="alert">
                        <strong>Oooops!</strong> Por algúna razón no se ha podido realizar su operación, vuelva a intentarlo
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
            <nav class="navbar navbar-expand-lg ">
                <!--Nuevo contacto-->
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoContacto">
                    <i class="fa fa-plus"></i> Añadir Contacto
                    </button>
                </div>
                <!--Filtro-->
                <div class="collapse navbar-collapse nav justify-content-end" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="Buscador" placeholder="Busqueda rápida" aria-label="Search" id="Buscador">
                    </form>
                </div>
            </nav>
        </div>

        <div class="salto"></div>

        <?php
            //Función para cargar los datos de la tabla
            $data = llamada_datos_generales();
        ?>
        <div class="container p-4 my-4 bg-primary jumbotron bg-white">
            <h1 class="centro titulo_contacto">Lista de contactos</h1>
            <div class="salto"></div>
            <table class="table table-striped bg-white">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Descripción</th>
                        <th>Teléfono Principal</th>
                        <th>Teléfono Secundario</th>
                        <th>Correo Principal</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tablaContactos">
                    
                    <?php
                        //Rellena la tabla de los datos cargados
                        foreach ($data as $contactos){
                            foreach ($contactos as  $contacto) {
                    ?>
                    <tr>
                    <?php
                                foreach ($contacto as $propiedad => $valor) { 
                                    if($propiedad != "id"){
                    ?>               
                        <td>
                            <?php 
                                echo $valor;
                            ?>
                        </td>
                    <?php           
                                    }else{
                                        $id=$valor;
                                    }
                                }
                    ?>  
                        <!--Botón Modificar-->
                        <td class="centrar2 text-center">
                            <button type="button" href="javascript:;" class="btn btn-primary centrar" data-toggle="modal" data-target="#editarContacto" value="<?php echo $id; ?>" onclick="recogerDataFormEdit(this.value)">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </td>
                        <!--Botón Eliminar-->
                        <td class="centrar text-center">
                        <form action="inicio.php" method="post">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-primary centrar btEliminarContacto" name="bt_enviar" >
                                <i class="fa fa-trash-o"></i> 
                            </button>
                        </form>
                            
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>


<!-- Modal Nuevo Contacto -->

<div class="modal" id="nuevoContacto">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title titulo_contacto">Nuevo contacto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="inicio.php" method="post">
            <div class="input-group titulo_contacto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contacto</span>
                    </div>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" Required>
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                </div>
                <span class="input-group-text">Descripción</span>
                <div class="input-group mb-3">
                    
                    <textarea class="form-control alargado" rows="4" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="tel" class="form-control" placeholder="Teléfono principal" name="telefono_principal" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                    <input type="tel" class="form-control" placeholder="Teléfono secundario" name="telefono_secundario" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Correo electrónico" name="correo_principal">
                   
                </div>
                <input type="hidden" name="accion" value="insertar">
            </div>
            <div class="form-group">
				<input type="submit" class="btn btn-success text-center" name="bt_enviar" value="Confirmar">
			</div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal Editar Contacto -->
<div class="modal" id="editarContacto">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title titulo_contacto">Editor del contacto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="inicio.php" method="post">
            <div class="input-group titulo_contacto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contacto</span>
                    </div>
                    <input type="hidden" id="modalEditId" name="id">
                        <input type="text" class="form-control" id="modalEditNombre" placeholder="Nombre" name="nombre">
                        <input type="text" class="form-control" id="modalEditApellidos" placeholder="Apellidos" name="apellidos">
                </div>
                <span class="input-group-text">Descripción</span>
                <div class="input-group mb-3">
                    
                    <textarea class="form-control alargado" rows="4" id="modalEditDescripcion" name="descripcion"></textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="tel" class="form-control" placeholder="Teléfono principal" id="modalEditTelefonoPrincipal" name="telefono_principal" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                    <input type="tel" class="form-control" placeholder="Teléfono secundario" id="modalEditTelefonoSecundario" name="telefono_secundario" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="modalEditCorreo" placeholder="correo_principal" name="correo_principal">
                </div>
                <input type="hidden" name="accion" value="editar">

            </div>
            <div class="form-group">
				<input type="submit" class="btn btn-success text-center" name="bt_enviar" value="Guardar combios">
			</div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</body>
</html>

<?php

}   //Devuelve post
else {
    if(isset($_POST["bt_enviar"])){
        $accion = "";
        if(isset($_POST["accion"])){
            $accion = $_POST["accion"];
        }
        $nombre = "";
        if(isset($_POST["nombre"])){
            $nombre = $_POST["nombre"];
        }
        $apellidos = "";
        if(isset($_POST["apellidos"])){
            $apellidos = $_POST["apellidos"];
        }
        $descripcion = "";
        if(isset($_POST["descripcion"])){
            $descripcion = $_POST["descripcion"];
        }
        $telefono_principal = "";
        if(isset($_POST["telefono_principal"])){
            $telefono_principal = $_POST["telefono_principal"];
        }
        $telefono_secundario = "";
        if(isset($_POST["telefono_secundario"])){
            $telefono_secundario = $_POST["telefono_secundario"];
        }
        $correo_principal = "";
        if(isset($_POST["correo_principal"])){
            $correo_principal = $_POST["correo_principal"];
        }
        $correo_secundario = "";
        if(isset($_POST["correo_secundario"])){
            $correo_secundario = $_POST["correo_secundario"];
        }
        $enviar = "";
        if(isset($_POST["bt_enviar"])){
            $enviar = $_POST["bt_enviar"];
        }
    
        $contacto = NEW Contactos($nombre,$apellidos,$descripcion,$telefono_principal,$telefono_secundario,$correo_principal,$correo_secundario);
            
        $con = new Conexion();

        //Insertar
        if($accion=="insertar"){
            $contacto->insertar_contacto($con);
        }
        //Eliminar
        elseif($accion=="eliminar"){
            $id = "";
            if(isset($_POST["id"])){
                $id = $_POST["id"];
            }
            $contacto->elimina_contacto($con,$id);
        }
        //Modificar
        elseif($accion=="editar"){
            $id = "";
            if(isset($_POST["id"])){
                $id = $_POST["id"];
            }
            $contacto->actualiza_contacto($con,$id);
        }
        $con->close();
        
    }
}

?>
