document.addEventListener('DOMContentLoaded', function () {
    const verUsuariosBtn = document.getElementById('ver-usuarios');
    const usuariosContainer = document.getElementById('usuarios-container');

    verUsuariosBtn.addEventListener('click', function () {
        // Realizar la solicitud AJAX para obtener los usuarios
        fetch('obtener_usuarios.php')
            .then(response => response.json())
            .then(usuarios => {
                // Crear la tabla para mostrar los usuarios
                const tablaUsuarios = document.createElement('table');
                tablaUsuarios.innerHTML = `
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo de Documento</th>
                        <th>Documento</th>
                        <th>Fecha de Registro</th>
                        <th>Tipo de Usuario</th>
                    </tr>
                `;
                
                // Iterar sobre los usuarios y agregarlos a la tabla
                usuarios.forEach(usuario => {
                    const fila = document.createElement('tr');
                    fila.innerHTML = `
                        <td>${usuario.nombre}</td>
                        <td>${usuario.apellido}</td>
                        <td>${usuario.tipo_documento}</td>
                        <td>${usuario.documento}</td>
                        <td>${usuario.fecha_registro}</td>
                        <td>${usuario.tipo_usuario}</td>
                    `;
                    tablaUsuarios.appendChild(fila);
                });

                // Limpiar el contenedor y agregar la tabla
                usuariosContainer.innerHTML = '';
                usuariosContainer.appendChild(tablaUsuarios);
            })
            .catch(error => {
                console.error('Error al obtener usuarios:', error);
            });
    });
});
