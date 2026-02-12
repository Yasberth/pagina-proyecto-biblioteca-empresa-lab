document.addEventListener('DOMContentLoaded', function() {
    const solicitudesContainer = document.getElementById('solicitudes-container');

    function cargarSolicitudes() {
        // Realizar la solicitud al archivo obtener_solicitudes_prestamos.php
        fetch('obtener_solicitudes_prestamos.php')
            .then(response => response.json())
            .then(solicitudes => {
                solicitudesContainer.innerHTML = '';
                if (solicitudes.length > 0) {
                    solicitudes.forEach(solicitud => {
                        const solicitudDiv = document.createElement('div');
                        solicitudDiv.className = 'solicitud';
                        solicitudDiv.innerHTML = `
                            <p><strong>Libro:</strong> ${solicitud.nombre_libro}</p>
                            <p><strong>Fecha de Préstamo:</strong> ${solicitud.fecha_prestamo}</p>
                            <p><strong>Fecha de Devolución:</strong> ${solicitud.fecha_devolucion}</p>
                            <button onclick="aceptarSolicitud(${solicitud.id})">Aceptar</button>
                            <button onclick="rechazarSolicitud(${solicitud.id})">Rechazar</button>
                        `;
                        solicitudesContainer.appendChild(solicitudDiv);
                    });
                } else {
                    solicitudesContainer.innerHTML = '<p>No hay solicitudes de préstamo</p>';
                }
            })
            .catch(error => {
                console.error('Error al cargar las solicitudes:', error);
            });
    }

    window.aceptarSolicitud = function(idSolicitud) {
        actualizarEstadoSolicitud(idSolicitud, 'aceptado');
    };

    window.rechazarSolicitud = function(idSolicitud) {
        actualizarEstadoSolicitud(idSolicitud, 'rechazado');
    };

    function actualizarEstadoSolicitud(idSolicitud, nuevoEstado) {
        fetch('actualizar_estado_prestamo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${idSolicitud}&estado=${nuevoEstado}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`Solicitud ${nuevoEstado}`);
                cargarSolicitudes(); // Recargar las solicitudes después de actualizar
            } else {
                alert('Error al actualizar la solicitud');
            }
        })
        .catch(error => {
            console.error('Error al actualizar la solicitud:', error);
        });
    }

    cargarSolicitudes();
});
