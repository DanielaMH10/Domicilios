<?php

// app/models/Cliente.php
class Cliente
{
    // ... (otras propiedades y métodos)

    public function create($data)
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO clientes (idUsuario, cedulaCliente, nombreCliente, telefonoCliente, correoCliente, direccionCliente)
                VALUES (:idUsuario, :cedulaCliente, :nombreCliente, :telefonoCliente, :correoCliente, :direccionCliente)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $data['idUsuario']);
        $stmt->bindParam(':cedulaCliente', $data['cedulaCliente']);
        $stmt->bindParam(':nombreCliente', $data['nombreCliente']);
        $stmt->bindParam(':telefonoCliente', $data['telefonoCliente']);
        $stmt->bindParam(':correoCliente', $data['correoCliente']);
        $stmt->bindParam(':direccionCliente', $data['direccionCliente']);

        return $stmt->execute();
    }

    public function getById($idCliente)
    {
        $conn = Database::getConnection();

        $sql = "SELECT * FROM clientes WHERE idCliente = :idCliente";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCliente', $idCliente);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($idCliente, $data)
    {
        $conn = Database::getConnection();

        $sql = "UPDATE clientes SET idUsuario = :idUsuario, cedulaCliente = :cedulaCliente, nombreCliente = :nombreCliente,
                telefonoCliente = :telefonoCliente, correoCliente = :correoCliente, direccionCliente = :direccionCliente
                WHERE idCliente = :idCliente";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $data['idUsuario']);
        $stmt->bindParam(':cedulaCliente', $data['cedulaCliente']);
        $stmt->bindParam(':nombreCliente', $data['nombreCliente']);
        $stmt->bindParam(':telefonoCliente', $data['telefonoCliente']);
        $stmt->bindParam(':correoCliente', $data['correoCliente']);
        $stmt->bindParam(':direccionCliente', $data['direccionCliente']);
        $stmt->bindParam(':idCliente', $idCliente);

        return $stmt->execute();
    }

    public function delete($idCliente)
    {
        $conn = Database::getConnection();

        $sql = "DELETE FROM clientes WHERE idCliente = :idCliente";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idCliente', $idCliente);

        return $stmt->execute();
    }
}
?>