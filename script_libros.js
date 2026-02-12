document.addEventListener('DOMContentLoaded', function () {
    const formAgregar = document.getElementById('agregar-libro-form');
    const selectMateriaEliminar = document.getElementById('materia-eliminar');
    const selectLibroEliminar = document.getElementById('libro-eliminar');
    const botonEliminarLibro = document.getElementById('eliminar-libro');
    const prestamosContainer = document.getElementById('prestamos-container');
    const botonRefrescarListado = document.getElementById('refrescar-listado');

    // Agregar libro
    formAgregar.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

        // Obtener los datos del formulario
        const formData = new FormData(formAgregar);
        
        // Enviar los datos usando fetch
        fetch('agregar_libro.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Libro agregado correctamente');
                formAgregar.reset(); // Limpiar el formulario después de agregar
            } else {
                alert(data.error || 'Ocurrió un error al agregar el libro');
            }
        })
        .catch(error => {
            console.error('Error al agregar libro:', error);
            alert('Hubo un problema con la solicitud');
        });
    });

    // Cargar las materias para eliminar libros
    function cargarMaterias() {
        selectMateriaEliminar.innerHTML = '<option value="">Seleccione una materia</option>'; // Añadir opción predeterminada

        fetch('obtener_materias.php')
            .then(response => response.json())
            .then(materias => {
                materias.forEach(materia => {
                    const option = document.createElement('option');
                    option.value = materia;
                    option.textContent = materia;
                    selectMateriaEliminar.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar materias:', error);
            });
    }

    // Cargar los libros al seleccionar una materia
    selectMateriaEliminar.addEventListener('change', function () {
        const materiaSeleccionada = selectMateriaEliminar.value;
        selectLibroEliminar.innerHTML = '<option value="">Seleccione un libro</option>';

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
                        option.textContent = `${libro.nombre_libro} - ${libro.autores}`;
                        selectLibroEliminar.appendChild(option);
                    });
                    selectLibroEliminar.disabled = false;
                    botonEliminarLibro.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error al cargar libros:', error);
            });
        } else {
            selectLibroEliminar.disabled = true;
            botonEliminarLibro.disabled = true;
        }
    });

    // Eliminar un libro seleccionado
    botonEliminarLibro.addEventListener('click', function () {
        const libroSeleccionado = selectLibroEliminar.value;

        if (libroSeleccionado) {
            fetch('eliminar_libro.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `libro=${encodeURIComponent(libroSeleccionado)}`,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Libro eliminado correctamente');
                    selectMateriaEliminar.dispatchEvent(new Event('change')); // Refrescar lista de libros
                } else if (data.error) {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error al eliminar libro:', error);
            });
        } else {
            alert('Debe seleccionar un libro para eliminar.');
        }
    });

    // Refrescar el listado de préstamos
    botonRefrescarListado.addEventListener('click', function () {
        fetch('obtener_prestamos.php')
            .then(response => response.json())
            .then(prestamos => {
                prestamosContainer.innerHTML = '';

                if (prestamos.length > 0) {
                    prestamos.forEach(prestamo => {
                        const prestamoDiv = document.createElement('div');
                        prestamoDiv.className = 'prestamo-item';
                        prestamoDiv.innerHTML = `
                            <p><strong>Libro:</strong> ${prestamo.nombre_libro}</p>
                            <p><strong>Fecha de Préstamo:</strong> ${prestamo.fecha_prestamo}</p>
                            <p><strong>Fecha de Devolución:</strong> ${prestamo.fecha_devolucion}</p>
                            <p><strong>Estado:</strong> ${prestamo.estado}</p>
                        `;
                        prestamosContainer.appendChild(prestamoDiv);
                    });
                } else {
                    prestamosContainer.innerHTML = '<p>No hay préstamos registrados.</p>';
                }
            })
            .catch(error => {
                console.error('Error al cargar préstamos:', error);
            });
    });

    // Cargar materias al iniciar la página
    cargarMaterias();
});
