<?php
	include "config.php"; 
    require "./config/conexion.php";

    $db = new Conexion();
    $db->conectar(); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Domicilios</title>
</head>
<body>
    <h1>Bienvenido al Sistema de Domicilios</h1>

    <h2>Menú de Navegación</h2>
    <ul>
        <li><a href="<?=URL_VIEW_PEDIDOS ?>">Ver Pedidos</a></li>
        <li><a href="<?=URL_VIEW_DOMI ?>">Ver Domiciliarios</a></li>
    </ul>
</body>
</html>
