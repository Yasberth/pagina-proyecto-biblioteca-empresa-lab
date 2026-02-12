<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMBERLI - Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="estlios pie.css">
</head>
<body>
    <h1 class="main-header">GAMBERLI</h1>
    
    <!-- Nuevo contenedor con color de fondo -->
    <div class="fondo-contenedor">
        <div class="contenedor">
            <div class="menu-izquierdo">
                <h2>Iniciar Sesión</h2>
                <button class="boton" onclick="mostrarFormulario('formulario-iniciar-sesion')">Ir a Iniciar Sesión</button>
                <div class="formulario" id="formulario-iniciar-sesion">
                    <!-- Formulario de Inicio de Sesión -->
                    <form action="login.php" method="POST">
                        <label for="tipo-usuario">Tipo de Usuario:</label>
                        <select id="tipo-usuario" name="tipo-usuario" class="campo-formulario" required>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Administrativo</option>
                            <option value="alumno">Alumno</option>
                        </select><br />

                        <label for="tipo-documento">Tipo de Documento:</label>
                        <select id="tipo-documento" name="tipo-documento" class="campo-formulario">
                            <option value="CC">C.C.</option>
                            <option value="TI">T.I.</option>
                            <option value="RC">R.C.</option>
                            <option value="PPT">P.P.T.</option>
                            <option value="PEP">P.E.P.</option>
                            <option value="VISA">Visa</option>
                            <option value="PASAPORTE">Pasaporte</option>
                            <option value="CE">C.E.</option>
                        </select><br />

                        <label for="documento">Documento:</label>
                        <input type="text" id="documento" name="documento" class="campo-formulario" required maxlength="10" oninput="validarNumeros(this)"/><br />
                        
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" class="campo-formulario" required /><br />
                        <input type="submit" value="Iniciar Sesión" class="boton" />
                    </form>
                </div>
            </div>

            <!-- Imagen central -->
            <div class="contenido-central">
                <img src="imagenes/Fondopagina.jpg" alt="Imagen de libro" class="imagen-central">
            </div>

            <div class="menu-derecho">
                <h2>Crear Usuario</h2>
                <button class="boton" onclick="mostrarFormulario('formulario-crear-usuario')">Ir a Crear Usuario</button>
                <div class="formulario" id="formulario-crear-usuario">
                    <!-- Formulario de Crear Usuario -->
                    <form action="registro.php" method="POST">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="campo-formulario" required /><br />

                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="campo-formulario" required /><br />

                        <label for="tipo-usuario-crear">Tipo de Usuario:</label>
                        <select id="tipo-usuario-crear" name="tipo-usuario" class="campo-formulario" required>
                            <option value="docente">Docente</option>
                            <option value="administrativo">Administrativo</option>
                            <option value="alumno">Alumno</option>
                        </select><br />

                        <label for="tipo-documento-crear">Tipo de Documento:</label>
                        <select id="tipo-documento-crear" name="tipo-documento" class="campo-formulario">
                            <option value="TI">T.I.</option>
                            <option value="CC">C.C.</option>
                            <option value="RC">R.C.</option>
                            <option value="PPT">P.P.T.</option>
                            <option value="PEP">P.E.P.</option>
                            <option value="VISA">Visa</option>
                            <option value="PASAPORTE">Pasaporte</option>
                            <option value="CE">C.E.</option>
                        </select><br />

                        <label for="documento-crear">Documento:</label>
                        <input type="text" id="documento-crear" name="documento" class="campo-formulario" required maxlength="10" oninput="validarNumeros(this)"/><br />

                        <label for="password-crear">Contraseña:</label>
                        <input type="password" id="password-crear" name="password" class="campo-formulario" required /><br />
                        <input type="submit" value="Crear Usuario" class="boton" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
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
                        <img src="imagenes/location-logo.png" alt="tiktok" />
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

    <script src="script.js"></script>
</body>
</html>



