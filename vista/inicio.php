
<?php
//include_once("controlador/conexion.class.php");
include_once("../modelo/conexion.class.php");
include_once("../controlador/controlador.php");

if(!isset($_POST["bt_enviar"])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/estilo.css">

  <style type="text/css">
  	
  </style>
    
    <title>Mi agenda</title>

  </head>
<body>


<!--<div class="jumbotron jumbotron-fluid">-->
<div class="container p-3 my-3 bg-primary text-white jumbotron">
  	<div class="container">
	    <h1 class="centro">Mi agenda <!--- <a  href="../index.php" style="color: #585858;">Salir</a>--></h1> 
          <!--<p>Aquí podrás manejar el tema de las bases de datos, su inserción, su editado y eliminado</p> -->
          

        <div>
            <nav class="navbar navbar-expand-lg ">
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoContacto">
                        Nuevo Contacto
                    </button>
                </div>
                <div class="collapse navbar-collapse nav justify-content-end" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="Buscador" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </div>

        <!--<div class="card" style="width:400px">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image">
            <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">Some example text.</p>
                <a href="#" class="btn btn-primary">See Profile</a>
            </div>
        </div>-->
        <div class="salto"></div>
        <!--<p>
            <div>
                <a class="btn btn-primary alargado" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
            </div>-->
            <!--<button class="btn btn-primary alargado" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Button with data-target
            </button>-->
        <!--</p>-->

        <?php
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
                <tbody>
                    
                    <?php
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
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarContacto" value="<?php echo $id; ?>" onkeyup="showHint(this.value)">
                                Editar Contacto
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarContacto" value="<?php echo $id; ?>">
                                Eliminar Contacto
                            </button>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

  	<!--<div class="alert alert-info">
  		<strong>Dato importante:</strong> Ten en cuenta que para modificar datos, necesitas copiar y pegar el ID específico.
    </div> -->
    
    
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
        
        
        
    </div>

<p>This is a paragraph.</p>

<!-- Modals -->

<div class="modal" id="nuevoContacto">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
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
                    <!--id	nombre	apellidos	descripcion	telefono_principal	telefono_secundario correo_principal-->
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                </div>
                <span class="input-group-text">Descripción</span>
                <div class="input-group mb-3">
                    
                    <textarea class="form-control alargado" rows="4" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Teléfono principal" name="telefono_principal">
                    <input type="text" class="form-control" placeholder="Teléfono secundario" name="telefono_secundario">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Correo electrónico" name="correo_principal">
                   
                </div>
                <input type="hidden" name="accion" value="insertar">

                <!--<div class="input-group mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value=""> favorito
                        </label>
                    </div>
                </div>-->
                
            </div>
            <div class="form-group">
				<input type="submit" class="form-control" name="bt_enviar" value="Enviar">
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
                    <!--id	nombre	apellidos	descripcion	telefono_principal	telefono_secundario correo_principal correo_secundario favoritos-->
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                </div>
                <span class="input-group-text">Descripción</span>
                <div class="input-group mb-3">
                    
                    <textarea class="form-control alargado" rows="4" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="telefono_principal" name="telefono_principal">
                    <input type="text" class="form-control" placeholder="telefono_secundario" name="telefono_secundario">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="correo_principal" name="correo_principal">
                </div>
                <input type="hidden" name="accion" value="editar">

                <!--<div class="input-group mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value=""> favorito
                        </label>
                    </div>
                </div>-->
                
            </div>
            <div class="form-group">
				<input type="submit" class="form-control" name="bt_enviar" value="Enviar">
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

}
else {
    if(isset($_POST["bt_enviar"])){
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
        $contacto->insertar_contacto();
    }
}

?>
