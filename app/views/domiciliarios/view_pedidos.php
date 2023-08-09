<!-- app/views/domiciliarios/view_pedidos.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Pedidos Asignados al Domiciliario</title>
</head>
<body>
    <h1>Pedidos Asignados al Domiciliario</h1>
    <table>
        <thead>
            <tr>
                <th>ID del Pedido</th>
                <th>Fecha del Pedido</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidosAsignados as $pedido): ?>
                <tr>
                    <td><?php echo $pedido['idPedido']; ?></td>
                    <td><?php echo $pedido['fechaPedido']; ?></td>
                    <td><?php echo $pedido['nombreProducto']; ?></td>
                    <td><?php echo $pedido['nombreCliente']; ?></td>
                    <td><?php echo $pedido['nombreEstado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
