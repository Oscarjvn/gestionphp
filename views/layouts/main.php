<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario - <?= $title ?? 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="?c=dashboard&a=index">📦 MiTienda</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="?c=producto&a=listar">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="?c=categoria&a=listar">Categorías</a></li>
                    <?php if ($_SESSION['rol'] === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="?c=usuario&a=listar">Usuarios</a></li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-white me-3 small">
                        <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['nombre']) ?> 
                        <span class="badge bg-primary"><?= ucfirst($_SESSION['rol']) ?></span>
                    </span>
                    <a href="?c=auth&a=logout" class="btn btn-outline-danger btn-sm">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>