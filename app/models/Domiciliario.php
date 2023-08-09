<?php

// app/models/Domiciliario.php
class Domiciliario
{
    // ... (otras propiedades y métodos)

    public function create($data)
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO domiciliarios (idUsuario, cedulaDomiciliario, nombreDomiciliario, telefonoDomiciliario, correoDomiciliario)
                VALUES (:idUsuario, :cedulaDomiciliario, :nombreDomiciliario, :telefonoDomiciliario, :correoDomiciliario)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $data['idUsuario']);
        $stmt->bindParam(':cedulaDomiciliario', $data['cedulaDomiciliario']);
        $stmt->bindParam(':nombreDomiciliario', $data['nombreDomiciliario']);
        $stmt->bindParam(':telefonoDomiciliario', $data['telefonoDomiciliario']);
        $stmt->bindParam(':correoDomiciliario', $data['correoDomiciliario']);

        return $stmt->execute();
    }

    public function getById($idDomiciliario)
    {
        $conn = Database::getConnection();

        $sql = "SELECT * FROM domiciliarios WHERE idDomiciliario = :idDomiciliario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idDomiciliario', $idDomiciliario);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($idDomiciliario, $data)
    {
        $conn = Database::getConnection();

        $sql = "UPDATE domiciliarios SET idUsuario = :idUsuario, cedulaDomiciliario = :cedulaDomiciliario, nombreDomiciliario = :nombreDomiciliario,
                telefonoDomiciliario = :telefonoDomiciliario, correoDomiciliario = :correoDomiciliario
                WHERE idDomiciliario = :idDomiciliario";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $data['idUsuario']);
        $stmt->bindParam(':cedulaDomiciliario', $data['cedulaDomiciliario']);
        $stmt->bindParam(':nombreDomiciliario', $data['nombreDomiciliario']);
        $stmt->bindParam(':telefonoDomiciliario', $data['telefonoDomiciliario']);
        $stmt->bindParam(':correoDomiciliario', $data['correoDomiciliario']);
        $stmt->bindParam(':idDomiciliario', $idDomiciliario);

        return $stmt->execute();
    }

    public function delete($idDomiciliario)
    {
        $conn = Database::getConnection();

        $sql = "DELETE FROM domiciliarios WHERE idDomiciliario = :idDomiciliario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idDomiciliario', $idDomiciliario);

        return $stmt->execute();
    }
}
?>