<?php
require_once 'models/Categorias.php';

class CategoriaController {
    private $categoriaModel;

    public function __construct($db) {
        if (!isset($_SESSION['user_id'])) exit(header("Location: index.php?c=auth&a=login"));
        $this->categoriaModel = new Categoria($db);
    }

    public function listar() {
        $categorias = $this->categoriaModel->getAll();
        require_once 'views/categorias/listar.php';
    }

    public function eliminar() {
        if ($_SESSION['rol'] === 'admin') {
            // Lógica de integridad referencial
            if ($this->categoriaModel->getById($_GET['id'])) {
                $_SESSION['msg'] = "No se puede eliminar: tiene productos asociados.";
            } else {
                $this->categoriaModel->delete($_GET['id']);
            }
        }
        header("Location: index.php?c=categoria&a=listar");
    }
    public function crear() {
    // Solo el administrador puede crear categorías
    if ($_SESSION['rol'] !== 'admin') {
        header("Location: index.php?c=categoria&a=listar");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        
        // Suponiendo que tu modelo Categoria tiene el método create
        $this->categoriaModel->create($nombre,$descripcion);
        
        header("Location: index.php?c=categoria&a=listar");
        exit;
    }
    
    require_once 'views/categorias/crear.php';
}
}