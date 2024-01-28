document.addEventListener('DOMContentLoaded', function () {
    toggleOptionsContainer(); // Llama a la función al cargar la página
});

function toggleOptionsContainer() {
    var roleSelect = document.getElementById('role');
    var optionsContainer = document.getElementById('optionsContainer');
    // Obtener el texto (name) de la opción seleccionada
    var selectedRoleName = roleSelect.options[roleSelect.selectedIndex].text;
    // Muestra u oculta el contenedor de opciones según el rol seleccionado
    if (selectedRoleName === 'Profesor') {
        optionsContainer.style.display = 'block';
    } else {
        optionsContainer.style.display = 'none';
    }
}
$(document).ready(function () {
    $("#myForm").submit(function (event) {
        // Prevenir la presentación del formulario
        event.preventDefault();

        // Obtener los valores del formulario
        var nombre = $("#name").val();
        var password = $("#password").val();
        var confirmarPassword = $("#password_confirmation").val();

        // Validar el nombre (sin números)
        if (/^\D+$/.test(nombre) === false) {
            mostrarModal("Error", "El nombre no debe contener números");
            return;
        }

        // Validar que las contraseñas coincidan
        if (password !== confirmarPassword) {
            mostrarModal("Error", "Las contraseñas no coinciden");
            return;
        }

        // Si todas las validaciones pasan, enviar el formulario
        this.submit();
    });

    function mostrarModal(titulo, mensaje) {
        // Mostrar un modal con el título y el mensaje de error
        $("#modalTitulo").text(titulo);
        $("#modalMensaje").text(mensaje);
        $("#miModal").modal("show");
    }
    $("#btnCerrarModal").click(function () {
        $("#miModal").modal("hide");
    });
});
