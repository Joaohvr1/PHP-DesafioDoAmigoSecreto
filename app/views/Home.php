

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center border-bottom border-primary-secondary" id="navbarTogglerDemo01">
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/Registro.php">Registrar Amigos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sortear.php">Sortear Amigo Secreto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Lista de Amigos</h2>

        <ul class="list-group">
            <?php if(!empty($nomes)): ?>
                <?php foreach($nomes as $nome): ?>
                    <li class="list-group-item"><?php echo htmlspecialchars($nome); ?></li>
                <?php endforeach ?>
            <?php else: ?>
                <li class="list-group-item">Nenhum nome encontrado</li>
            <?php endif;?>

        </ul>
    </div>
</body>
</html>