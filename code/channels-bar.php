<?php
require_once "discord_server/class/Server.php";
require_once "bdd.php";
if (!isset($_SESSION)) {
    session_start();
}
$channels = $_SESSION['channels'] ?? [];
$server = Server::getServer($conn, $_SESSION['current-server-id']);
$server_name = $server->name;
// echo '<pre>';
// var_dump($channels);
// echo '</pre>';
?>

<div class="side-content">
    <div class="channels-bar">
        <div class="top-bar">
            <div class="server-name gg-semibold"><?= $server_name ?? 'Nom du serveur' ?></div>
            <a href="discord_server/add_member_form.php?server_id=<?= $server->id ?>">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="white"><path fill="currentColor" d="M14.5 8a3 3 0 1 0-2.7-4.3c-.2.4.06.86.44 1.12a5 5 0 0 1 2.14 3.08c.01.06.06.1.12.1ZM16.62 13.17c-.22.29-.65.37-.92.14-.34-.3-.7-.57-1.09-.82-.52-.33-.7-1.05-.47-1.63.11-.27.2-.57.26-.87.11-.54.55-1 1.1-.92 1.6.2 3.04.92 4.15 1.98.3.27-.25.95-.65.95a3 3 0 0 0-2.38 1.17ZM15.19 15.61c.13.16.02.39-.19.39a3 3 0 0 0-1.52 5.59c.2.12.26.41.02.41h-8a.5.5 0 0 1-.5-.5v-2.1c0-.25-.31-.33-.42-.1-.32.67-.67 1.58-.88 2.54a.2.2 0 0 1-.2.16A1.5 1.5 0 0 1 2 20.5a7.5 7.5 0 0 1 13.19-4.89ZM9.5 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM15.5 22Z" class=""/><path fill="currentColor" d="M19 14a1 1 0 0 1 1 1v3h3a1 1 0 0 1 0 2h-3v3a1 1 0 0 1-2 0v-3h-3a1 1 0 1 1 0-2h3v-3a1 1 0 0 1 1-1Z" class=""/></svg>
            </a>
        </div>
        <div class="channel-category">
            <ul class="channels">
                <?php foreach ($channels as $channel) :?>
                    <li class="channel">
                        <div class="channel-cosmetic" data-channel-id="<?php echo $channel['channel_id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon__2ea32" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><path fill="currentColor" fill-rule="evenodd" d="M10.99 3.16A1 1 0 1 0 9 2.84L8.15 8H4a1 1 0 0 0 0 2h3.82l-.67 4H3a1 1 0 1 0 0 2h3.82l-.8 4.84a1 1 0 0 0 1.97.32L8.85 16h4.97l-.8 4.84a1 1 0 0 0 1.97.32l.86-5.16H20a1 1 0 1 0 0-2h-3.82l.67-4H21a1 1 0 1 0 0-2h-3.82l.8-4.84a1 1 0 1 0-1.97-.32L15.15 8h-4.97l.8-4.84ZM14.15 14l.67-4H9.85l-.67 4h4.97Z" clip-rule="evenodd" class=""/></svg>                    
                            <p class="channel-name gg-semibold"><?php echo $channel['channel_name']; ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>