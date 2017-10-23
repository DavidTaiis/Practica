<!DOCTYPE html>
<?php
session_start();
include_once '../model/Vuelo.php';
include_once '../model/Pais.php';
include_once '../model/Compania.php';
include_once '../model/AeropuertoModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR VUELO</title>
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
            $vuelo=unserialize($_SESSION['vuelo']);
            
        ?>
        <div class="container"> 
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizarVuelo">
             <div class="form-group">
                    <label class="col-sm-2 control-label"> 
            ID VUELO: </label>
                 <div class="col-sm-4">
                        <?php echo $vuelo->getIdVuelo(); ?>
                        <input type="hidden" name="idVuelo" value="<?php echo $vuelo->getIdVuelo(); ?>" >
                 </div>
             </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"> 
               COMPANIA: </label>
                 <div class="col-sm-4">
                     <select class="form-control" name="idCompania">
                            <?php
                            $aeroModel = new AeropuertoModel();
                            $listado = $aeroModel->getCompanias();
                            foreach ($listado as $c) {
                                if($c->getIdCompania()==$vuelo->getIdCompania())
                                    echo "<option selected=true value='" . $c->getIdCompania() . "'>" . $c->getNombreCompania() . "</option>";
                                else
                                    echo "<option value='" . $c->getIdCompania() . "'>" . $c->getNombreCompania() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
            </div>
             <div class="form-group">
                    <label class="col-sm-2 control-label"> 
                    PAIS DESTINO: </label>
                 <div class="col-sm-4">
                     <select class="form-control" name="idPais">
                            <?php
                            $aeroModel = new AeropuertoModel();
                            $listado = $aeroModel->getPaises();
                            foreach ($listado as $p) {
                                if($p->getIdPais()==$vuelo->getIdPais())
                                    echo "<option selected=true value='" . $p->getIdPais() . "'>" . $p->getPais() . "</option>";
                                else
                                    echo "<option value='" . $p->getIdPais() . "'>" . $p->getPais() . "</option>";
                            }
                            ?>
                        </select>
                 </div>
             </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                        FECHA: </label>
                <div class="col-sm-4">
                <input class="form-control" type="date" name="fecha"required="" placeholder="YYYY/MM/DD">
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"> 
                   CAPACIDAD: </label>
                 <div class="col-sm-4">
                     <input class="form-control" value="<?php echo $vuelo->getCapaciidad(); ?>" type="text" name="capacidad" size="4" maxlength="4" required="true">
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                        NUMERO DE VUELO: 
                        </label>
                 <div class="col-sm-4">
                        <input class="form-control" value="<?php echo $vuelo->getNumVuelo(); ?>" type="text" name="numVuelo" required="true">
                 </div>
            </div>
             <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                        <input type="submit" value="Actualizar" class="btn btn-info">
                </div>
             </div>
        </form>
                 <form class="form-horizontal" action="../controller/controller.php">
            <div class="container">
                <br>
             <input type="hidden" name="opcion" value="inicioVuelo">
              <input type="submit" value="Cancelar" class="btn btn-info">
              </div>
        </form>
            </div>
    </body>
</html>