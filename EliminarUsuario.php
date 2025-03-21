<?php
include 'conexionDb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

   
    if (!isset($conexDB)) {
        die("Error: No se pudo conectar a la base de datos.");
    }

  
    $sql = "DELETE FROM personas WHERE id = ?";
    $stmt = $conexDB->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Usuario eliminado correctamente.";
            } else {
                echo "No se encontró un usuario con ese ID.";
            }
        } else {
            echo "Error al eliminar usuario: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la consulta SQL: " . $conexDB->error;
    }

    $conexDB->close();
}
?>
