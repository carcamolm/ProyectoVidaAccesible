<?php
header('Content-Type: application/json');

if(isset($_POST['nombre']) && $_SERVER['REQUEST_METHOD']=='POST')
{
require_once 'conexion.php';
  // Extraer datos.
  

  // Validar.
  if(trim($_POST['nombre']) === '' || trim($_POST['clave']) === '')
  {
    return http_response_code(400);
  }

  // Sanitizar para hackers.
  $nombre = mysqli_real_escape_string($con, trim($_POST['nombre']));
  $correo = mysqli_real_escape_string($con, trim($_POST['correo']));
  $clave = mysqli_real_escape_string($con, trim($_POST['clave']));


  // insertar.
  $sql = "INSERT INTO usuarios VALUES ('{$nombre}','{$correo}',md5('{$clave}'))";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    echo json_encode(array("respuesta"=>"OK","mensaje"=>"Usuario registrado correctamente"));
  }
  else
  {
    echo json_encode(array("respuesta"=>"Error","mensaje"=>"El usuario ya se encuentra registrado"));
  }
}