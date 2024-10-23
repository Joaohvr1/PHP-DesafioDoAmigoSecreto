<?php
    require_once '../controllers/AmigoController.php';
    $DB = require_once '../config/database.php';

    $controller = new AmigoController($DB);
    $controller->registrarAmigoController(); // Processa o registro
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Amigo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Amigo</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Amigo</button>
        </form>
        <?php if (isset($message)) echo "<div class='alert alert-info mt-3'>$message</div>"; ?>
    </div>
</body>
</html>
