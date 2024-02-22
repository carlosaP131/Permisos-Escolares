$('.btn-edit').click(function() {
    var id = $(this).data('id');
    var nombre = $(this).data('nombre');
    var fechaInicio = $(this).data('fecha-inicio');
    var fechaFin = $(this).data('fecha-fin');

    $('#editarPeriodoModal').find('#nombrePeriodo').val(nombre);
    $('#editarPeriodoModal').find('#fechaInicio').val(fechaInicio);
    $('#editarPeriodoModal').find('#fechaFin').val(fechaFin);
    $('#editarPeriodoModal').find('#periodoId').val(id);

    // Actualiza la acción del formulario con el ID correspondiente
    var action = '/updatePeriodo/' + id; // Ruta a tu controlador y método de actualización
    $('#editarPeriodoForm').attr('action', action);
});

// Función para guardar los cambios
function guardarCambios() {
    document.getElementById('editarPeriodoForm').submit();
    // Implementa aquí la lógica para guardar los cambios
    // Puedes usar AJAX para enviar los datos al servidor si es necesario
}

$(document).ready(function () {
    // Ocultar el mensaje de éxito después de 2 segundos
    $('#success-message').delay(2000).fadeOut(500);

    // Ocultar el mensaje de error después de 2 segundos
    $('#danger-message').delay(2000).fadeOut(500);
});