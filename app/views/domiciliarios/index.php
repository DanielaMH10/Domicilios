<?php

include_once "../../../config.php"; 
require FOLDER_CONFIG."conexion.php";

$db = new Conexion();
$conn = $db->conectar();

$query = "SELECT * FROM domiciliarios";
$sql = $conn->query($query);
$sql->execute();
$domiciliarios = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Domiciliarios</title>
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
        tr:nth-child(odd) {
            background-color: #f8f9fa;
        }
        tr:nth-child(even) {
            background-color: #e9ecef;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Lista de Domiciliarios</h1>
    <div class="acciones">
        <a href="../../../index.php" class="btn btn-success">Volver</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($domiciliarios as $domiciliario): ?>
                <tr>
                    <td><?php echo $domiciliario['idDomiciliario']; ?></td>
                    <td><?php echo $domiciliario['nombreDomiciliario']; ?></td>
                    <td><?php echo $domiciliario['telefonoDomiciliario']; ?></td>
                    <td><?php echo $domiciliario['correoDomiciliario']; ?></td>
                    <td>
                        <a href="<?=URL_VIEW_DOMI ?>show.php/?id=<?php echo $domiciliario['idDomiciliario']; ?>" class="btn btn-primary">Ver Detalles</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
