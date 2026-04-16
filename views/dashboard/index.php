<?php 
$title = "Panel de Control"; 
ob_start(); 
?>

<div class="row">
    <div class="col-12 mb-4">
        <h2 class="display-5">Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?></h2>
        <p class="text-muted">Resumen general del sistema de inventario.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-uppercase mb-1">Usuarios</h6>
                        <h2 class="mb-0"><?= $totalUsuarios ?></h2>
                    </div>
                    <i class="bi bi-people-fill fs-1 opacity-50"></i>
                </div>
                <a href="?c=usuario&a=listar" class="btn btn-light btn-sm mt-3">Ver todos</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-uppercase mb-1">Categorías</h6>
                        <h2 class="mb-0"><?= $totalCategorias ?></h2>
                    </div>
                    <i class="bi bi-tags-fill fs-1 opacity-50"></i>
                </div>
                <a href="?c=categoria&a=listar" class="btn btn-light btn-sm mt-3">Gestionar</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning text-dark h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-uppercase mb-1">Productos</h6>
                        <h2 class="mb-0"><?= $totalProductos ?></h2>
                    </div>
                    <i class="bi bi-box-seam-fill fs-1 opacity-50"></i>
                </div>
                <a href="?c=producto&a=listar" class="btn btn-dark btn-sm mt-3">Inventario</a>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require_once 'views/layouts/main.php'; 
?>