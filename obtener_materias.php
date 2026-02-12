<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consultar las materias disponibles
$query = "SELECT DISTINCT materia FROM libros";
$result = $conn->query($query);

$materias = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row['materia'];
    }
}

// Devolver los datos en formato JSON
echo json_encode($materias);

$conn->close();
?>
