<?php
// 1. Iniciamos la sesión para rastrear al usuario (Fase 4: Seguridad)
session_start();

// 2. Cargamos la infraestructura base
require_once 'config/database.php';
require_once 'models/BaseModel.php'; // Vital para que no dé el error anterior

// 3. Inicializamos la conexión a la DB
$database = new Database();
$db = $database->connect();

/**
 * 4. LÓGICA DEL ENRUTADOR
 * Capturamos el controlador (c) y la acción (a) de la URL.
 * Ejemplo: index.php?c=producto&a=listar
 */

// Si no viene controlador en la URL, por defecto usamos 'Auth'
$controllerInput = isset($_GET['c']) ? $_GET['c'] : 'Auth';
// Si no viene acción, por defecto usamos 'login'
$action = isset($_GET['a']) ? $_GET['a'] : 'login';

// Formateamos el nombre del controlador (ej: 'producto' -> 'ProductoController')
$controllerName = ucfirst($controllerInput) . "Controller";
$controllerPath = "controllers/" . $controllerName . ".php";

// 5. EJECUCIÓN DEL ENRUTADO
if (file_exists($controllerPath)) {
    require_once $controllerPath;

    if (class_exists($controllerName)) {
        // Instanciamos el controlador pasándole la conexión PDO
        $controllerObject = new $controllerName($db);

        // Verificamos si el método existe dentro del controlador
        if (method_exists($controllerObject, $action)) {
            // Ejecutamos la acción (ej: listar(), login(), etc.)
            $controllerObject->$action();
        } else {
            die("Error: La acción '{$action}' no existe en el controlador '{$controllerName}'.");
        }
    } else {
        die("Error: La clase '{$controllerName}' no se encuentra en el archivo.");
    }
} else {
    // Si el controlador no existe (o la URL está vacía), forzamos ir al Login
    header("Location: index.php?c=auth&a=login");
    exit;
}
?>
