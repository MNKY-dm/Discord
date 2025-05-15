<?php
require_once('bdd.php');
$servers = $conn->query("SELECT server_id, server_name FROM server")->fetchAll(PDO::FETCH_ASSOC); // Permet de récupérer les serveurs de la base de données

?>

<div class="server-bar">
    <div class="private-messages">
        <img src="https://placehold.co/40" alt="Espace privé" id="private-space">
    </div>
    <div class="separator"><div class="server-separator"></div></div>
    <div class="servers">
        <?php foreach ($servers as $server) : ?>
            <img src="https://placehold.co/40" alt="<?= htmlspecialchars($server["server_name"]) ?>" data-server-id="<?php echo $server['server_id'] ?>">
        <?php endforeach; ?>
        <a href="/code/discord_server/create_server_form.php">
            <img src="https://placehold.co/40" alt="Ajouter un serveur">
        </a>
        <a href="/code/deconnexion.php">
            <img src="https://placehold.co/40" alt="Se déconnecter">
        </a>
        <script src="/code/js/server-bar-control.js"></script>
    </div>
  </div>