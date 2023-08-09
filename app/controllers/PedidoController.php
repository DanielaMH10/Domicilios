<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Pedidos</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<?php

include_once "../../config.php"; 
require FOLDER_CONFIG."conexion.php";

$data = [
    'idProducto' => $_POST['idProducto'],
    'idCliente' => $_POST['idCliente'],
    'fechaPedido' => date('Y-m-d H:i:s'),
    'idEstado' => 1 
];

$db = new Conexion();
$conn = $db->conectar();

$sql = "INSERT INTO pedidos (idProducto, idCliente, fechaPedido, idEstado)
        VALUES (:idProducto, :idCliente, :fechaPedido, :idEstado)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':idProducto', $data['idProducto']);
$stmt->bindParam(':idCliente', $data['idCliente']);
$stmt->bindParam(':fechaPedido', $data['fechaPedido']);
$stmt->bindParam(':idEstado', $data['idEstado']);

if ($stmt->execute()) {
    echo ('<script>
        Swal.fire({
            icon: "success",
            title: "¡Éxito!",
            text: "Registrado con éxito"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../views/pedidos/index.php"; 
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


<?php

//print_r($data);die;

/*class PedidoController
{
    // Mostrar la lista de pedidos
    public function index()
    {
        $pedidoModel = new Pedido();
        $pedidos = $pedidoModel->getAll();
        require URL_VIEW_PEDIDOS."index.php";
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de un nuevo pedido
        // Puedes obtener los productos disponibles desde el modelo Producto
        // y los clientes disponibles desde el modelo Cliente
        $productoModel = new Producto(); // Suponiendo que has creado el modelo Producto
        $productos = $productoModel->getAll(); // Método getAll() para obtener todos los productos de la base de datos

        $clienteModel = new Cliente(); // Suponiendo que has creado el modelo Cliente
        $clientes = $clienteModel->getAll(); // Método getAll() para obtener todos los clientes de la base de datos

        // Carga la vista para mostrar el formulario de creación de pedido
        include 'app/views/pedidos/create.php';
    }

    // Guardar un nuevo pedido en la base de datos
    public function store()
    {
        // Lógica para guardar un nuevo pedido en la base de datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Se recibieron datos del formulario de creación
            $data = [
                'idProducto' => $_POST['idProducto'],
                'idCliente' => $_POST['idCliente'],
                'fechaPedido' => date('Y-m-d H:i:s'), // Fecha y hora actual
                'idEstado' => 1 // Estado por defecto para un nuevo pedido (puedes modificarlo según tu estructura de estados)
            ];

            $pedidoModel = new Pedido(); // Suponiendo que has creado el modelo Pedido
            $result = $pedidoModel->create($data); // Método create() para guardar el nuevo pedido en la base de datos

            if ($result) {
                // Pedido creado con éxito
                // Redirige a la lista de pedidos o muestra un mensaje de éxito
                header('Location: /pedido');
                exit();
            } else {
                // Error al crear el pedido
                // Muestra un mensaje de error o redirige a una página de error
                // Por ejemplo:
                echo "Error al crear el pedido";
                exit();
            }
        } else {
            // Si la solicitud no es por POST, redirige a la página de creación de pedidos
            header('Location: /pedido/create');
            exit();
        }
    }

    // Mostrar los detalles de un pedido específico
    public function show($idPedido)
    {
        // Lógica para mostrar los detalles de un pedido específico
        $pedidoModel = new Pedido(); // Suponiendo que has creado el modelo Pedido
        $pedido = $pedidoModel->getById($idPedido); // Método getById() para obtener los detalles del pedido con el ID proporcionado

        if ($pedido) {
            // El pedido se encontró en la base de datos
            // Carga la vista para mostrar los detalles del pedido
            include 'app/views/pedidos/show.php';
        } else {
            // El pedido no se encontró en la base de datos
            // Muestra un mensaje de error o redirige a una página de error
            // Por ejemplo:
            echo "Pedido no encontrado";
            exit();
        }
    }

    // Mostrar formulario para editar un pedido específico
    public function edit($idPedido)
    {
        // Lógica para mostrar el formulario de edición de un pedido específico
        $pedidoModel = new Pedido(); // Suponiendo que has creado el modelo Pedido
        $pedido = $pedidoModel->getById($idPedido); // Método getById() para obtener los detalles del pedido con el ID proporcionado

        if ($pedido) {
            // El pedido se encontró en la base de datos
            // Pasa los datos del pedido a la vista correspondiente para que el usuario pueda editarlos
            include 'app/views/pedidos/edit.php';
        } else {
            // El pedido no se encontró en la base de datos
            // Muestra un mensaje de error o redirige a una página de error
            // Por ejemplo:
            echo "Pedido no encontrado";
            exit();
        }
    }

    // Actualizar un pedido específico en la base de datos
    public function update($idPedido)
    {
        // Lógica para actualizar un pedido específico en la base de datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Se recibieron datos del formulario de edición
            $data = [
                'idProducto' => $_POST['idProducto'],
                'idCliente' => $_POST['idCliente'],
                'fechaPedido' => $_POST['fechaPedido'], // Fecha del pedido editada por el usuario
                'idEstado' => $_POST['idEstado'] // Estado del pedido editado por el usuario
            ];

            $pedidoModel = new Pedido(); // Suponiendo que has creado el modelo Pedido
            $result = $pedidoModel->update($idPedido, $data); // Método update() para actualizar el pedido en la base de datos

            if ($result) {
                // Pedido actualizado con éxito
                // Redirige a la vista de detalles del pedido actualizado o muestra un mensaje de éxito
                header('Location: /pedido/show/' . $idPedido);
                exit();
            } else {
                // Error al actualizar el pedido
                // Muestra un mensaje de error o redirige a una página de error
                // Por ejemplo:
                echo "Error al actualizar el pedido";
                exit();
            }
        } else {
            // Si la solicitud no es por POST, redirige a la página de edición del pedido
            header('Location: /pedido/edit/' . $idPedido);
            exit();
        }
    }

    // Asignar un pedido a un domiciliario
    public function assignDomiciliario($idPedido)
    {
        // Lógica para asignar un pedido específico a un domiciliario
        $pedidoModel = new Pedido(); // Suponiendo que has creado el modelo Pedido
        $pedido = $pedidoModel->getById($idPedido); // Método getById() para obtener los detalles del pedido con el ID proporcionado

        if (!$pedido) {
            // El pedido no se encontró en la base de datos
            // Muestra un mensaje de error o redirige a una página de error
            // Por ejemplo:
            echo "Pedido no encontrado";
            exit();
        }

        // Verificar si el pedido ya está asignado a un domiciliario
        if ($pedido['idDomiciliario']) {
            // El pedido ya está asignado a un domiciliario
            // Muestra un mensaje o redirige a una página de edición de la asignación
            // Por ejemplo:
            echo "El pedido ya está asignado a un domiciliario";
            exit();
        }

        $domiciliarioModel = new Domiciliario(); // Suponiendo que has creado el modelo Domiciliario
        $domiciliarios = $domiciliarioModel->getAll(); // Método getAll() para obtener todos los domiciliarios de la base de datos

        // Carga la vista para que el usuario seleccione el domiciliario
        include 'app/views/pedidos/assign_domiciliario.php';
    }


}*/

?>