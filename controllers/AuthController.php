<?php
require_once 'models/Usuarios.php';

class AuthController {
    private $db;
    private $usuarioModel;

    public function __construct($db) {
        $this->db = $db;
        $this->usuarioModel = new Usuario($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->usuarioModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['rol'] = $user['rol'];
                header("Location: index.php?c=dashboard&a=index");
            } else {
                $error = "Credenciales incorrectas";
                require_once 'views/auth/login.php';
            }
        } else {
            require_once 'views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?c=auth&a=login");
    }
}