<?php

include_once "../../../config.php"; 
require FOLDER_CONFIG."conexion.php";

//print_r($idPedido);die();
$db = new Conexion();
$conn = $db->conectar();
$idPedido = $_GET['id'];
$query = "SELECT P.idPedido,P.idProducto,P.idCliente,P.idEstado,P.fechaPedido,C.cedulaCliente,C.nombreCliente,PR.nombreProducto,PR.precio,E.nombreEstado FROM pedidos AS P
            JOIN clientes AS C ON P.idCliente=C.idCliente
            JOIN productos AS PR ON P.idProducto=PR.idProducto
            JOIN estados AS E ON P.idEstado=E.idEstado
            WHERE P.idPedido='$idPedido'";

$sql = $conn->query($query);
$sql->execute();
$pedido = $sql->fetch(PDO::FETCH_ASSOC);


$query = "SELECT *FROM productos";
$sql = $conn->query($query);
$sql->execute();
$productos = $sql->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM clientes";
$sql = $conn->query($query);
$sql->execute();
$clientes = $sql->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM estados";
$sql = $conn->query($query);
$sql->execute();
$estados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Pedido</title>
    <?php include URL_JS . 'scripts.php' ?>
    <link rel="stylesheet" href="../../../public/css/editPedidos.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .editar-form {
            max-width: 400px;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .editar-form h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        .editar-form label {
            font-weight: bold;
        }
        .editar-form select,
        .editar-form input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .acciones {
            text-align: center;
            margin-top: 20px;
        }
        .acciones a {
            padding: 10px 20px;
            background-color: red;
            color: #fff;
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
    <div class="editar-form">
        <h1>Editar Pedido</h1>
        <form action="<?=URL_CONTROLLER?>UpdatePedidoController.php/?id=<?php echo $pedido['idPedido']; ?>" method="POST">
            <div class="mb-3">
                <label for="producto" class="form-label">Producto:</label>
                <select name="idProducto" id="producto" class="form-select">
                    <?php foreach ($productos as $productos): ?>
                        <option value="<?php echo $productos['idProducto']; ?>" <?php echo ($productos['idProducto'] === $pedido['idProducto']) ? 'selected' : ''; ?>>
                            <?php echo $productos['nombreProducto']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <select name="idCliente" id="cliente" class="form-select">
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['idCliente']; ?>" <?php echo ($cliente['idCliente'] === $pedido['idCliente']) ? 'selected' : ''; ?>>
                            <?php echo $cliente['nombreCliente']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <select name="idEstado" id="estado" class="form-select">
                    <?php foreach ($estados as $estado): ?>
                        <option value="<?php echo $estado['idEstado']; ?>" <?php echo ($estado['idEstado'] === $pedido['idEstado']) ? 'selected' : ''; ?>>
                            <?php echo $estado['nombreEstado']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" value="Actualizar Pedido" class="btn btn-primary">
            </div>
        </form>
        <div class="acciones">
            <a href="<?=URL_VIEW_PEDIDOS ?>index.php" class="btn btn-success">Volver</a>
        </div>
    </div>
</body>
</html>
