<!DOCTYPE html>
<?php
session_start();
include_once '../model/Pais.php';
include_once '../model/AeropuertoModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR PAIS</title>
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
            $pais=unserialize($_SESSION['pais']);
            
        ?>
        <div class="container">
            <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizarPais">
            <div class="form-group">
                    <label class="col-sm-2 control-label">
            ID PAIS :</label>
                 <div class="col-sm-4">
                        <?php echo $pais->getIdPais(); ?>
                        <input type="hidden" name="idPais" value="<?php echo $pais->getIdPais(); ?>" >
                 </div>
        </div>
               <div class="form-group">
                    <label class="col-sm-2 control-label">
                   
                   PAIS:  </label>
                 <div class="col-sm-4">
                     <input class="form-control" value="<?php echo $pais->getPais(); ?>" type="text" name="pais" size="15" maxlength="15" required="true">
                 </div>
               </div>
                  <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
              <input type="submit" value="Actualizar" class="btn btn-info">
                </div>
                  </div>
        </form>
                 
        </div>
        
    </body>
</html>
