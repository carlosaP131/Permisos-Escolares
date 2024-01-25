document.addEventListener('DOMContentLoaded', function () {
    toggleOptionsContainer(); // Llama a la función al cargar la página
});

function toggleOptionsContainer() {
    var roleSelect = document.getElementById('role');
    var optionsContainer = document.getElementById('optionsContainer');

    // Muestra u oculta el contenedor de opciones según el rol seleccionado
    if (roleSelect.value === 'Profesor') {
        optionsContainer.style.display = 'block';
    } else {
        optionsContainer.style.display = 'none';
    }
}