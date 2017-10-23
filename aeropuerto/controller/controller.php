<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/AeropuertoModel.php';
session_start();
$aeroModel = new AeropuertoModel();
//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];

switch ($opcion) {
        case "editar":
        //obtenemos los parametros del formulario:
        $idCompania=$_REQUEST['idCompania'];
        //Buscamos los datos
        $compania=$aeroModel->getCompania($idCompania);
        //guardamos en sesion para edicion posterior:
        $_SESSION['compania'] = serialize($compania);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarCompania.php');
        break;
    
    case "actualizar":
        //obtenemos los parametros del formulario:
        $idCompania=$_REQUEST['idCompania'];
        $nombreCompania=$_REQUEST['nombreCompania'];
        $telefono=$_REQUEST['telefono'];
        $mail=$_REQUEST['mail'];
        //actualizamos la factura:
        $aeroModel->actualizarCompania($idCompania,$nombreCompania, $telefono, $mail);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getCompanias();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;


    case "listar":
        //obtenemos la lista de facturas:
        $listado = $aeroModel->getCompanias();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a la pagina index para visualizar:
        header('Location: ../view/index.php');
        break;

    case "insertar":
        //obtenemos los parametros del formulario:
        $idCompania= $_REQUEST['idCompania'];
        $nombreCompania = $_REQUEST['nombreCompania'];
        $telefono = $_REQUEST['telefono'];
        $mail = $_REQUEST['mail'];
        $aeroModel->insertarCompania($idCompania,$nombreCompania,$telefono, $mail);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getCompanias();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

 
    case "eliminar":
//obtenemos el codigo del producto a eliminar:
        $idCompania = $_REQUEST['idCompania'];
//eliminamos el producto:
        $aeroModel->eliminarCompania($idCompania);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $aeroModel->getCompanias();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    ///////////////////////////////////////////////////////////////
    
     case "editarPais":
        //obtenemos los parametros del formulario:
        $idPais=$_REQUEST['idPais'];
        //Buscamos los datos
        $pais=$aeroModel->getPais($idPais);
        //guardamos en sesion para edicion posterior:
        $_SESSION['pais'] = serialize($pais);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarPais.php');
        break;
    
    case "actualizarPais":
        //obtenemos los parametros del formulario:
        $idPais=$_REQUEST['idPais'];
        $pais=$_REQUEST['pais'];
        //actualizamos la factura:
        $aeroModel->actualizarPais($idPais,$pais);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getPaises();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/paises.php');
        break;


    case "listarPais":
        //obtenemos la lista de facturas:
        $listado = $aeroModel->getPaises();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a la pagina index para visualizar:
        header('Location: ../view/paises.php');
        break;

    case "insertarPais":
        //obtenemos los parametros del formulario:
        $idPais= $_REQUEST['idPais'];
        $pais = $_REQUEST['pais'];
        $aeroModel->insertarPais($idPais,$pais);
        $listado = $aeroModel->getPaises();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/paises.php');
        break;

 
    case "eliminarPais":
//obtenemos el codigo del producto a eliminar:
        $idPais = $_REQUEST['idPais'];
//eliminamos el producto:
        $aeroModel->eliminarPais($idPais);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $aeroModel->getPaises();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/paises.php');
        break;
    //////////////////////
    case "editarVuelo":
        //obtenemos los parametros del formulario:
        $idVuelo=$_REQUEST['idVuelo'];
        //Buscamos los datos
        $vuelo=$aeroModel->getVuelo($idVuelo);
        //guardamos en sesion para edicion posterior:
        $_SESSION['vuelo'] = serialize($vuelo);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarVuelo.php');
        break;
    
    case "actualizarVuelo":
        //obtenemos los parametros del formulario:
        $idVuelo=$_REQUEST['idVuelo'];
        $idCompania=$_REQUEST['idCompania'];
        $idPais=$_REQUEST['idPais'];
        $fecha=$_REQUEST['fecha'];
        $capacidad=$_REQUEST['capacidad'];
        $numVuelo=$_REQUEST['numVuelo'];
        //actualizamos la factura:
        $aeroModel->actualizarVuelo($idVuelo,$idCompania,$idPais,$fecha,$capacidad,$numVuelo);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getVuelos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/vuelos.php');
        break;


    case "listarVuelo":
        //obtenemos la lista de facturas:
        $listado = $aeroModel->getVuelos();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a la pagina index para visualizar:
        header('Location: ../view/vuelos.php');
        break;

    case "insertarVuelo":
        //obtenemos los parametros del formulario:
        $idVuelo= $_REQUEST['idVuelo'];
        $idCompania = $_REQUEST['idCompania'];
        $idPais=$_REQUEST['idPais'];
        $fecha=$_REQUEST['fecha'];
        $capacidad=$_REQUEST['capacidad'];
        $numVuelo=$_REQUEST['numVuelo'];
        $aeroModel->insertarVuelo($idVuelo,$idCompania,$idPais,$fecha,$capacidad,$numVuelo);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getVuelos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/vuelos.php');
        break;

 
    case "eliminarVuelo":
//obtenemos el codigo del producto a eliminar:
        $idVuelo = $_REQUEST['idVuelo'];
//eliminamos el producto:
        $aeroModel->eliminarVuelo($idVuelo);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $aeroModel->getVuelos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/vuelos.php');
        break;
    
    /////////////////////////////
    case "editarCliente":
        //obtenemos los parametros del formulario:
        $idCliente=$_REQUEST['idCliente'];
      
        $cliente=$aeroModel->getCliente($idCliente);
        //guardamos en sesion para edicion posterior:
        $_SESSION['cliente'] = serialize($cliente);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarCliente.php');
        break;
    
    case "actualizarCliente":
         $idCliente=$_REQUEST['idCliente'];
        
        $nombreCli=$_REQUEST['nombreCli'];
        $edad=$_REQUEST['edad'];
        $genero=$_REQUEST['genero'];
        $cedula=$_REQUEST['cedula'];
        $aeroModel->actualizarCliente($idCliente,$nombreCli, $edad, $genero,$cedula);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getClientes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/clientes.php');
        break;


    case "listarClientes":
        //obtenemos la lista de facturas:
        $listado = $aeroModel->getClientes();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a la pagina index para visualizar:
        header('Location: ../view/clientes.php');
        break;

    case "insertarCliente":
      $idCliente=$_REQUEST['idCliente'];
        //Buscamos los datos
        $nombreCli=$_REQUEST['nombreCli'];
        $edadCli=$_REQUEST['edad'];
        $genero=$_REQUEST['genero'];
        $cedula=$_REQUEST['cedula'];
        $aeroModel->insertarCliente($idCliente,$nombreCli,$edadCli, $genero,$cedula);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getClientes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/clientes.php');
        break;

 
    case "eliminarCliente":
//obtenemos el codigo del producto a eliminar:
        $idCompania = $_REQUEST['idCompania'];
//eliminamos el producto:
        $aeroModel->eliminarCompania($idCompania);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $aeroModel->getCompanias();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    
    //////////////////////
     case "editarPasaje":
        //obtenemos los parametros del formulario:
        $idPasaje=$_REQUEST['idPasaje'];
        $pasaje=$aeroModel->getPasaje($idPasaje);
         $_SESSION['pasaje'] = serialize($pasaje);
        header('Location: ../view/editarPasaje.php');
        break;
    
    case "actualizarPasajes":
        //obtenemos los parametros del formulario:
        $idPasaje=$_REQUEST['idPasaje'];
        //Buscamos los datos
        $idCli=$_REQUEST['idCli'];
        $idVuelo=$_REQUEST['idVuelo'];
        $costo=$_REQUEST['costo'];
        $clase=$_REQUEST['clase'];
        //actualizamos la factura:
        $aeroModel->actualizarPasaje($idPasaje,$idCli,$idVuelo, $clase,$costo);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getPasajes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/pasajes.php');
        break;


    case "listarPasajes":
        //obtenemos la lista de facturas:
        $listado = $aeroModel->getPasajes();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a la pagina index para visualizar:
        header('Location: ../view/pasajes.php');
        break;

    case "insertarPasajes":
    $idPasaje=$_REQUEST['idPasaje'];
        //Buscamos los datos
        $idCli=$_REQUEST['idCli'];
        $idVuelo=$_REQUEST['idVuelo'];
        $costo=$_REQUEST['costo'];
        $clase=$_REQUEST['clase'];
        $aeroModel->insertarPasaje($idPasaje,$idCli,$idVuelo, $costo,$clase);
        //actualizamos lista de facturas:
        $listado = $aeroModel->getPasajes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/pasajes.php');
        break;

 
    case "eliminarPasajes":
//obtenemos el codigo del producto a eliminar:
        $idPasaje = $_REQUEST['idPasaje'];
//eliminamos el producto:
        $aeroModel->eliminarPasaje($idPasaje);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $aeroModel->getPasajes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/pasajes.php');
        break;
    case "inicioCliente":
        header('Location: ../view/clientes.php');
        break;
     case "inicioPasaje":
        header('Location: ../view/pasajes.php');
        break;
     case "inicioVuelo":
        header('Location: ../view/vuelos.php');
        break;
    case "inicioCompania":
        header('Location: ../view/index.php');
        break;
    
    
    default:header('Location: ../view/pasajes.php');
}


