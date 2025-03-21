<?php
include 'conexionDb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    $sql = "INSERT INTO personas (nombre, email, edad) VALUES (?, ?, ?)";
    $stmt = $conexDB->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $email, $edad);

    if ($stmt->execute()) {
        echo "Usuario agregado correctamente.";
    } else {
        echo "Error al agregar usuario: " . $stmt->error;
    }

    $stmt->close();
    $conexDB->close();
}
?>