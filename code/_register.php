<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription - Mon Discord</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="custom.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-dark text-light">

  <div class="card p-4 shadow-lg w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4">Créer un compte</h2>

    <form method="POST" action="traitement_register.php">
      <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="username" name="username" required placeholder="Ex : shadow#0001">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="exemple@domaine.com">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </div>
    </form>

    <div class="text-center mt-3">
      <a href="login.php" class="text-light">Déjà un compte ? Se connecter</a>
    </div>
  </div>

</body>
</html>
