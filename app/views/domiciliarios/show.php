<!-- app/views/domiciliarios/show.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Domiciliario</title>
</head>
<body>
    <h1>Detalles del Domiciliario</h1>
    <p><strong>ID del Domiciliario:</strong> <?php echo $domiciliario['idDomiciliario']; ?></p>
    <p><strong>Nombre:</strong> <?php echo $domiciliario['nombreDomiciliario']; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $domiciliario['telefonoDomiciliario']; ?></p>
    <p><strong>Correo:</strong> <?php echo $domiciliario['correoDomiciliario']; ?></p>
    <!-- Otros detalles del domiciliario que desees mostrar -->
</body>
</html>
