<?php 
$title = "Nueva Categoría"; 
ob_start(); 
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-tag-fill me-2"></i>Nueva Categoría de Productos</h5>
            </div>
            <div class="card-body p-4">
                <form action="?c=categoria&a=crear" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre de la Categoría</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Víveres, Charcutería, Limpieza..." required autofocus>
                        <div class="form-text">Usa nombres claros que faciliten la clasificación en el inventario.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">descripcion</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="Ej. Víveres, Charcutería, Limpieza..." required autofocus>
                        <div class="form-text">descripcion.</div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="?c=categoria&a=listar" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Guardar Categoría
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