<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    require_once 'bdd.php';

    $stmt = $conn -> prepare("SELECT * FROM users WHERE email = :email");
    $stmt -> bindParam(':email', $email);
    $stmt -> execute();
    if ($stmt->rowCount() > 0) {
        $user = $stmt-> fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['username'];
            echo "<p style='color: green;'>Connexion réussie !</p>";
            header("Location: index.php");
            exit();
        } else{
            echo "<p style 'color: red;'>Connexion échouée.</p>";
        }

    }else{
        echo "<p style='color: red;'>Connexion échouée.</p>";
    }

    $conn = null;
    }
?>

<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Connexion</h2>
        <form action="connexion.php" method = "POST">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>


            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se Connecter">
        </form>

        <p> Pas encore inscrit ? <a href="inscription.php" class="register-link"> Inscrivez-vous ici</a> </p>

    </div>
</body>
</html>