<!DOCTYPE html>
<?php
session_start();
include_once '../model/Pasaje.php';
include_once '../model/Vuelo.php';
include_once '../model/Cliente.php';
include_once '../model/AeropuertoModel.php';


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PASAJE</title>
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
            <input type="hidden" name="opcion" value="insertarPasajes">
             <div class="form-group">
                    <label class="col-sm-2 control-label"> 
                        CLIENTE:</label>
                 <div class="col-sm-4">
                        <select class="form-control"  name="idCli" required> 
                         <?php
                            $aeroModelModel = new AeropuertoModel();
                            $listado = $aeroModelModel->getClientes();
                            foreach ($listado as $cli) {
                                echo "<option value='" . $cli->getIdCliente() . "'>" . $cli->getNombreCli() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
             </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"> 
                   NUMERO DE VUELO:</label>
                 <div class="col-sm-4">
                     <select class="form-control"name="idVuelo" required>
                            <?php
                            $aeroModelModel = new AeropuertoModel();
                            $listado = $aeroModelModel->getVuelos();
                            foreach ($listado as $vu) {
                                echo "<option value='" . $vu->getIdVuelo() . "'>" . $vu->getNumVuelo() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"> 
                CLASE: </label>
                 <div class="col-sm-4">
                     <input  type="radio" name=clase value="PRIMERA CLASE" true> PRIMERA
                     <input  type="radio" name=clase value="SEGUNDA CLASE"> SEGUNDA
                 </div>
            </div>
             <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <input type="submit" class="btn-primary btn-sm" value="Insertar Pasaje">
                </div>
             </div>
        </form>
        <form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listarPasajes">
                        <input class="btn-sm btn-primary"type="submit" value="Consultar listado">
                   
        <div style="overflow: auto">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID PASAJE</th>
                    <th>ID CLIENTE</th>
                    <th>ID VUELO</th>
                    <th>COSTO</th>
                    <th>CLASE</th>
                    <th>ELIMINAR</th>
                    <th>EDITAR</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php
                //verificamos si existe en sesion el listado de facturas:
                 $listado = $aeroModelModel->getPasajes();
                if (isset($_SESSION['listado'])) {
                    
                    $listado = unserialize($_SESSION['listado']);
                    foreach ($listado as $p) {
                        echo "<tr>";
                        echo "<td>" . $p->getIdPasaje() . "</td>";
                        echo "<td>" . $p->getIdCliente() . "</td>";
                        echo "<td>" . $p->getIdVuelo() . "</td>";
                        echo "<td>" . $p->getClase() . "</td>";
                         echo "<td>" . $p->getCosto() . "</td>";
                                               
                  echo "<td><a href='../controller/controller.php?opcion=eliminarPasajes&idPasaje=".$p->getIdPasaje()."'><span class='glyphicon glyphicon-pencil'> ELIMINAR </span></a></td>";
                  echo "<td><a href='../controller/controller.php?opcion=editarPasaje&idPasaje=".$p->getIdPasaje()."'><span class='glyphicon glyphicon-pencil'> EDITAR </span></a></td>";
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
