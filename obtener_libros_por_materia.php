<?php
// Conectar a la base de datos
$host = 'localhost';
$db = 'gamberli_db';
$user = 'root';
$pass = '12345'; // Cambia esta contraseña si es necesario

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar que se haya enviado la materia como parámetro
if (isset($_POST['materia']) && !empty(trim($_POST['materia']))) {
    $materia = trim($_POST['materia']); // Eliminar espacios en blanco

    // Consulta para obtener los libros según la materia seleccionada
    $consulta = $conexion->prepare("SELECT nombre_libro, autor, cantidad_disponible FROM libros WHERE TRIM(materia) = ?");
    $consulta->bind_param('s', $materia);
    $consulta->execute();

    $resultado = $consulta->get_result();

    // Verificar si hay libros disponibles para la materia seleccionada
    if ($resultado->num_rows > 0) {
        $libros = array();
        
        // Obtener todos los libros de la materia
        while ($fila = $resultado->fetch_assoc()) {
            $libros[] = array(
                'nombre_libro' => $fila['nombre_libro'],
                'autor' => $fila['autor'],
                'cantidad_disponible' => $fila['cantidad_disponible']
            );
        }

        // Devolver los libros en formato JSON
        echo json_encode($libros);
    } else {
        // Si no hay libros disponibles, enviar un mensaje de error
        echo json_encode(array('error' => 'No hay libros disponibles para esta materia.'));
    }
} else {
    // Si no se envía el parámetro materia o está vacío
    echo json_encode(array('error' => 'No se ha seleccionado ninguna materia o el campo está vacío.'));
}

// Cerrar la conexión
$conexion->close();
?>
