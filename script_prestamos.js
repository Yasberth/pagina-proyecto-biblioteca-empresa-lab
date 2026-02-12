document.addEventListener('DOMContentLoaded', function () {
    const prestamoForm = document.getElementById('prestamo-form');
    const selectMateria = document.getElementById('materia');
    const selectLibro = document.getElementById('libro');
    
    // Cargar las materias dinámicamente al cargar la página
    fetch('obtener_materias.php')
        .then(response => response.json())
        .then(materias => {
            materias.forEach(materia => {
                const option = document.createElement('option');
                option.value = materia;
                option.textContent = materia;
                selectMateria.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al cargar materias:', error);
        });

    // Cuando se selecciona una materia, cargar los libros correspondientes
    selectMateria.addEventListener('change', function () {
        const materiaSeleccionada = selectMateria.value;

        // Limpiar el select de libros antes de cargar los nuevos libros
        selectLibro.innerHTML = '<option value="">Seleccione un libro</option>';

        // Verificar si hay una materia seleccionada
        if (materiaSeleccionada) {
            fetch('obtener_libros_por_materia.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `materia=${encodeURIComponent(materiaSeleccionada)}`,
            })
                .then(response => response.json())
                .then(libros => {
                    if (libros.error) {
                        alert(libros.error);
                    } else {
                        libros.forEach(libro => {
                            const option = document.createElement('option');
                            option.value = libro.nombre_libro;
                            option.textContent = `${libro.nombre_libro} - ${libro.autor} - Disponibles: ${libro.cantidad_disponible}`;
                            selectLibro.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error al cargar libros:', error);
                });
        }
    });

    // Validar y registrar el préstamo al enviar el formulario
    prestamoForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevenir el envío del formulario normal

        const fechaInicio = new Date(document.getElementById('fecha-inicio').value);
        const fechaFin = new Date(document.getElementById('fecha-fin').value);
        const diferenciaDias = (fechaFin - fechaInicio) / (1000 * 60 * 60 * 24);

        if (diferenciaDias > 3) {
            alert('Excedió el máximo de 3 días');
            return false;
        }

        const libroSeleccionado = selectLibro.value;

        if (!libroSeleccionado) {
            alert('Seleccione un libro para el préstamo.');
            return false;
        }

        // Crear la solicitud de préstamo
        const prestamo = {
            fechaInicio: document.getElementById('fecha-inicio').value,
            fechaFin: document.getElementById('fecha-fin').value,
            libro: libroSeleccionado,
        };

        // Registrar el préstamo en la base de datos a través de PHP
        fetch('registrar_prestamos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `fecha_inicio=${prestamo.fechaInicio}&fecha_fin=${prestamo.fechaFin}&libro=${encodeURIComponent(prestamo.libro)}`,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Préstamo registrado con éxito');
                    prestamoForm.reset(); // Limpiar el formulario después de enviar los datos
                } else if (data.error) {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error al registrar el préstamo:', error);
            });
    });
});
