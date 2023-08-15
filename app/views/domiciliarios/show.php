<?php

include_once "../../../config.php"; 
require FOLDER_CONFIG."conexion.php";

$idDomiciliario = $_GET['id'];

$db = new Conexion();
$conn = $db->conectar();

$query = "SELECT * FROM domiciliarios
            WHERE idDomiciliario='$idDomiciliario'";

$sql = $conn->query($query);
$sql->execute();
$domiciliario = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Domiciliario</title>
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
        .domiciliario-details {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .domiciliario-details p {
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
    <h1>Detalles del Domiciliario</h1>
    <div class="container">
        <div class="domiciliario-details">
            <p><strong>ID del Domiciliario:</strong> <?php echo $domiciliario['idDomiciliario']; ?></p>
            <p><strong>Nombre:</strong> <?php echo $domiciliario['nombreDomiciliario']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $domiciliario['telefonoDomiciliario']; ?></p>
            <p><strong>Correo:</strong> <?php echo $domiciliario['correoDomiciliario']; ?></p>
        </div>
        <div class="acciones">
            <a href="<?=URL_VIEW_DOMI ?>index.php" class="btn btn-success">Volver</a>
        </div>
    </div>
</body>
</html>
