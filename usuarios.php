<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuarios</title>
    <link rel="stylesheet" href="styles_usuarios.css" />
</head>
<body>
    <h1 class="main-header">GAMBERLI</h1>

    <!-- Botón para regresar al panel de administrador -->
    <button class="back-button" onclick="location.href='admin_dashboard.php'">
        <img src="imagenes/regresar.jpg" alt="Volver al Dashboard">
    </button>

    <header>
        <h1>Gestión de Usuarios</h1>
    </header>

    <div class="container">
        <button id="ver-usuarios" class="boton">Ver Usuarios</button>
        <div id="usuarios-container"></div>
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

    <script src="script_usuarios.js"></script>
</body>
</html>
