<?php
	include_once "../../../config.php"; 
    require FOLDER_CONFIG."conexion.php";
    //require_once FOLDER_CONTROLLER."PedidoController.php";

    $db = new Conexion();
    $conn = $db->conectar();
    
    $query = "SELECT P.idPedido,P.idProducto,P.idCliente,P.idEstado,P.fechaPedido,C.cedulaCliente,C.nombreCliente,PR.nombreProducto,PR.precio,E.nombreEstado FROM pedidos AS P
                JOIN clientes AS C ON P.idCliente=C.idCliente
                JOIN productos AS PR ON P.idProducto=PR.idProducto
                JOIN estados AS E ON P.idEstado=E.idEstado";
    $sql = $conn->query($query);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    /*$pedidoController = new PedidoController();
    $pedidos = $pedidoController->index();*/

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pedidos</title>
    <link rel="stylesheet"  href="../../../public/css/listadoPedidos.css">
    <?php include URL_JS . 'scripts.php' ?>
</head>
<body>
    <h1 style="margin-top: 50px;">Lista de Pedidos</h1>
    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha del Pedido</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $res): ?>
                <tr>
                    <td><?php echo $res['idPedido']; ?></td>
                    <td><?php echo $res['fechaPedido']; ?></td>
                    <td><?php echo $res['nombreCliente']; ?></td>
                    <td><?php echo $res['nombreEstado']; ?></td>
                    <td class="acciones">
                        <a href="<?=URL_VIEW_PEDIDOS ?>show.php/?id=<?php echo $res['idPedido']; ?>" class="btn btn-primary">Ver</a>
                        <a href="<?=URL_VIEW_PEDIDOS ?>edit.php/?id=<?php echo $res['idPedido']; ?>" class="btn btn-secondary">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="crear-pedido">
        <a href="<?=URL_VIEW_PEDIDOS ?>create.php" class="btn btn-success">Crear Nuevo Pedido</a>
    </div>
</body>
</html>
