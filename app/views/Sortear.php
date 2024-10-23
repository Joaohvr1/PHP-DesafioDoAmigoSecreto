
<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Amigo Secreto</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                              <a class="nav-link active" aria-current="page" href="../public/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="../public/Registrar.php">Registrar Amigos</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="../public/sorteio.php">Sortear Amigo Secreto</a>
                        </li>
                  </ul>
                  </div>
            </div>
      </nav>

      <div class="container mt-5">
            <?php if (!empty($message)): ?>
                  <div class="alert alert-info">
                  <?= htmlspecialchars($message); ?>
                  </div>
            <?php endif; ?>

            <form method="POST" action="">
                  <button  type="submit" name="sortear" class="btn btn-success mb-3">Sortear amigos secretos</button>
            </form>

            <h2>Resultados do Sorteio</h2>
                  <ul class="list-group">
                  <?php if (!empty($sorteados)): ?>
                        <?php foreach ($sorteados as $tirador => $tirado): ?>
                              <li class="list-group-item">
                              <?= htmlspecialchars($tirador); ?> tirou <?= htmlspecialchars($tirado); ?>
                              </li>
                        <?php endforeach; ?>
                  <?php else: ?>
                        <li class="list-group-item">Nenhum amigo sorteado.</li>
                  <?php endif; ?>
            </ul>
                  

      </div>



</body>
</html>
