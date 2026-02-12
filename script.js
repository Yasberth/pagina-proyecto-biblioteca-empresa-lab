// Función para mostrar y ocultar formularios
function mostrarFormulario(idFormulario) {
    var formularios = document.querySelectorAll(".formulario");
    formularios.forEach(function (formulario) {
        formulario.style.display = "none";
    });

    var formularioMostrar = document.getElementById(idFormulario);
    formularioMostrar.style.display = "block";
}

// Validar inicio de sesión y enviar los datos a PHP
function validarInicioSesion(event) {
    event.preventDefault();
    var tipoUsuario = document.getElementById('tipo-usuario').value;
    var tipoDocumento = document.getElementById('tipo-documento').value;
    var documento = document.getElementById('documento').value;
    var password = document.getElementById('password').value;

    // Crear un FormData para enviar los datos del formulario a PHP
    var formData = new FormData();
    formData.append('tipo_usuario', tipoUsuario);
    formData.append('tipo_documento', tipoDocumento);
    formData.append('documento', documento);
    formData.append('password', password);

    // Hacer la solicitud a PHP para verificar el inicio de sesión
    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.tipo_usuario === 'administrativo') {
                window.location.href = 'admin_dashboard.php';
            } else if (data.tipo_usuario === 'docente' || data.tipo_usuario === 'alumno') {
                window.location.href = 'user_dashboard.php';
            }
        } else {
            alert('Datos incorrectos');
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Ocurrió un error. Inténtalo de nuevo.');
    });
}

// Función para validar que solo se ingresen números en los campos de documento
function validarNumeros(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
}

// Cerrar los formularios al hacer clic fuera de ellos
document.addEventListener('click', function (event) {
    var formularios = document.querySelectorAll(".formulario");
    var clickedElement = event.target;
    var isClickInsideForm = false;

    formularios.forEach(function (formulario) {
        // Revisa si el clic fue dentro del formulario
        if (formulario.contains(clickedElement)) {
            isClickInsideForm = true;
        }
    });

    // Verifica si el clic fue en un botón de mostrar formulario
    var isButtonClick = clickedElement.classList.contains('boton');

    // Si no hizo clic dentro de un formulario o en un botón, cerrar formularios
    if (!isClickInsideForm && !isButtonClick) {
        formularios.forEach(function (formulario) {
            formulario.style.display = "none";
        });
    }
});

// Evita que se cierre el formulario al hacer clic dentro del mismo
document.querySelectorAll('.formulario').forEach(function (formulario) {
    formulario.addEventListener('click', function (event) {
        event.stopPropagation();
    });
});




