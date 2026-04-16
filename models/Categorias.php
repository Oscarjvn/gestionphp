<?php
require_once 'BaseModel.php';

class Categoria extends BaseModel {
    protected $table = 'categoria';

    // Crear nueva categoría
    public function create($nombre, $descripcion) {
        $sql = "INSERT INTO {$this->table} (nombre,descripcion) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $descripcion]);
    }

    // Actualizar categoría
    public function update($id, $nombre, $descripcion) {
        $sql = "UPDATE {$this->table} SET nombre = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $id]);
    }

    // Validación antes de eliminar (Seguridad)
    public function delete($id) {
        // 1. Verificamos si hay productos que usen esta categoría
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM producto WHERE id_categoria = ?");
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // No permitimos borrar si tiene productos
            return false; 
        }

        // 2. Si está limpia, llamamos al método delete del padre (BaseModel)
        return parent::delete($id);
    }
}