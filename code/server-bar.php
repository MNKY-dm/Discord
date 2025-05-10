<?php
require_once('bdd.php');
$servers = $conn->query("SELECT server_id, server_name FROM server")->fetchAll(PDO::FETCH_ASSOC); // Permet de récupérer les serveurs de la base de données

?>

<div class="server-bar">
    <div class="private-messages">
        <a href="/Discord/code/index.php">
            <img src="https://placehold.co/40" alt="Espace privé">
        </a>
    </div>
    <div class="separator"><div class="server-separator"></div></div>
    <div class="servers">
        <?php foreach ($servers as $server) : ?> <!-- Boucle qui permet d'afficher une image pour chaque serveur existant -->
            <img src="https://placehold.co/40" alt="<?= htmlspecialchars($server["server_name"]) ?> " data-server-id="<?= $server['server_id'] ?>">
        <?php endforeach; ?>
        <script>
            document.querySelectorAll("[data-server-id]").forEach(img => { // Sélectionne les éléments qui ont l'attribut 'data-server-id'

                img.addEventListener('click', (event) => { // Pour chaque img trouvée, ajoute un événement "click"

                    const serverId = event.currentTarget.dataset.serverId // Récupère la valeur de 'data-server-id' en type str grâce à dataset
                    console.log('Serveur cliqué :', serverId) // Affiche le résultat dans la console du navigateur pour vérifier si cela fonctionne
                    fetch("./discord_server/get_channels.php?server_id=" + serverId)  // Envoie une requête http asynchrone ('fetch()'), avec l'id du serveur qui convient, depuis le fichier server.php
                        .then(response => { // Dès que la requête reçoit une réponse, les données sont récupérées en format json (pour rendre les données compatibles entre JS et PHP)
                            if (!response.ok) {
                                console.log(response)
                                throw new Error('HTTP error ' + response.status)
                            }
                            return response.json()
                        })
                        .then(data => { // Ensuite, affiche les données dans la console pour vérifier une fois de plus si ça fonctionne
                            console.log('Données reçues :', data)
                            console.log('Données en string :', JSON.stringify(data))
                            try {
                                fetch("save_channels.php", {
                                    method : 'POST',
                                    headers : {'Content-Type': 'application/json'},
                                    body : JSON.stringify(data)
                                }) 
                                    .then(response => {
                                        console.log(response);
                                        console.log('la reponse est : ' + response.ok)
                                        console.log('le status est : ' + response.status)
                                        console.log('le statusText est : ' + response.statusText)
                                        console.log('le Text est : ' + response.responseText)
                                    })
                                
                            } catch(error) {
                                console.log(error)
                            }
                        })

                        .catch(error => { // Si le fetch ne fonctione pas, attrape une erreur
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