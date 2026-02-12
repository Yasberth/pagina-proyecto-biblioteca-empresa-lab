<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solicitudes Aceptadas</title>
    <link rel="stylesheet" href="styles_solicitudes_aceptadas.css" />
</head>
<body>
    <h1 class="main-header">GAMBERLI</h1>
    <button class="back-button" onclick="location.href='user_dashboard.php'">
        <img src="imagenes/regresar.jpg" alt="Volver al Dashboard">
    </button>
    <header>
        <h1>Solicitudes Aceptadas y Rechazadas</h1>
    </header>
    
    <div class="container">
        <h2>Solicitudes</h2>
        <!-- Botón para ver las solicitudes -->
        <button id="ver-solicitudes">Ver Solicitudes</button>

        <!-- Contenedores para solicitudes -->
        <div id="solicitudes-aceptadas-container"></div>
        <div id="solicitudes-rechazadas-container"></div>
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

    <script src="script_solicitudes_aceptadas.js"></script>
</body>
</html>
