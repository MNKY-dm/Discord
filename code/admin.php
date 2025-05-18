<?php
if (!isset($_SESSION)) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    include 'bdd.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn -> prepare("SELECT * FROM users WHERE email = :email AND id= 0");
        $stmt -> bindParam(':email', $email);
        $stmt -> execute();

        if ($stmt->rowCount() > 0) {
            $admin = $stmt-> fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $admin['password'])){
                $_SESSION['admin'] = $admin['username'];
                echo "<p style='color: green;'>Connexion admin réussie !</p>";
                header("Location: admin_dashboard.php");
                exit();
            } else{
                echo "<p style 'color: red;'>Mot de passe incorrect.</p>";
            }

        }else{
            echo "<p syle='color: red;'> Admin non trouvé ou identifiant incorrect. </p>";
        }
    }catch (PDOException $e){
        echo "Erreur: " . $e ->getMessage();
}
    $conn = null;
    }
?>




<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion admin </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="from-container">
            <div>
                <h2> Connexion admin </h2>
                <form action="admin.php" method="POST">
                    <label for="email"> Email :</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password"> Mot de passe :</label>
                    <input type="passsword" id="password" name="password" required>

                    <input type="submit" value="Se connecter">
                </form>
</body>
</html>