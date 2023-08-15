<?php

include_once "../../../config.php"; 
require FOLDER_CONFIG."conexion.php";

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
$domiciliarios = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Asignar Domiciliario</title>
    <link rel="stylesheet" href="../../../public/css/assign.css">
    <?php include_once URL_JS . 'scripts.php' ?>
</head>
<body>
    <div class="asignar-form">
        <h1>Asignar Domiciliario para el Pedido</h1>
        <form action="/pedido/storeAssignment/<?php echo $pedido['idPedido']; ?>" method="POST">
            <div class="mb-3">
                <label for="domiciliario" class="form-label">Seleccionar Domiciliario:</label>
                <select name="idDomiciliario" id="domiciliario" class="form-select">
                    <?php foreach ($domiciliarios as $domiciliario): ?>
                        <option value="<?php echo $domiciliario['idDomiciliario']; ?>">
                            <?php echo $domiciliario['nombreDomiciliario']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" value="Asignar Domiciliario" class="btn btn-primary">
            </div>
        </form>
        <div class="acciones">
            <a href="<?=URL_VIEW_PEDIDOS ?>index.php" class="btn btn-success">Volver</a>
        </div>
    </div>
</body>
</html>
