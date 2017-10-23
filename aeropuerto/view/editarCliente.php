<!DOCTYPE html>
<?php
session_start();
include_once '../model/Cliente.php';
include_once '../model/AeropuertoModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR CLIENTE</title>
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
            $cliente=unserialize($_SESSION['cliente']);
           
        ?>
        <form class="form-horizontal" action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizarCliente">
            <div class="container">
                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">
                        ID CLIENTE:</label>
                    <div class="col-sm-3">
                        <?php echo $cliente->getIdCliente(); ?>
                        <input id="id" class="form-control" type="hidden" name="idCliente" value="<?php echo $cliente->getIdCliente(); ?>" >
                    </div>
                </div>
                 <div class="form-group">
                     <label for="nomb"class="col-sm-2 control-label">
                        NOMBRE CLIENTE: </label>
                     <div class="col-sm-3">
                         <input id="nomb" class="form-control" value="<?php echo $cliente->getNombreCli(); ?>" type="text" name="nombreCli" size="30" maxlength="30" pattern="[a-zA-Z ]+"required="true">
                     </div>
                 </div>
                <div class="form-group">
                    <label for="ed"class="col-sm-2 control-label">
                        EDAD CLIENTE:</label>
                    <div class="col-sm-3">
                        <input id="ed" class="form-control" value="<?php echo $cliente->getedadCli(); ?>" type="text" name="edad" size="3" maxlength="3" pattern="[0-9]+"required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                
                        GENERO:</label>
                    <div class="col-sm-3">
                        <input class="form-control" value="<?php echo $cliente->getGeneroCLi(); ?>" type="text" name="genero" size="30" maxlength="30" pattern="[a-zA-Z]+" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        CEDULA: </label>
                          <div class="col-sm-3">             
                              <input class="form-control" value="<?php echo $cliente->getCedula(); ?>" type="text" name="cedula" size="10" maxlength="10" pattern="[0-9]{10}"required="true">
                          </div>
                </div>
                <input type="submit" value="Actualizar" class="btn btn-info"><br>
            </div>
        </form>
        
        <form class="form-horizontal" action="../controller/controller.php">
            <div class="container">
                <br>
             <input type="hidden" name="opcion" value="inicioCliente">
              <input type="submit" value="Cancelar" class="btn btn-info">
              </div>
        </form>

        </body>
</html>