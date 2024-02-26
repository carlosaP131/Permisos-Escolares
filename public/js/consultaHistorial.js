document.addEventListener('DOMContentLoaded', function () {
    // Obtiene el elemento select
    var periodoSelect = document.getElementById('periodo');

    // Agrega un evento de cambio al select
    periodoSelect.addEventListener('change', function () {
        // Obtiene el valor seleccionado (nombre del periodo)
        var selectedPeriodoNombre = this.options[this.selectedIndex].text;

        // Construye la URL de la redirección
        //var redirectUrl = '/permisosHistorial/' + encodeURIComponent(selectedPeriodoNombre);

        // Redirige a la nueva URL
        //window.location.href = redirectUrl;
        window.location.href = '/permisosHistorial/' + encodeURIComponent(selectedPeriodoNombre);

    });
});
