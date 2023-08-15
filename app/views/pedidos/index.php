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
    <?php include URL_JS . 'scripts.php' ?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        .table-container {
            margin: 20px auto;
            width: 80%;
        }
        table {
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e9ecef;
        }
        .acciones {
            text-align: center;
        }
        .acciones a {
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .acciones a:hover {
            background-color: #0056b3;
        }
        .crear-pedido {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .crear-pedido a {
            padding: 10px 20px;
            background-color: #169b63;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .crear-pedido a:hover {
            background-color: #0056b3;
        }
        .acciones {
            text-align: center;
            margin-top: 20px;
        }
        
    </style>
</head>
<body>
    <h1 style="margin-top: 50px;">Lista de Pedidos</h1>
    <div style="text-align: center;">
        <a href="../../../index.php" class="btn btn-success">Volver</a>
    </div>
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
    <div class="acciones">
        <a href="<?=URL_VIEW_DOMI ?>index.php" class="btn btn-success">Volver</a>
    </div>
</body>
</html>
