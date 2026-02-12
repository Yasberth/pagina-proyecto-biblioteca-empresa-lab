<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link rel="stylesheet" href="styles-admin_dashboard.css">
    <link rel="stylesheet" href="estlios pie.css">
</head>
<body>
    <h1 class="main-header">GAMBERLI</h1>

    <!-- Botón de Cerrar Sesión -->
    <button class="logout-button" onclick="location.href='index.php'">
        Cerrar Sesión
    </button>

    <div class="container">
        <div class="COLUMNA1">
            <img src="imagenes/USER.png" alt="Avatar">
            <h3>Nombre de Usuario</h3>
        </div>
        <div class="COLUMNA2">
            <!-- Botón de Libros -->
            <div class="box" onclick="location.href='libros.php'">
                <h2>LIBROS</h2>
                <img src="imagenes/libros.png" alt="Libros" width="180" height="150">
            </div>
            <!-- Botón de Préstamos -->
            <div class="box" onclick="location.href='aceptar_prestamos.php'">
                <h2>PRÉSTAMOS</h2>
                <img src="imagenes/confirmar.jpg" alt="Préstamos" width="180" height="150">
            </div>
            <!-- Botón de Usuarios -->
            <div class="box" onclick="location.href='usuarios.php'">
                <h2>USUARIOS</h2>
                <img src="imagenes/crear usuario.png" alt="Usuarios" width="270" height="150">
            </div>
        </div>
    </div>

    <footer>
        <div class="pietotal">
            <div class="cuerpo">
                <div class="columna1">
                    <h1>Más información de la página</h1>
                    <p>La importancia de tener una plataforma es facilitar el acceso a la información, los recursos disponibles y la promoción a la lectura. También la comodidad que representa para los usuarios poder acceder a los servicios de la biblioteca desde cualquier lugar a través de internet.</p>
                </div>
                <div class="columna2">
                    <h1>Redes sociales</h1>
                    <div class="Redes">
                        <img src="imagenes/facebook-logo.png" alt="facebook">
                        <label>Síguenos en Facebook</label>
                    </div>
                    <div class="Redes">
                        <img src="imagenes/instagram-logo.png" alt="instagram">
                        <label>Síguenos en Instagram</label>
                    </div>
                    <div class="Redes">
                        <img src="imagenes/tiktok.png" alt="tiktok">
                        <label>Síguenos en TikTok</label>
                    </div>
                </div>
                <div class="columna3">
                    <h1>Información de contactos</h1>
                    <div class="redes">
                        <img src="imagenes/location-logo.png" alt="Aquitania">
                        <label>Ubícanos en Aquitania</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="leyes">
            <div class="derechos">
                <div class="copy">
                    2017 Todos los Derechos Reservados | <a href="https://www.google.com.co">Aquitania</a>
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
