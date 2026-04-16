<?php
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
        // Aquí es donde el Dashboard cumple su función: 
        // Cargar los datos para las "Cards" de la vista.
        $totalProductos = 0; // Luego aquí llamarás al modelo
        $totalCategorias = 0;
        $totalUsuarios = 0;

        require_once 'views/dashboard/index.php';
    }
}