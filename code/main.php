<?php
session_start();


// Vérification de la connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}
$page = $_GET['page'] ?? 'home'; // Passer en get la page où on se situe : home, mp ou channel
$server_id = $_GET['server_id'] ?? null;
$mp_id = $_GET['mp_id'] ?? null;
?>
<div class="layout">
    <?php include 'header.php'; ?>
    <?php include 'server-bar.php'; ?>
    <?php
    // Affichage dynamique de la barre latérale
    if ($page === 'home' || $page === 'mp') {
        include 'friends-bar.php';
    } elseif ($page === 'channel') {
        // Récupère les channels du serveur, via $_SESSION
        include 'channels-bar.php';
    }
    ?>
    <main>
        <?php
        // Affichage du contenu central
        if ($page === 'home') {
            include 'accueil.php';
        } elseif ($page === 'mp') {
            include 'mp.php';
        } elseif ($page === 'channel') {
            include 'channel-fill.php';
        } elseif ($page === 'create_server') {
            include 'discord-server/create_server_form.php';
        }
        ?>
    </main>
</div>