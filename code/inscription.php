<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inscription </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Inscription</h2>
        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="username"> Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="passwword"> Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirmer le mot de passe :</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <p><input type="checkbox" id="check">J'accepte les <a href="conditions.html">Conditions d'utilisation</a></p>

            <input type="submit" value="S'inscrire">
        </form>
        <p id="error-msg"></p>
    </div>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            var errormsg = document.getElementById("error-msg");

            if (password !== confirmPassword){
                errorMsg.textContent = "Les mot de passe ne correspondent pas. ";
                errorMsg.style.color ="red";
                return false;
            }
            return true;
        }
    </script>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $confirmPassword = htmlspecialchars(trim($_POST['confirm-password']));

        if ($password !== $confirmPassword){
            echo "<p style='color : red;'>Les mot de passes ne correspondent pas. </p>";
        }

        include "bdd.php";

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt -> bindParam(':email' , $email);
        $stmt -> execute();

        if($stmt->rowCount() > 0){
            echo "<p style='color: red;'>Un compte avec cet email existe déjà.</p>";
        }else{
            $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if($stmt->execute()){
                header("Location: connexion.php");
                exit();
            }else{
                echo "<p style='color: red;'>Une erreur est survenue.</p>";
            }
        }

        $conn = null;
    }
    ?>
</body>
</html>