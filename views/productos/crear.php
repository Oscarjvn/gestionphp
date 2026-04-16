<?php 
$title = "Nuevo Producto"; 
ob_start(); 
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Registrar Nuevo Producto</h5>
            </div>
            <div class="card-body">
                <form action="?c=producto&a=crear" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej. Monitor LG 24'" required>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Categoría</label>
                            <select name="id_categoria" class="form-select" required>
                                <option value="" selected disabled>Seleccione una...</option>
                                <?php foreach ($categorias as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nombre']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Stock Inicial</label>
                            <input type="number" name="cantidad" class="form-control" min="0" value="0" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Precio ($)</label>
                            <input type="number" name="precio" class="form-control" step="0.01" min="0" placeholder="0.00" required>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?c=producto&a=listar" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
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