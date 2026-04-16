<?php 
$title = "Gestión de Categorías"; 
ob_start(); 
?>

<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-tags"></i> Categorías de Productos</h5>
        <?php if ($_SESSION['rol'] === 'admin'): ?>
            <a href="?c=categoria&a=crear" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Nueva Categoría
            </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; unset($_SESSION['msg']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 10%">ID</th>
                    <th>Nombre de la Categoría</th>
                    <th class="text-center" style="width: 20%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($categorias)): ?>
                    <tr><td colspan="3" class="text-center text-muted">No hay categorías registradas.</td></tr>
                <?php else: ?>
                    <?php foreach ($categorias as $cat): ?>
                    <tr>
                        <td>#<?= $cat['id'] ?></td>
                        <td><strong><?= htmlspecialchars($cat['nombre']) ?></strong></td>
                        <td class="text-center">
                            <?php if ($_SESSION['rol'] === 'admin'): ?>
                                <a href="?c=categoria&a=editar&id=<?= $cat['id'] ?>" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="?c=categoria&a=eliminar&id=<?= $cat['id'] ?>" 
                                   class="btn btn-outline-danger btn-sm" 
                                   onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            <?php else: ?>
                                <span class="badge bg-light text-muted">Solo lectura</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require_once 'views/layouts/main.php'; 
?>