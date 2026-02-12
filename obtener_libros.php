<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consultar los libros existentes
$query = "SELECT id, nombre_libro, autor, materia, cantidad_disponible FROM libros";
$result = $conn->query($query);

$libros = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $libros[] = $row;
    }
}

// Devolver los libros en formato JSON
echo json_encode($libros);

$conn->close();
?>
