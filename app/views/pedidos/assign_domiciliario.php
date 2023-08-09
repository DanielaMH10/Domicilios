<!-- app/views/pedidos/assign_domiciliario.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Asignar Domiciliario</title>
</head>
<body>
    <h1>Asignar Domiciliario para el Pedido</h1>
    <form action="/pedido/storeAssignment/<?php echo $pedido['idPedido']; ?>" method="POST">
        <label for="domiciliario">Seleccionar Domiciliario:</label>
        <select name="idDomiciliario" id="domiciliario">
            <?php foreach ($domiciliarios as $domiciliario): ?>
                <option value="<?php echo $domiciliario['idDomiciliario']; ?>">
                    <?php echo $domiciliario['nombreDomiciliario']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" value="Asignar Domiciliario">
    </form>
</body>
</html>
