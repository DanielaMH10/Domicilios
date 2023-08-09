<?php

// app/controllers/DomiciliarioController.php
class DomiciliarioController
{
    public function index()
    {
        // Lógica para mostrar la lista de domiciliarios (por ejemplo, en una tabla HTML)
        $domiciliarioModel = new Domiciliario(); // Suponiendo que has creado el modelo Domiciliario
        $domiciliarios = $domiciliarioModel->getAll(); // Método getAll() para obtener todos los domiciliarios de la base de datos

        // Carga la vista para mostrar la lista de domiciliarios
        include 'app/views/domiciliarios/index.php';
    }

    public function show($idDomiciliario)
    {
        // Lógica para mostrar los detalles de un domiciliario específico
        $domiciliarioModel = new Domiciliario(); // Suponiendo que has creado el modelo Domiciliario
        $domiciliario = $domiciliarioModel->getById($idDomiciliario); // Método getById() para obtener los detalles del domiciliario con el ID proporcionado

        if ($domiciliario) {
            // El domiciliario se encontró en la base de datos
            // Carga la vista para mostrar los detalles del domiciliario
            include 'app/views/domiciliarios/show.php';
        } else {
            // El domiciliario no se encontró en la base de datos
            // Muestra un mensaje de error o redirige a una página de error
            // Por ejemplo:
            echo "Domiciliario no encontrado";
            exit();
        }
    }

    public function viewPedidos($idDomiciliario)
    {
        // Lógica para mostrar los pedidos asignados a un domiciliario específico
        $asignacionModel = new Asignacion(); // Suponiendo que has creado el modelo Asignacion
        $pedidosAsignados = $asignacionModel->getPedidosByDomiciliario($idDomiciliario); // Método getPedidosByDomiciliario() para obtener los pedidos asignados al domiciliario con el ID proporcionado

        // Carga la vista para mostrar la lista de pedidos asignados al domiciliario
        include 'app/views/domiciliarios/view_pedidos.php';
    }
}
?>