<?php
include 'conexionDb.php'; 

if (!isset($conexDB)) {
    die("Error: No se pudo conectar a la base de datos.");
}

$sql = "SELECT id, nombre, email, edad FROM personas";
$resultado = $conexDB->query($sql);

echo "<h2>Lista de Usuarios</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
        </tr>";

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $fila["id"] . "</td>
                <td>" . $fila["nombre"] . "</td>
                <td>" . $fila["email"] . "</td>
                <td>" . $fila["edad"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
}

echo "</table>";

$conexDB->close();
?>
