<!DOCTYPE html>
<?php
session_start();
include_once '../model/Compania.php';
include_once '../model/AeropuertoModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR COMPANIA</title>
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
            $compania=unserialize($_SESSION['compania']);
           
        ?>
        <div class="container">
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar">
            <div class="form-group">
                    <label class="col-sm-2 control-label">
            ID COMPANIA: </label>
                 <div class="col-sm-4">
                        <?php echo $compania->getIdCompania(); ?>
                        <input type="hidden" name="idCompania" value="<?php echo $compania->getIdCompania(); ?>" />
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                        NOMBRE COMPANIA: </label>
                 <div class="col-sm-4">
                     <input class="form-control" value="<?php echo $compania->getNombreCompania(); ?>" type="text" name="nombreCompania" size="17" maxlength="17" pattern="[a-zA-Z ]+"required="true">
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                   TELEFONO: </label>
                 <div class="col-sm-4">
                     <input class="form-control" value="<?php echo $compania->getTelefono(); ?>" type="text" name="telefono" size="10" maxlength="10" pattern="[0-9]{10}"required="true">
                 </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">
                   E-MAIL:</label>
                 <div class="col-sm-4">
                     <input class="form-control" value="<?php echo $compania->getMail(); ?>" type="email" name="mail" size="30" maxlength="30" required="true">
                 </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
            
                   <input type="submit" value="Actualizar" class="btn btn-info">
                </div>
            </div>
        </form
             
        </div>
        <form class="form-horizontal" action="../controller/controller.php">
            <div class="container">
                <br>
             <input type="hidden" name="opcion" value="inicioCompania">
              <input type="submit" value="Cancelar" class="btn btn-info">
              </div>
        </form>
    </body>
</html>
