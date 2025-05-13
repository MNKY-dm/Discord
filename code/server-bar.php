<?php
require_once('bdd.php');
$servers = $conn->query("SELECT server_id, server_name FROM server")->fetchAll(PDO::FETCH_ASSOC); // Permet de récupérer les serveurs de la base de données

?>

<div class="server-bar">
    <div class="private-messages">
        <a href="/code/main.php?page=mp">
            <img src="https://placehold.co/40" alt="Espace privé">
        </a>
    </div>
    <div class="separator"><div class="server-separator"></div></div>
    <div class="servers">
        <?php foreach ($servers as $server) : ?>
            <img src="https://placehold.co/40" alt="<?= htmlspecialchars($server["server_name"]) ?>" data-server-id="<?php echo $server['server_id'] ?>">
        <?php endforeach; ?>
        <script>

            async function changeContent(url, htmlClass) { // Fonction asynchrone pour que les informations parviennent de manière non blocantes
                try {
                    const response = await fetch(url) // on stocke la réponse du fetch dans une variable, après avoir attendu que la promise renvoyée soit résolue
                    const result = await response.text() // Puis on prend le texte de cette réponse et on le met dans une variable
                    document.getElementsByClassName(htmlClass)[0].innerHTML = result // Ce qui nous permet ensuite de remplacer le contenu de la page de manière asynchronisée avec le reste

                } catch (error) {
                    console.error('Erreur lors du changement du contenu : ', error)
                }
            }

            async function getChannels(serverId) {
                const response = await fetch('/code/discord_server/get_channels.php?server_id=' + serverId) // Même principe qu'au dessus : on attend que la promise du fetch soit résolue pour stocker le résultat dans la variable response
                    if (!response.ok) {
                        console.log(response)
                        throw new Error('HTTP Error : ' + response.status)
                    }
                    return response.json()
                    
            }

            async function postChannels(data) { // Fonction asynchrone pour pouvoir utiliser le await dans la fonction clickOnServer afin de bien gérer le temps de résolution des fetch
                return fetch('save_channels.php', {
                    method : 'POST',
                    headers : {'Content-Type': 'application/json'},
                    body : JSON.stringify(data)
                })
            }

            async function clickOnServer(event) {
                const serverId = event.currentTarget.dataset.serverId // Affecte à serverId la valeur réucpérée grâce à l'attribut data-* 
                console.log("Serveur cliqué : ", serverId)
                try {
                    // Faire toutes les fonctions définies plus haut les unes après les autres pour éviter que les différentes se croisent et fasse échouer l'AJAX
                    const data = await getChannels(serverId)
                    await postChannels(data)
                    await changeContent("/code/channel-fill.php", "content")
                    await changeContent("/code/channels-bar.php", "side-content")
                } catch (error) {
                    console.error('Erreur AJAX : ', error)
                }                
            }

            document.querySelectorAll("[data-server-id]").forEach(img => { // Sélectionne les éléments qui ont l'attribut 'data-server-id'

                img.addEventListener('click', clickOnServer)

            })

        </script>
        <a href="/code/discord_server/create_server_form.php">
            <img src="https://placehold.co/40" alt="Ajouter un serveur">
        </a>
        <a href="/code/deconnexion.php">
            <img src="https://placehold.co/40" alt="Se déconnecter">
        </a>
    </div>
  </div>