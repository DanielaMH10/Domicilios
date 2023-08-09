<?php

// app/models/Asignacion.php
class Asignacion
{
    // ... (otros métodos y propiedades del modelo)

    public function getPedidosByDomiciliario($idDomiciliario)
    {
        // Lógica para obtener los pedidos asignados a un domiciliario específico
        try {
            $pdo = Database::getInstance()->getConnection();

            $query = "SELECT p.idPedido, p.fechaPedido, pr.nombreProducto, c.nombreCliente, e.nombreEstado
                      FROM asignaciones a
                      INNER JOIN pedidos p ON a.idPedido = p.idPedido
                      INNER JOIN productos pr ON p.idProducto = pr.idProducto
                      INNER JOIN clientes c ON p.idCliente = c.idCliente
                      INNER JOIN estados e ON p.idEstado = e.idEstado
                      WHERE a.idDomiciliario = :idDomiciliario";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':idDomiciliario', $idDomiciliario, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // Manejo de errores en caso de que la consulta falle
            // Puedes mostrar un mensaje de error, registrar el error, etc.
            // Por ejemplo:
            echo "Error al obtener los pedidos asignados: " . $e->getMessage();
            return [];
        }
    }

    // ... (otros métodos y propiedades del modelo)
}
?>