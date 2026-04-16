<?php
require_once 'BaseModel.php';

class Producto extends BaseModel {
    protected $table = 'producto';

    // Listar con el nombre de la categoría
    public function getAllWithCategory() {
        $sql = "SELECT p.*, c.nombre as categoria_nombre 
                FROM producto p 
                INNER JOIN categoria c ON p.id_categoria = c.id";
        return $this->db->query($sql)->fetchAll();
    }

    public function create($nombre, $descripcion, $cantidad, $precio, $id_categoria) {
        // Validación técnica: No negativos
        if ($cantidad < 0 || $precio < 0) return false;

        $sql = "INSERT INTO producto (nombre, descripcion, cantidad, precio, id_categoria) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $cantidad, $precio, $id_categoria]);
    }
}