<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Préstamo de Libros</title>
    <link rel="stylesheet" href="styles_prestamos.css" />
</head>
<body>
    <h1 class="main-header">GAMBERLI</h1>
    <button class="back-button" onclick="location.href='user_dashboard.php'">
        <img src="imagenes/regresar.jpg" alt="Volver al Dashboard">
    </button>
    <header>
        <h1>Préstamo de Libros</h1>
    </header>
    <div class="container">
        <p>Los libros se pueden solicitar por un lapso no mayor a 3 días.</p>

        <!-- Selección de Materia -->
        <label for="materia">Seleccione la Materia:</label>
        <select id="materia" name="materia" class="campo-formulario" required>
            <option value="">Seleccione una materia</option>
            <!-- Las materias se cargarán dinámicamente desde la base de datos -->
        </select><br />

        <!-- Selección de Libro -->
        <form id="prestamo-form" class="compra-formulario">
            <label for="libro">Seleccione el Libro:</label>
            <select id="libro" name="libro" class="campo-formulario" required>
                <option value="">Seleccione un libro</option>
                <!-- Los libros se cargarán dinámicamente según la materia seleccionada -->
            </select><br />

            <!-- Fecha de Inicio y Fin -->
            <label for="fecha-inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha-inicio" name="fecha-inicio" class="campo-formulario" required /><br />

            <label for="fecha-fin">Fecha de Fin:</label>
            <input type="date" id="fecha-fin" name="fecha-fin" class="campo-formulario" required /><br />

            <!-- Botón para enviar el formulario -->
            <input type="submit" value="Pedir Libro" class="boton" />
        </form>
    </div>
    <footer>
        <div class="pietotal">
            <div class="cuerpo">
                <div class="columna1">
                    <h1>Más información de la página</h1>
                    <p>
                        La importancia de tener una plataforma es facilitar el acceso a la información,
                        los recursos disponibles y la promoción de la lectura. También la comodidad que
                        representa para los usuarios el poder acceder a los servicios de la biblioteca
                        desde cualquier lugar a través de internet.
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

    <!-- Enlace al archivo JavaScript -->
    <script src="script_prestamos.js"></script>
</body>
</html>








