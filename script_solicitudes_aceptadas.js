document.addEventListener('DOMContentLoaded', function() {
    const verSolicitudesButton = document.getElementById('ver-solicitudes');
    const aceptadasContainer = document.getElementById('solicitudes-aceptadas-container');
    const rechazadasContainer = document.getElementById('solicitudes-rechazadas-container');

    function cargarSolicitudes() {
        fetch('obtener_solicitudes_aceptadas_rechazadas.php')
            .then(response => response.json())
            .then(data => {
                const { aceptadas, rechazadas } = data;

                // Limpiar contenedores
                aceptadasContainer.innerHTML = '';
                rechazadasContainer.innerHTML = '';

                // Mostrar solicitudes aceptadas
                if (aceptadas.length > 0) {
                    aceptadasContainer.innerHTML = '<h3>Solicitudes Aceptadas</h3>';
                    aceptadas.forEach((solicitud) => {
                        const solicitudDiv = document.createElement('div');
                        solicitudDiv.className = 'solicitud';
                        solicitudDiv.innerHTML = `
                            <p><strong>Libro:</strong> ${solicitud.nombre_libro}</p>
                            <p><strong>Fecha de Préstamo:</strong> ${solicitud.fecha_prestamo}</p>
                            <p><strong>Fecha de Devolución:</strong> ${solicitud.fecha_devolucion}</p>
                            <p><strong>Estado:</strong> Aceptado</p>
                        `;
                        aceptadasContainer.appendChild(solicitudDiv);
                    });
                } else {
                    aceptadasContainer.innerHTML = '<p>No hay solicitudes aceptadas</p>';
                }

                // Mostrar solicitudes rechazadas
                if (rechazadas.length > 0) {
                    rechazadasContainer.innerHTML = '<h3>Solicitudes Rechazadas</h3>';
                    rechazadas.forEach((solicitud) => {
                        const solicitudDiv = document.createElement('div');
                        solicitudDiv.className = 'solicitud';
                        solicitudDiv.innerHTML = `
                            <p><strong>Libro:</strong> ${solicitud.nombre_libro}</p>
                            <p><strong>Fecha de Préstamo:</strong> ${solicitud.fecha_prestamo}</p>
                            <p><strong>Fecha de Devolución:</strong> ${solicitud.fecha_devolucion}</p>
                            <p><strong>Estado:</strong> Rechazado</p>
                        `;
                        rechazadasContainer.appendChild(solicitudDiv);
                    });
                } else {
                    rechazadasContainer.innerHTML = '<p>No hay solicitudes rechazadas</p>';
                }
            })
            .catch(error => {
                console.error('Error al cargar solicitudes:', error);
            });
    }

    // Asociar el evento al botón para cargar las solicitudes cuando se hace clic
    verSolicitudesButton.addEventListener('click', cargarSolicitudes);
});
