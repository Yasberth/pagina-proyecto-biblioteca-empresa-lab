<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos']));
}

// Obtener el nombre o ID del libro a eliminar (dependiendo de cómo lo envíes desde el JS)
$libro_nombre = $_POST['libro'] ?? null;

// Validar que se haya proporcionado un nombre de libro
if (!$libro_nombre) {
    echo json_encode(['success' => false, 'error' => 'No se ha proporcionado un libro para eliminar.']);
    exit;
}

// Preparar la consulta para eliminar el libro
$query = "DELETE FROM libros WHERE nombre_libro = ?";
$stmt = $conn->prepare($query);

// Verificar si la preparación de la consulta fue exitosa
if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Error en la preparación de la consulta.']);
    exit;
}

// Vincular los parámetros de la consulta
$stmt->bind_param('s', $libro_nombre);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Si la consulta fue exitosa y eliminó un registro
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Libro eliminado correctamente']);
    } else {
        echo json_encode(['success' => false, 'error' => 'No se encontró el libro para eliminar.']);
    }
} else {
    // Si hubo un error al ejecutar la consulta
    echo json_encode(['success' => false, 'error' => 'Error al eliminar el libro de la base de datos']);
}

// Cerrar la conexión y el statement
$stmt->close();
$conn->close();
?>
