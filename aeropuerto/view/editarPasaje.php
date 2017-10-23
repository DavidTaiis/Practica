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
        <title>Editar Pasaje</title>
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
        <?php
            $pasaje=unserialize($_SESSION['pasaje']);
            
        ?>
        <div class="container">
            <form class="form-horizontal" action="../controller/controller.php">
            <div class="container">
               
             <input type="hidden" name="opcion" value="inicioPasaje">
              <input type="submit" value="Cancelar" class="btn btn-info">
              </div>
        </form>
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizarPasajes">
            <br>
            <input type="submit" value="Actualizar" class="btn btn-info"/>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
               ID Pasajes: </label>
                 <div class="col-sm-4">
                        <?php echo $pasaje->getIdPasaje(); ?>
                        <input type="hidden" name="idPasaje" value="<?php echo $pasaje->getIdPasaje(); ?>" >
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                    CLASE:    </label>
                 <div class="col-sm-4">              
                        <input type="radio" name=clase value="PRIMERA CLASE">PRIMERA CLASE
                        <input type="radio" name=clase value="SEGUNDA CLASE">SEGUNDA CLASE
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                    NUMERO DE VUELO:
                    </label>
                 <div class="col-sm-4">
                     <select class="form-control" name="idVuelo">
                            <?php
                            $aeroModel = new AeropuertoModel();
                            $listado = $aeroModel->getVuelos();
                            foreach ($listado as $v) {
                                if($v->getIdVuelo()==$pasaje->getIdVuelo())
                                    echo "<option selected=true value='" . $v->getIdVuelo() . "'>" . $v->getNumVuelo() . "</option>";
                                else
                                    echo "<option value='" . $cli->getIdVuelo() . "'>" . $prov->getNumVuelo() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                   CLIENTE: </label>
                 <div class="col-sm-4">
                     <select class="form-control" name="idCli">
                            <?php
                            $aeroModel = new AeropuertoModel();
                            $listado = $aeroModel->getClientes();
                            foreach ($listado as $cli) {
                                if($cli->getIdCliente()==$pasaje->getIdCliente())
                                    echo "<option selected=true value='" . $cli->getIdCliente() . "'>" . $cli->getNombreCli() . "</option>";
                                else
                                    echo "<option value='" . $cli->getIdCliente() . "'>" . $cli->getNombreCli() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
            </div>
            
                  </form>
                 
        </div>
    </body>
</html>
