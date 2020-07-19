
<?php
//include_once("controlador/conexion.class.php");
include_once("../controlador/controlador.php");

if(!isset($_POST["Enviar"])){

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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarContacto">
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
            llamada_datos_generales();
        ?>
        <div class="container p-4 my-4 bg-primary jumbotron bg-white">
            <h1 class="centro titulo_contacto">Lista de contactos</h1>
            <div class="salto"></div>
            <table class="table table-striped bg-white">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarContacto">
            Editar Contacto
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarContacto">
            Eliminar Contacto
        </button>
        
        
    </div>

<p>This is a paragraph.</p>

<!-- Modals -->


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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contacto</span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre">
                <input type="text" class="form-control" placeholder="Apellidos">
            </div>
            <div class="form-group">
				<input type="submit" class="form-control" name="enviar" value="Enviar">
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

}

?>
