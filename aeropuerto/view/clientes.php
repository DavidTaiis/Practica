<!DOCTYPE html>
<?php
session_start();
include_once '../model/Cliente.php';
include_once '../model/AeropuertoModel.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CLIENTE</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <img src="img/Avion.jpg" class="img-responsive">
        </div>
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="insertarCliente" >
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
             <label for="nombre_cli" class="col-sm-2 control-label">
            NOMBRE COMPLETO</label>
                <div class="col-sm-3">
                        <input type="text" class="form-control" id="nombre_cli" name="nombreCli" size="17" maxlength="50"  pattern="[a-zA-Z ]+"required="">
                </div>
            </div>
            <div class="form-group">
            <label for="edad" class="col-sm-2 control-label">
                EDAD:</label>
            <div class="col-sm-3">
                <input class="form-control" id="edad" type="text" name="edad" size="3" maxlength="3"  required="[1].[2-9]+" placeholder="Mayores a 12">
            </div>
            </div>
            <div class="form-group">
                <label for="genero" class="col-sm-2 control-label">
                    GENERO:</label> 
                <div class="col-sm-3"><input class="form-control" id="genero" type="text" name="genero" size="30" maxlength="20"  pattern="[a-zA-Z ]+"required="">
            </div>
            </div>
            <div class="form-group">
                <label for="cedula" class="col-sm-2 control-label" >
                    CEDULA:</label>
                <div class="col-sm-3">    <input type="text" class="form-control" name="cedula" size="10" maxlength="10" pattern="[0-9]+"required="" placeholder="1003634142">
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
                        <input type="hidden" name="opcion" value="listarClientes">
                        <input type="submit" class="btn-primary btn-sm" value="Consultar listado">
                    </form>
        <div style="overflow: auto">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID CLIENTES</th>
                    <th>NOMBRES</th>
                    <th>EDAD</th>
                    <th>GENERO</th>
                    <th>CEDULA</th>
                    </tr>
            </thead>
            <tbody>

                <?php
                //verificamos si existe en sesion el listado de facturas:
                if (isset($_SESSION['listado'])) {
                    $listado = unserialize($_SESSION['listado']);
                    foreach ($listado as $clie) {
                        echo "<tr>"; 
                        echo "<td>" . $clie->getIdCliente() . "</td>";
                        echo "<td>" . $clie->getNombreCli() . "</td>";
                        echo "<td>" . $clie->getEdadCli() . "</td>";
                        echo "<td>" . $clie->getGeneroCli() . "</td>";
                        echo "<td>" . $clie->getCedula() . "</td>";
                        echo "<td><a href='../controller/controller.php?opcion=editarCliente&idCliente=".$clie->getIdCliente()."'><span class='glyphicon glyphicon-pencil'> EDITAR </span></a></td>";
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
