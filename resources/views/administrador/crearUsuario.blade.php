<!-- Modal para crear nuevo usuario -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog"
            aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para crear nuevo usuario -->
                        <form action="{{ route('crear-usuario') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                                <input type="text" name="name" id="name" class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Correo
                                    Electrónico</label>
                                <input type="email" name="email" id="email" class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña</label>
                                <input type="password" name="password" id="password" class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i> Confirmar
                                    Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label"><i class="fas fa-user-tag"></i> Rol</label>
                                <select name="role" id="role" class="custom-input" required
                                    onchange="toggleOptionsContainer()">
                                    <option value="Secretaria">Secretaria</option>
                                    <option value="Profesor">Profesor</option>
                                </select>
                            </div>

                            <div class="mb-3" id="optionsContainer" style="display: none;">
                                <label for="subject" class="form-label"><i class="fas fa-book"></i> Carrera</label>
                                <select name="carrera" id="carrera" class="custom-input">
                                @foreach ($carreras as $carrera)
                                    <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label"><i class="fas fa-info-circle"></i>
                                    Estatus</label>
                                <input type="text" name="status" id="status" class="custom-input" required>
                            </div>

                            <button type="submit" class="btn btn-primary"
                                style="background-color: #8B0000; border-color: #8B0000;">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>