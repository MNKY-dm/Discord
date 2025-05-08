<?php
require_once('bdd.php');
$servers = $conn->query("SELECT server_id, server_name FROM server")->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="server-bar">
    <div class="private-messages">
        <a href="/Discord/code/index.php">
            <img src="https://placehold.co/40" alt="Espace privé">
        </a>
    </div>
    <div class="separator"><div class="server-separator"></div></div>
    <div class="servers">
        <?php foreach ($servers as $server) : ?>
            <img src="https://placehold.co/40" alt="<?= htmlspecialchars($server["server_name"]) ?> " data-server-id="<?= $server['server_id'] ?>">
        <?php endforeach; ?>
        <script>
            document.querySelectorAll("[data-server-id]").forEach(img => { // Sélectionne les éléments qui ont l'attribut 'data-server-id'

                img.addEventListener('click', (event) => { // Pour chaque img trouvée, ajoute un événement "click"

                    const serverId = event.currentTarget.dataset.serverId // Récupère la valeur de 'data-server-id' en type str grâce à dataset
                    console.log('Serveur cliqué :', serverId) // Affiche le résultat dans la console du navigateur pour vérifier si cela fonctionne
                    fetch("./discord_server/get_channels.php?server_id=" + serverId)  // Envoie une requête http asynchrone ('fetch()') avec l'id du serveur qui convient depuis le fichier server.php
                        .then(response => { // Dès que la requête reçoit une réponse, les données sont récupérées en format json (pour rendre les données compatibles entre JS et PHP)
                            if (!response.ok) {
                                console.log(response)
                                throw new Error('HTTP error ' + response.status);
                            }
                            return response.json();
                        })
                        .then(data => { // Ensuite, affiche les données dans la console pour vérifier une fois de plus si ça fonctionne
                            console.log('Données reçues :', data)
                        })

                        .catch(error => { // Si le fecth ne fonctione pas, attrape une erreur
                            console.error('Erreur AJAX :', error)
                        })
                })
            })
        </script>
        <a href="/Discord/code/discord_server/create_server_form.php">
            <img src="https://placehold.co/40" alt="Ajouter un serveur">
        </a>
        <a href="/Discord/code/deconnexion.php">
            <img src="https://placehold.co/40" alt="Se déconnecter">
        </a>
    </div>
  </div>