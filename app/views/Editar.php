<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Editar Amigo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                              <a class="nav-link active" aria-current="page" href="../public/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="#">Registrar Amigos</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="./public/sorteio.php">Sortear Amigo Secreto</a>
                        </li>
                        </ul>
                  </div>
            </div>
      </nav>

      <div class="container mt-5">
            <h2>Editar Amigo</h2>
            <form method="POST" action="">
                  <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                  </div>
                  <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </form>

            <?php if (!empty($message)): ?>
                  <div class="alert <?php echo $result ? 'alert-success' : 'alert-danger'; ?> mt-3">
                        <?php echo htmlspecialchars($message); ?>
                  </div>
            <?php endif; ?>
      </div>
</body>
</html>
