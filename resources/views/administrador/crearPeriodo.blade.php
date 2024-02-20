<!-- Modal para crear nuevo periodo -->
<div class="modal fade" id="crearPeriodoModal" tabindex="-1" role="dialog" aria-labelledby="crearPeriodoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearPeriodoModalLabel">
                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Crear Nuevo Periodo
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Agrega aquí los campos del formulario para crear un nuevo periodo -->
                <form action="{{ route('crear-periodo') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Periodo:</label>
                        <input type="text" class="custom-input" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicial">Fecha de Inicio:</label>
                        <input type="date" class="custom-input" id="fecha_inicial" name="fecha_inicial" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_final">Fecha Fin:</label>
                        <input type="date" class="custom-input" id="fecha_final" name="fecha_final" required>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check" aria-hidden="true"></i> Crear Periodo
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
