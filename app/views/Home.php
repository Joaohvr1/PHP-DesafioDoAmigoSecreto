<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/home.css">
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
                        <a class="nav-link" href="../public/registrar.php">Registrar Amigos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sortear.php">Sortear Amigo Secreto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Buscar Amigo</h2>
        <form method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Digite o nome do amigo" name="search" aria-label="Nome do amigo">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </form>

        <h2>Lista de Amigos</h2>
        <form method="POST" action="../controllers/AmigoController.php?action=realizarSorteioController">
            <button type="submit" class="btn btn-success mb-3">Sortear</button>
        </form>

        <ul class="list-group">
            <?php
            if (isset($_GET['search'])) {
                $searchTerm = trim($_GET['search']);
                $nomes = $this->model->buscarAmigos($searchTerm);
            } else {
                $nomes = $this->model->listarNomes();
            }

            if (!empty($nomes)): ?>
                <?php foreach ($nomes as $index => $nome): ?>
                    <li class="list-group-item <?php echo ($index % 2 == 0) ? 'bg-light' : 'bg-secondary'; ?>">
                        <?php echo htmlspecialchars($nome); ?>
                        <div class="float-end">
                            <a href="../public/editar.php?nome=<?php echo urlencode($nome); ?>" class="btn btn-warning btn-sm me-1">Editar</a>
                            <form method="POST" action="../controllers/AmigoController.php?action=excluir" class="d-inline">
                                <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">Nenhum nome encontrado</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
