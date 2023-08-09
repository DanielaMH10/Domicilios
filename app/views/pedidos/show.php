<?php

include_once "../../../config.php"; 
require FOLDER_CONFIG."conexion.php";

$idPedido = $_GET['id'];

$db = new Conexion();
$conn = $db->conectar();

$query = "SELECT P.idPedido,P.idProducto,P.idCliente,P.idEstado,P.fechaPedido,C.cedulaCliente,C.nombreCliente,PR.nombreProducto,PR.precio,E.nombreEstado FROM pedidos AS P
            JOIN clientes AS C ON P.idCliente=C.idCliente
            JOIN productos AS PR ON P.idProducto=PR.idProducto
            JOIN estados AS E ON P.idEstado=E.idEstado
            WHERE P.idPedido='$idPedido'";

$sql = $conn->query($query);
$sql->execute();
$pedido = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Pedido</title>
    <?php include URL_JS . 'scripts.php' ?>
    
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        .pedido-details {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .pedido-details p {
            margin-bottom: 10px;
        }
        .acciones {
            text-align: center;
            margin-top: 20px;
        }
        .acciones a {
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #CB3F21;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .acciones a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Detalles del Pedido</h1>
    <div class="pedido-details">
        <p><strong>ID del Pedido:</strong> <?php echo $pedido['idPedido']; ?></p>
        <p><strong>Fecha del Pedido:</strong> <?php echo $pedido['fechaPedido']; ?></p>
        <p><strong>Producto:</strong> <?php echo $pedido['nombreProducto']; ?></p>
        <p><strong>Cliente:</strong> <?php echo $pedido['nombreCliente']; ?></p>
        <p><strong>Estado:</strong> <?php echo $pedido['nombreEstado']; ?></p>
    </div>
    <div  class="acciones">
        <a href="<?=URL_VIEW_PEDIDOS ?>index.php" class="btn btn-success">Volver</a>
    </div>
</body>
</html>
