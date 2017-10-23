<!DOCTYPE html>
<?php
session_start();
include_once '../model/Compania.php';
include_once '../model/Vuelo.php';
include_once '../model/AeropuertoModel.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Vuelo</title>
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
            <input type="hidden" name="opcion" value="insertarVuelo">
             <div class="form-group">
                    <label class="col-sm-2 control-label">
            COMPANIA:</label>
                 <div class="col-sm-4">
                     <select class="form-control" name="idCompania" required="">
                            <?php
                            $aeroModelModel = new AeropuertoModel();
                            $listado = $aeroModelModel->getCompanias();
                            foreach ($listado as $comp) {
                                echo "<option value='" . $comp->getIdCompania() . "'>" . $comp->getNombreCompania() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
             </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                   PAIS: 
                   </label>
                 <div class="col-sm-4">
                     <select class="form-control" name="idPais" required="">
                            <?php
                            $aeroModelModel = new AeropuertoModel();
                            $listado = $aeroModelModel->getPaises();
                            foreach ($listado as $p) {
                                echo "<option value='" . $p->getIdPais() . "'>" . $p->getPais() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
        </div>
        <div class="form-group">
                    <label class="col-sm-2 control-label">
                    CAPACIDAD:</label>
                 <div class="col-sm-4">
                     <input class="form-control" type="text" name="capacidad" size="3" maxlength="3" pattern="[1-9]+{3}">
                     </div>
        </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                NUMERO DE VUELO: </label>
                 <div class="col-sm-4">
                     <input class="form-control" type="text" name="numVuelo" pattern="[1-9]+">
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                        FECHA: </label>
                <div class="col-sm-4">
                    <input  type=datetime class="form-control" name="fecha" required placeholder="YYYY/MM/DD">
                 </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    
                    <input class="btn-primary btn-sm" type="submit" value="Insertar Vuelo">
                </div>
            </div>
           
        </form>
        <form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listarVuelo">
                        <input class="btn-sm btn-primary" type="submit" value="Consultar listado">
                    </form>
           
        <div style="overflow: auto">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>IDVUELO</th>
                    <th>COMPANIA</th>
                    <th>PAIS</th>
                    <th>FECHA</th>
                    <th>CAPACIAD</th>
                    <th>NUMERO DE VUELO</th>
                    
                    <th>EDITAR</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php
                //verificamos si existe en sesion el listado de facturas:
                 $listado = $aeroModelModel->getVuelos();
                if (isset($_SESSION['listado'])) {
                    
                    $listado = unserialize($_SESSION['listado']);
                    foreach ($listado as $v) {
                        echo "<tr>";
                        echo "<td>" . $v->getIdVuelo() . "</td>";
                        echo "<td>" . $v->getIdcompania() . "</td>";
                        echo "<td>" . $v->getIdPais() . "</td>";
                        echo "<td>" . $v->getFecha() . "</td>";
                        echo "<td>" . $v->getCapaciidad() . "</td>";
                        echo "<td>" . $v->getNumVuelo() . "</td>";
                                               
                  echo "<td><a href='../controller/controller.php?opcion=editarVuelo&idVuelo=".$v->getIdVuelo()."'><span class='glyphicon glyphicon-pencil'> EDITAR </span></a></td>";
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