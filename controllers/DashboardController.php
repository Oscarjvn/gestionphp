<?php
require_once 'models/Productos.php';
require_once 'models/Categorias.php';
require_once 'models/Usuarios.php';
class DashboardController {
    private $db;

    public function __construct($db) {
        // El Middleware: Si no hay sesión, fuera de aquí.
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?c=auth&a=login");
            exit;
        }
        $this->db = $db;
    }

    public function index() {
        $productoModel = new Producto($this->db);
        $categoriaModel = new Categoria($this->db);
        $usuarioModel = new Usuario($this->db);
        
        $totalProductos = $productoModel->countAll('producto');
        $totalCategorias = $categoriaModel->countAll('categoria');
        $totalUsuarios = $usuarioModel->countAll('usuario');

        require_once 'views/dashboard/index.php';
    }
}