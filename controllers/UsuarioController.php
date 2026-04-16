<?php
require_once 'models/Usuarios.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct($db) {
        if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'admin') {
            header("Location: index.php?c=dashboard&a=index");
            exit;
        }
        $this->usuarioModel = new Usuario($db);
    }

    public function listar() {
        $usuarios = $this->usuarioModel->getAll();
        require_once 'views/usuarios/listar.php';
    }

    public function crear() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Extraemos los valores individuales del array $_POST
        $nombre   = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $rol      = $_POST['rol'] ?? 'usuario'; // Por si no viene el rol

        // 2. Pasamos los argumentos uno por uno, como espera el modelo
        $this->usuarioModel->registrar($nombre, $apellido, $email, $password, $rol);
        
        header("Location: index.php?c=usuario&a=listar");
        exit;
    }
    require_once 'views/usuarios/crear.php';
}

   
}