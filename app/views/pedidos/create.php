<?php
include_once "../../../config.php"; 
require FOLDER_CONFIG."conexion.php";

$db = new Conexion();
$conn = $db->conectar();

$query = "SELECT * FROM productos";
$sql = $conn->query($query);
$sql->execute();
$productos = $sql->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM clientes";
$sql = $conn->query($query);
$sql->execute();
$clientes = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Nuevo Pedido</title>
    <link rel="stylesheet"  href="../../../public/css/crearPedidos.css">
    <?php include URL_JS . 'scripts.php' ?>
</head>
<body>
    <h1>Crear Nuevo Pedido</h1>
    <form action="<?=URL_CONTROLLER?>PedidoController.php" method="POST">
        <div class="mb-3">
            <label for="producto" class="form-label">Producto:</label>
            <select name="idProducto" id="producto" class="form-select" required>
                <option value="" selected disabled>Seleccione un producto</option>
                <?php foreach ($productos as $producto): ?>
                    <option value="<?php echo $producto['idProducto']; ?>"><?php echo $producto['nombreProducto']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente:</label>
            <select name="idCliente" id="cliente" class="form-select" required>
                <option value="" selected disabled>Seleccione un cliente</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente['idCliente']; ?>"><?php echo $cliente['nombreCliente']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Crear Pedido" class="btn btn-primary">
    </form>
</body>
</html>
