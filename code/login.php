<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - Mon Discord</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="custom.css" rel="stylesheet"> <!-- Ton thème personnalisé -->
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-dark text-light">

  <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px; background-color: #2c2f33;">
    <h2 class="text-center mb-4" style="color: #fff;">Connexion</h2>
    
    <form method="POST" action="login.php">
      <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="exemple@domaine.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Se connecter</button>
      </div>
    </form>

    <div class="text-center mt-3">
      <a href="register.php" class="text-light">Créer un compte</a>
    </div>
  </div>

</body>
</html>
