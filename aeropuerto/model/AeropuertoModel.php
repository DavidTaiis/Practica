<?php
include 'Database.php';
include_once 'Cliente.php';
include_once 'Compania.php';
include_once 'Destino.php';
include_once 'Pais.php';
include_once 'Pasaje.php';
include_once 'Vuelo.php';

class AeropuertoModel{
    
    
    public function getCompanias(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from compania";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Proveedor:
        $listado = array();
        foreach ($resultado as $res){
            $compania = new Compania($res['ID_COMPANIA'],$res['NOMBRE_COMP'],$res['TELEFONO'],$res['EMAIL']);
            array_push($listado, $compania);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function insertarCompania($idCompania, $nombreComp, $telefono, $mail) {
        $pdo = Database::connect();
        $sql = "insert into compania(ID_COMPANIA,NOMBRE_COMP,TELEFONO,EMAIL) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idCompania, $nombreComp, $telefono, $mail));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    public function actualizarCompania($idCompania, $nombreComp, $telefono, $mail) {
        $pdo = Database::connect();
        $sql = "update compania set NOMBRE_COMP=?,TELEFONO=?,EMAIL=? where ID_COMPANIA=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($nombreComp, $telefono, $mail, $idCompania));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
      public function eliminarCompania($idCompania) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from compania where ID_COMPANIA=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idCompania));
        Database::disconnect();
    }
     public function getCompania($idCompania) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from compania where ID_COMPANIA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idCompania));
        //obtenemos la factura especifica:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $compania = new Compania($res['ID_COMPANIA'], $res['NOMBRE_COMP'], $res['TELEFONO'], $res['EMAIL']);
        Database::disconnect();
        //retornamos la factura encontrada:
        return $compania;
    }
    //////////////////////////////////////////////////////////////////////////
   
    /////////////////////////////////
    
    
    public function getPaises(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from pais";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Proveedor:
        $listado = array();
        foreach ($resultado as $res){
            $pais = new Pais($res['ID_PAIS'],$res['PAIS']);
            array_push($listado, $pais);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function insertarPais($idPais, $pais) {
        $pdo = Database::connect();
        $sql = "insert into pais(ID_PAIS,PAIS) values(?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idPais, $pais));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    public function actualizarPais($idPais, $pais) {
        $pdo = Database::connect();
        $sql = "update pais set PAIS=? where ID_PAIS=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($pais, $idPais));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
      public function eliminarPais($idPais) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from pais where ID_PAIS=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idPais));
        Database::disconnect();
    }
     public function getPais($idPais) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from pais where ID_PAIS=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idPais));
        //obtenemos la factura especifica:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $pais = new Pais($res['ID_PAIS'], $res['PAIS']);
        Database::disconnect();
        //retornamos la factura encontrada:
        return $pais;
    }
    //////////////////
    public function getPasajes(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from pasaje";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Proveedor:
        $listado = array();
        foreach ($resultado as $res){
            $pasaje = new Pasaje($res['ID_PASAJE'],$res['ID_CLIENTE'],$res['ID_VUELO'],$res['CLASE'],$res['COSTO']);
            array_push($listado, $pasaje);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function insertarPasaje($idPasaje, $idCliente, $id_vuelo, $costo,$clase) {
        $pdo = Database::connect();
        if($clase=="PRIMERA CLASE"){
            $costo=2000;
        }else{
            $costo=1000;
        }
        $sql = "insert into pasaje(ID_PASAJE,ID_CLIENTE,ID_VUELO,COSTO,CLASE) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idPasaje, $idCliente, $id_vuelo, $costo,$clase));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    public function actualizarPasaje($idPasaje, $idCliente, $idVuelo, $clase,$costo) {
        $pdo = Database::connect();
        if($clase=="PRIMERA CLASE"){
            $costo=2000;
        }else
            $costo=1000;
        $sql = "update pasaje set ID_CLIENTE=?,ID_VUELO=?,CLASE=?, COSTO=? where ID_PASAJE=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idCliente, $idVuelo, $clase, $costo,$idPasaje));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
      public function eliminarPasaje($idPasaje) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from pasaje where ID_PASAJE=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idPasaje));
        Database::disconnect();
    }
     public function getPasaje($idPasaje) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from pasaje where ID_PASAJE=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idPasaje));
        //obtenemos la factura especifica:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $pasaje = new Pasaje($res['ID_PASAJE'], $res['ID_CLIENTE'], $res['ID_VUELO'], $res['COSTO'], $res['CLASE']);
        Database::disconnect();
        //retornamos la factura encontrada:
        return $pasaje;
    }
    ////////////////////////
    public function getVuelos(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from vuelo";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Proveedor:
        $listado = array();
        foreach ($resultado as $res){
            $vuelo = new Vuelo($res['ID_VUELO'],$res['ID_COMPANIA'],$res['ID_PAIS'],$res['Fecha'],$res['CAPACIDAD'],$res['NUM_VUELO']);
            array_push($listado, $vuelo);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
   public function insertarVuelo($idVuelo, $idCompania,$idPais,$fecha, $capacidad, $numVuelo) {
        $pdo = Database::connect();
        $sql = "insert into vuelo(ID_VUELO,ID_COMPANIA,ID_PAIS,Fecha,CAPACIDAD,NUM_VUELO) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idVuelo, $idCompania,$idPais,$fecha, $capacidad, $numVuelo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    public function actualizarVuelo($idVuelo, $idCompania,$idPais,$fecha, $capacidad, $numVuelo) {
        $pdo = Database::connect();
        $sql = "update vuelo set ID_COMPANIA=?,ID_PAIS=?,Fecha=?, CAPACIDAD=?,NUM_VUELO=? where ID_VUELO=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idCompania,$idPais,$fecha, $capacidad, $numVuelo, $idVuelo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
      public function eliminarVuelo ($idVuelo) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from vuelo where ID_VUELO=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idVuelo));
        Database::disconnect();
    }
     public function getVuelo($idVuelo) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from vuelo where ID_VUELO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idVuelo));
        //obtenemos la factura especifica:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $vuelo = new Vuelo($res['ID_VUELO'], $res['ID_COMPANIA'],$res['ID_PAIS'],$res['Fecha'], $res['CAPACIDAD'], $res['NUM_VUELO']);
        Database::disconnect();
        //retornamos la factura encontrada:
        return $vuelo;
    }
    //////////////////////////////////////////////////
     public function getCliente($idCliente) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from cliente where ID_CLIENTE=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idCliente));
        //obtenemos la factura especifica:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = new Cliente($res['ID_CLIENTE'], $res['NOMBRE_CLI'], $res['EDAD_CLI'], $res['GENERO'],$res['CEDULA']);
        Database::disconnect();
        //retornamos la factura encontrada:
        return $cliente;
    }
    public function actualizarCliente($idCliente, $nombreCli, $edadCli, $genero,$cedula) {
        $pdo = Database::connect();
        $sql = "update cliente set NOMBRE_CLI=?,EDAD_CLI=?,GENERO=?,CEDULA=? where ID_CLIENTE=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($nombreCli, $edadCli, $genero, $cedula,$idCliente));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
     
     public function getClientes(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from cliente";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Proveedor:
        $listado = array();
        foreach ($resultado as $res){
            $cliente = new Cliente($res['ID_CLIENTE'],$res['NOMBRE_CLI'],$res['EDAD_CLI'],$res['GENERO'],$res['CEDULA']);
            array_push($listado, $cliente);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function insertarCliente($idCliente, $nombreCli, $edad, $genero,$cedula) {
        $pdo = Database::connect();
        $sql = "insert into cliente(ID_CLIENTE,NOMBRE_CLI,EDAD_CLI,GENERO,CEDULA) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idCliente, $nombreCli, $edad, $genero,$cedula));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
}

