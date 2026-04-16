<?php
class Usuario extends BaseModel {
    protected $table = 'usuario';

    public function registrar($nombre, $apellido, $email, $password, $rol = 'usuario') {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuario (nombre, apellido, email, password, rol) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $apellido, $email, $hash, $rol]);
    }

    public function login($email, $password) {
    // 1. Buscamos al usuario por su email
    $sql = "SELECT * FROM {$this->table} WHERE email = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Si el usuario existe, verificamos la contraseña
    if ($user && password_verify($password, $user['password'])) {
        // Retornamos los datos del usuario (excepto la contraseña por seguridad)
        unset($user['password']); 
        return $user;
    }

    // 3. Si algo falla, retornamos false
    return false;
}
}