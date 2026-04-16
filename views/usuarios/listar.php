<?php 
$title = "Administración de Usuarios"; 
ob_start(); 
?>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-people"></i> Usuarios del Sistema</h5>
        <a href="?c=usuario&a=crear" class="btn btn-outline-light btn-sm">
            <i class="bi bi-person-plus"></i> Registrar Usuario
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td>
                            <div class="fw-bold"><?= htmlspecialchars($u['nombre'] . ' ' . $u['apellido']) ?></div>
                        </td>
                        <td><?= htmlspecialchars($u['email']) ?></td>
                        <td>
                            <?php if($u['rol'] === 'admin'): ?>
                                <span class="badge bg-danger">Administrador</span>
                            <?php else: ?>
                                <span class="badge bg-primary">Usuario Stock</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="?c=usuario&a=editar&id=<?= $u['id'] ?>" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-gear"></i>
                                </a>
                                <?php if($u['id'] != $_SESSION['user_id']): ?>
                                    <a href="?c=usuario&a=eliminar&id=<?= $u['id'] ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('¿Estás seguro de eliminar a este usuario?')">
                                        <i class="bi bi-person-x"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require_once 'views/layouts/main.php'; 
?>