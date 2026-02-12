<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="estlios pie.css" />
    <link rel="stylesheet" href="styles-user_dashboard.css" />
</head>
<body>
    <h1 class="main-header">GAMBERLI</h1>
    <!-- Botón Cerrar Sesión -->
    <button class="logout-button" onclick="location.href='index.php'">
        Cerrar Sesión
    </button>

    <div class="user-column">
        <img src="imagenes/USER.png" alt="Avatar" />
        <h3>Nombre de Usuario</h3>
    </div>

    <div class="container">
        <div class="box">
            <h2>Estatus de Solicitudes</h2>
            <a href="solicitudes_aceptadas.php">
                <img src="imagenes/libros.png" alt="Libros" width="180" height="150" />
            </a>
        </div>
        <div class="box">
            <h2>PRESTAMOS</h2>
            <a href="pagina_prestamos.php">
                <img src="imagenes/confirmar.jpg" alt="Prestamos" width="180" height="150" />
            </a>
        </div>
    </div>

    <footer>
        <div class="pietotal">
            <div class="cuerpo">
                <div class="columna1">
                    <h1>Más información de la página</h1>
                    <p>
                        La importancia de tener una plataforma es facilitar el acceso a la
                        información, los recursos disponibles y la promoción de la
                        lectura. También la comodidad que representa para los usuarios el
                        poder acceder a los servicios de la biblioteca desde cualquier
                        lugar a través de internet.
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
</body>
</html>
