<?php
session_start();
$page = $_GET['page'] ?? 'home'; // home, mp, channel
$server_id = $_GET['server_id'] ?? null;
$mp_id = $_GET['mp_id'] ?? null;
?>
<div class="layout">
    <?php include 'server-bar.php'; ?>
    <?php
    // Affichage dynamique de la barre latérale
    if ($page === 'home' || $page === 'mp') {
        include 'friends-bar.php';
    } elseif ($page === 'channel') {
        // Récupère les channels du serveur, par exemple via $_SESSION ou une requête
        include 'channels-bar.php';
    }
    ?>
    <main>
        <?php
        // Affichage du contenu central
        if ($page === 'home') {
            include 'accueil-content.php';
        } elseif ($page === 'mp') {
            include 'mp-content.php';
        } elseif ($page === 'channel') {
            include 'channel-fill.php';
        }
        ?>
    </main>
</div>