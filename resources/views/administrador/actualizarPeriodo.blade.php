
<!-- Modal -->
<div class="modal fade" id="editarPeriodoModal" tabindex="-1" role="dialog" aria-labelledby="editarPeriodoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="editarPeriodoModalLabel">Editar Período</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <!-- Formulario para editar el período -->
                <form id="editarPeriodoForm">
                    <div class="form-group">
                        <label for="nombrePeriodo">Nombre del Período:</label>
                        <input type="text" id="nombrePeriodo" name="nombrePeriodo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de Inicio:</label>
                        <input type="date" id="fechaInicio" name="fechaInicio" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">Fecha de Fin:</label>
                        <input type="date" id="fechaFin" name="fechaFin" class="form-control">
                    </div>
                </form>
            </div>
            <!-- Pie del modal con botones de acción -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarCambios()">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar la lógica de guardar cambios (puedes ajustar según tus necesidades) -->
<script>
    function guardarCambios() {
        // Aquí puedes agregar la lógica para guardar los cambios, por ejemplo, enviar una solicitud AJAX al servidor.
        // Puedes acceder a los valores de los campos usando document.getElementById("nombrePeriodo").value, etc.
        // Luego, cierra el modal con: $('#editarPeriodoModal').modal('hide');
    }
</script>
