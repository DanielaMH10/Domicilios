<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Pedido</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<?php

include_once "../../config.php"; 
require FOLDER_CONFIG."conexion.php";

$idProducto = $_POST['idProducto'];
$idCliente = $_POST['idCliente'];
$idEstado = $_POST['idEstado'];
$idPedido = $_GET['id'];

$db = new Conexion();
$conn = $db->conectar();
$sql = "UPDATE pedidos SET idProducto = '$idProducto', idCliente = '$idCliente', idEstado = '$idEstado'
        WHERE idPedido = '$idPedido'";
$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
    echo ('<script>
        Swal.fire({
            icon: "success",
            title: "¡Éxito!",
            text: "Actualizado con éxito"
        }).then((result) => {
            if (result.isConfirmed) {
                var currentURL = window.location.href;
                    console.log(currentURL);
                window.location.href = "../../views/pedidos/index.php"; 
            }
        });
    </script>');
} else {
    echo ('<script>
        Swal.fire({
            icon: "error",
            title: "¡Error!",
            text: "No se pudo registrar el usuario"
        });
    </script>');
}

?>
</body>
</html>