<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos: ' . $conn->connect_error]));
}

// Obtener los datos del formulario
$nombre_libro = $_POST['nombre_libro'] ?? null;
$autor = $_POST['autor'] ?? null;
$materia = $_POST['materia'] ?? null;
$cantidad_disponible = $_POST['cantidad_disponible'] ?? null;
$tipo = $_POST['tipo'] ?? null;
$origen = $_POST['origen'] ?? null;

// Validar que los datos requeridos no estén vacíos
if (!$nombre_libro || !$autor || !$materia || !$cantidad_disponible || !$tipo || !$origen) {
    echo json_encode(['success' => false, 'error' => 'Todos los campos son obligatorios.']);
    exit;
}

// Validación adicional para la cantidad disponible (debe ser un número positivo)
if (!is_numeric($cantidad_disponible) || $cantidad_disponible <= 0) {
    echo json_encode(['success' => false, 'error' => 'La cantidad disponible debe ser un número positivo.']);
    exit;
}

// Insertar el nuevo libro en la base de datos
$query = "INSERT INTO libros (nombre_libro, autor, materia, cantidad_disponible, tipo, origen) 
          VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Verificar si la preparación de la consulta fue exitosa
if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit;
}

// Vincular los parámetros de la consulta
$stmt->bind_param('sssiss', $nombre_libro, $autor, $materia, $cantidad_disponible, $tipo, $origen);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Si la consulta fue exitosa
    echo json_encode(['success' => true, 'message' => 'Libro agregado correctamente']);
} else {
    // Si hubo un error al ejecutar la consulta
    echo json_encode(['success' => false, 'error' => 'Error al agregar el libro a la base de datos: ' . $stmt->error]);
}

// Cerrar la conexión y el statement
$stmt->close();
$conn->close();
?>

