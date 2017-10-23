<!DOCTYPE html>
<?php
session_start();
include_once '../model/Compania.php';
include_once '../model/AeropuertoModel.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>COMPANIA</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
 <link href="css/estilopersonal.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="img/Avion.jpg" class="img-responsive">
        </div>
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="insertar">
             <div class="row-fluid container">
            <ul class="nav nav-pills">
                <li>
                    <a href="clientes.php" role="button" aria-haspopup="true">
                        CLIENTES 
                    </a>
                    
                </li>
                <li><a href="index.php" >COMPANIAS</a></li>
                <li><a href="pasajes.php" >PASAJES</a></li>
                <li><a href="paises.php" >PAISES</a></li>
                <li><a href="vuelos.php" >VUELOS</a></li>
                
            </ul>
        </div>
              <div class="container">
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">
            NOMBRE COMPANIA: </label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="nombreCompania" size="17" maxlength="17" pattern="[a-zA-Z ]+"required="">
                    </div>
                  </div>
            <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">      
                   TELEFONO: </label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="telefono" size="17" maxlength="10" pattern="[0-9]{10}" required="">
                    </div>
            </div>
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label"> 
                MAIL: </label>
                    <div class="col-sm-3">
                        <input class="form-control" type="email" name="mail" size="30" maxlength="30" required="">
                    </div>
                  </div>
                  <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                  <input class="btn-primary btn-sm" type="submit" value="Insertar">
                </div>
                  </div>
        </form>
        <form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listar">
                        <input  class="btn-primary btn-sm" type="submit" value="Consultar listado">
                    </form>
         <div style="overflow: auto">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE COMPANIA</th>
                    <th>TELEFONO</th>
                    <th>MAIL</th>
                    <th>EDITAR</th>
                    
                    </tr>
            </thead>
            <tbody>

                <?php
                //verificamos si existe en sesion el listado de facturas:
                if (isset($_SESSION['listado'])) {
                    $listado = unserialize($_SESSION['listado']);
                    foreach ($listado as $comp) {
                        echo "<tr>";
                        echo "<td>" . $comp->getIdCompania() . "</td>";
                        echo "<td>" . $comp->getNombreCompania() . "</td>";
                        echo "<td>" . $comp->getTelefono() . "</td>";
                        echo "<td>" . $comp->getMail() . "</td>";
                       echo "<td><a href='../controller/controller.php?opcion=editar&idCompania=".$comp->getIdCompania()."'><span class='glyphicon glyphicon-pencil'> EDITAR </span></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No se han cargado datos.";
                }
                
                session_destroy();
                ?>
             </tbody>
        </table>
         </div>
            </div>
        
    </body>
</html>
