<!DOCTYPE html>
<?php
session_start();
include_once '../model/Pais.php';
include_once '../model/AeropuertoModel.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PAISES</title>
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
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="insertarPais">
            
             <div class="form-group">
                    <label class="col-sm-2 control-label"> 
           PAIS:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="pais" size="17" maxlength="17" pattern="[a-zA-Z ]+"required="">
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
                        <input type="hidden" name="opcion" value="listarPais">
                        <input class="btn-primary btn-sm" type="submit" value="Consultar listado">
                    </form>
        <div style="overflow: auto">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID PAIS</th>
                    <th>PAIS</th>
                    
                    <th>ACTUALIZAR</th>
                    </tr>
            </thead>
            <tbody>

                <?php
                //verificamos si existe en sesion el listado de facturas:
                if (isset($_SESSION['listado'])) {
                    $listado = unserialize($_SESSION['listado']);
                    foreach ($listado as $pais) {
                        echo "<tr>";
                        echo "<td>" . $pais->getIdPais() . "</td>";
                        echo "<td>" . $pais->getPais() . "</td>";
                        echo "<td><a href='../controller/controller.php?opcion=editarPais&idPais=".$pais->getIdPais()."'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
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