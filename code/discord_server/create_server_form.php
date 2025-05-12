<?php 
$title = "Créer un serveur - Discord";
ob_start(); ?>

<form action="create_server.php" method="post">
    <label for="server_name gg-semibold">
        <p class="gg-semibold">Nommez votre serveur :</p>  
        <input type="text" name="server_name" id="server_name" placeholder="Nom du serveur">
        <input type="submit" value="Créer">
    </label>
</form>

<?php
$content = ob_get_clean();
include("../template_server.php");
?>