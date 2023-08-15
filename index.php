<?php
	include "config.php"; 
    require "./config/conexion.php";

    $db = new Conexion();
    $db->conectar(); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Domicilios</title>
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
        h2 {
            color: #343a40;
            margin-top: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        li a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }
        li a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema de Domicilios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=URL_VIEW_PEDIDOS ?>">Ver Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=URL_VIEW_DOMI ?>">Ver Domiciliarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 class="text-center">Bienvenido al Sistema de Domicilios</h1>
        <div class="text-center">
            <img src="./public/4966.jpg" alt="Imagen de Domicilios" class="img-fluid">
        </div>
    </div>
</body>
</html>
