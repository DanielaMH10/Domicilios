<!-- app/views/domiciliarios/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Domiciliarios</title>
</head>
<body>
    <h1>Lista de Domiciliarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <!-- Otros campos del domiciliario que desees mostrar en la lista -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($domiciliarios as $domiciliario): ?>
                <tr>
                    <td><?php echo $domiciliario['idDomiciliario']; ?></td>
                    <td><?php echo $domiciliario['nombreDomiciliario']; ?></td>
                    <td><?php echo $domiciliario['telefonoDomiciliario']; ?></td>
                    <td><?php echo $domiciliario['correoDomiciliario']; ?></td>
                    <!-- Otros campos del domiciliario que desees mostrar en la lista -->
                    <td>
                        <a href="/domiciliario/show/<?php echo $domiciliario['idDomiciliario']; ?>">Ver Detalles</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
