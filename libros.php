<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestión de Libros</title>
    <link rel="stylesheet" href="styles_libros.css" />
</head>
<body>
    <h1 class="main-header">GAMBERLI - Gestión de Libros</h1>
    
    <!-- Botón Volver Atrás -->
    <button class="back-button" onclick="location.href='admin_dashboard.php'">
        <img src="imagenes/regresar.jpg" alt="Volver al Dashboard">
    </button>

    <div class="container">
        <!-- Formulario para agregar libros -->
        <h2>Agregar Libro</h2>
        <form id="agregar-libro-form">
            <label for="nombre">Nombre del Libro:</label>
            <input type="text" id="nombre" name="nombre_libro" required />

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required />

            <label for="materia">Materia:</label>
            <input type="text" id="materia" name="materia" required />

            <label for="cantidad_disponible">Cantidad Disponible:</label>
            <input type="number" id="cantidad_disponible" name="cantidad_disponible" required />

            <label for="origen">Origen:</label>
            <input type="text" id="origen" name="origen" required />

            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required />

            <!-- Campo para el código del libro -->
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" required />

            <input type="submit" value="Agregar Libro" />
        </form>

        <!-- Sección para eliminar libros -->
        <h2>Eliminar Libro</h2>
        <label for="materia-eliminar">Seleccionar Materia:</label>
        <select id="materia-eliminar" name="materia-eliminar">
            <!-- Materias se cargarán dinámicamente -->
        </select>

        <label for="libro-eliminar">Seleccionar Libro:</label>
        <select id="libro-eliminar" name="libro-eliminar" disabled>
            <option value="">Seleccione un libro</option>
            <!-- Libros se cargarán dinámicamente -->
        </select>

        <button id="eliminar-libro" disabled>Eliminar Libro</button>

        <!-- Listado de Préstamos -->
        <h2>Listado de Préstamos</h2>
        <button id="refrescar-listado">Refrescar Listado de Préstamos</button>
        <div id="prestamos-container">
            <!-- Los préstamos se cargarán dinámicamente -->
        </div>
    </div>

    <footer>
        <div class="pietotal">
            <div class="cuerpo">
                <div class="columna1">
                    <h1>Más información de la página</h1>
                    <p>
                        La importancia de tener una plataforma es facilitar el acceso a la información, los recursos disponibles y la promoción de la lectura.
                    </p>
                </div>
                <div class="columna2">
                    <h1>Redes sociales</h1>
                    <div class="Redes">
                        <img src="imagenes/facebook-logo.png" alt="facebook" />
                        <label>Síguenos en Facebook</label>
                    </div>
                    <div class="Redes">
                        <img src="imagenes/instagram-logo.png" alt="instagram" />
                        <label>Síguenos en Instagram</label>
                    </div>
                    <div class="Redes">
                        <img src="imagenes/tiktok.png" alt="tiktok" />
                        <label>Síguenos en TikTok</label>
                    </div>
                </div>
                <div class="columna3">
                    <h1>Información de contactos</h1>
                    <div class="redes">
                        <img src="imagenes/location-logo.png" alt="Aquitania" />
                        <label>Ubícanos en Aquitania</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="leyes">
            <div class="derechos">
                <div class="copy">
                    2017 Todos los Derechos Reservados |
                    <a href="https://www.google.com.co">Aquitania</a>
                </div>
                <div class="informacion">
                    <a href="https://www.mintic.gov.co/portal/inicio/secciones-auxiliares/politicas/2627:f">Políticas de privacidad</a>
                    <a href="#">Términos y condiciones</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="script_libros.js"></script>
</body>
</html>
