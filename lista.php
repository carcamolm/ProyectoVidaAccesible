<?php

require_once 'conexion.php';
 
  // insertar.
  $sql = "select * from usuarios order by nombre";

 

?>
<!DOCTYPE html>
<html>
<head>
<style>
ol {
  background: #218309;
  padding: 20px;
}

ul {
  background: #3399ff;
  padding: 20px;
}

ol li {
  background: #ffe5e5;
  padding: 5px;
  margin-left: 35px;
}

ul li {
  background: #cce5ff;
  margin: 5px;
  padding:10px;
  border-radius:10px;
}
</style>
</head>
<body>

<h1>Usuario registrados:</h1>


<ul>
    <?php
    $res=$con->query($sql);
    while($datos=$res->fetch_object()){
        ?>
        
        <li><strong>Nombre:</strong> <?php echo $datos->nombre;?></li>
        <li><strong>Correo:</strong> <?php echo $datos->correo;?></li>
        <li><strong>Clave:</strong> <?php echo $datos->clave;?></li>
        <hr/>
        <?php
    }
  
  ?>
  

</ul>

</body>
</html>
