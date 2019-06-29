<?php
header('Content-Type: application/json');

if(isset($_POST['correo']) && $_SERVER['REQUEST_METHOD']=='POST')
{
require_once 'conexion.php';
  // Extraer datos.
  

  // Validar.
  if(trim($_POST['correo']) === '' || trim($_POST['clave']) === '')
  {
    return http_response_code(400);
  }

  // Sanitizar para hackers.
  $correo = mysqli_real_escape_string($con, trim($_POST['correo']));
  $clave = mysqli_real_escape_string($con, trim($_POST['clave']));


  // insertar.
  $sql = "select * from usuarios where correo='{$correo}' and clave=md5('{$clave}')";

    $res=$con->query($sql);
    if($datos=$res->fetch_object()){
        $nombre=$datos->nombre;
        echo json_encode(array("respuesta"=>"OK","nombre"=>$nombre));
    }else{
        echo json_encode(array("respuesta"=>"error","mensaje"=>"Datos de acceso incorrectos."));
    }
  
}