<?php 
$title = "Registrar Usuario"; 
ob_start(); 
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Nuevo Usuario del Sistema</h5>
            </div>
            <div class="card-body p-4">
                <form action="?c=usuario&a=crear" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej. Juan" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Apellido</label>
                            <input type="text" name="apellido" class="form-control" placeholder="Ej. Pérez" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="usuario@empresa.com" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold">Contraseña Temporal</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>
                            <div class="form-text">Mínimo 6 caracteres. El sistema la encriptará automáticamente.</div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold">Rol de Acceso</label>
                            <select name="rol" class="form-select" required>
                                <option value="usuario" selected>Usuario (Solo Lectura / Inventario)</option>
                                <option value="admin">Administrador (Control Total)</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="?c=usuario&a=listar" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require_once 'views/layouts/main.php'; 
?>