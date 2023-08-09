<?php

include_once FOLDER_CONFIG."conexion.php";


class Pedido
{
    public function getAll()
    {
        $db = new Conexion();
        $conn = $db->conectar();
        
        $query = "SELECT P.idPedido,P.idProducto,P.idCliente,P.idEstado,P.fechaPedido,C.cedulaCliente,C.nombreCliente,PR.nombreProducto,PR.precio,E.nombreEstado FROM pedidos AS P
                    JOIN clientes AS C ON P.idCliente=C.idCliente
                    JOIN productos AS PR ON P.idProducto=PR.idProducto
                    JOIN estados AS E ON P.idEstado=E.idEstado";
        $sql = $conn->query($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function create($data)
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO pedidos (idProducto, idCliente, fechaPedido, idEstado)
                VALUES (:idProducto, :idCliente, :fechaPedido, :idEstado)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idProducto', $data['idProducto']);
        $stmt->bindParam(':idCliente', $data['idCliente']);
        $stmt->bindParam(':fechaPedido', $data['fechaPedido']);
        $stmt->bindParam(':idEstado', $data['idEstado']);

        return $stmt->execute();
    }

    public function getById($idPedido)
    {
        $conn = Database::getConnection();

        $sql = "SELECT * FROM pedidos WHERE idPedido = :idPedido";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPedido', $idPedido);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($idPedido, $data)
    {
        $conn = Database::getConnection();

        $sql = "UPDATE pedidos SET idProducto = :idProducto, idCliente = :idCliente, fechaPedido = :fechaPedido, idEstado = :idEstado
                WHERE idPedido = :idPedido";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idProducto', $data['idProducto']);
        $stmt->bindParam(':idCliente', $data['idCliente']);
        $stmt->bindParam(':fechaPedido', $data['fechaPedido']);
        $stmt->bindParam(':idEstado', $data['idEstado']);
        $stmt->bindParam(':idPedido', $idPedido);

        return $stmt->execute();
    }

    public function delete($idPedido)
    {
        $conn = Database::getConnection();

        $sql = "DELETE FROM pedidos WHERE idPedido = :idPedido";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPedido', $idPedido);

        return $stmt->execute();
    }
}
?>
