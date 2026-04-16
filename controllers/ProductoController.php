<?php
require_once 'models/Productos.php';
require_once 'models/Categorias.php';

class ProductoController {
    private $productoModel;
    private $categoriaModel;

    public function __construct($db) {
        // Fase 4: Seguridad obligatoria
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?c=auth&a=login");
            exit;
        }
        $this->productoModel = new Producto($db);
        $this->categoriaModel = new Categoria($db);
    }

    public function listar() {
        $productos = $this->productoModel->getAll(); // Aquí viene el JOIN con categorías
        require_once 'views/productos/listar.php';
    }

    public function crear() {
        if ($_SESSION['rol'] !== 'admin') header("Location: index.php?c=producto&a=listar");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validación básica de lado del servidor
            if ($_POST['precio'] > 0 && $_POST['cantidad'] >= 0) {
                $this->productoModel->create($_POST);
                header("Location: index.php?c=producto&a=listar");
            }
        }
        $categorias = $this->categoriaModel->getAll();
        require_once 'views/productos/crear.php';
    }

    public function eliminar() {
        if ($_SESSION['rol'] === 'admin') {
            $this->productoModel->delete($_GET['id']);
        }
        header("Location: index.php?c=producto&a=listar");
    }
}