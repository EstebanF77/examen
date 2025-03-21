<?php
include 'conexionDb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

  
    if (!isset($conexDB)) {
        die("Error: No se pudo conectar a la base de datos.");
    }

    
    $sql = "UPDATE personas SET nombre = ?, email = ?, edad = ? WHERE id = ?";
    $stmt = $conexDB->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssii", $nombre, $email, $edad, $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Usuario actualizado correctamente.";
            } else {
                echo "No se encontró un usuario con ese ID o los datos son los mismos.";
            }
        } else {
            echo "Error al actualizar usuario: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la consulta SQL: " . $conexDB->error;
    }

    $conexDB->close();
}
?>
