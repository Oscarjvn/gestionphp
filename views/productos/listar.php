<?php 
$title = "Productos"; 
ob_start(); // Empezamos a capturar el contenido
?>

<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Gestión de Inventario</h5>
        <?php if ($_SESSION['rol'] === 'admin'): ?>
            <a href="?c=producto&a=crear" class="btn btn-success btn-sm">Nuevo Producto</a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                <tr>
                    <td>
                        <strong><?= htmlspecialchars($p['nombre']) ?></strong><br>
                        <small class="text-muted"><?= htmlspecialchars($p['descripcion']) ?></small>
                    </td>
                    <td><span class="badge bg-info text-dark"><?= htmlspecialchars($p['categoria_nombre']) ?></span></td>
                    <td>$<?= number_format($p['precio'], 2) ?></td>
                    <td>
                        <span class="<?= $p['cantidad'] < 5 ? 'text-danger fw-bold' : '' ?>">
                            <?= $p['cantidad'] ?> uds.
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if ($_SESSION['rol'] === 'admin'): ?>
                            <a href="?c=producto&a=editar&id=<?= $p['id'] ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                            <a href="?c=producto&a=eliminar&id=<?= $p['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Borrar</a>
                        <?php else: ?>
                            <i class="bi bi-lock-fill text-muted" title="Solo lectura"></i>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$content = ob_get_clean(); // Guardamos todo en $content
require_once 'views/layouts/main.php'; // Inyectamos en el layout
?>