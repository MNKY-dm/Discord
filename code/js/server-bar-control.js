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

        // Permet de changer l'URL sans recharger la page pour faire passer $_GET['page'] en 'channel' + l'id du serveur courant
        history.pushState({}, '', `/code/main.php?page=channel&server_id=${serverId}`);
    } catch (error) {
        console.error("Erreur AJAX lors de l'ouverture de l'espace messages sur le serveur : ", error)
    }                
}

async function clickOnPrivate() {
    try {
        await changeContent("/code/mp.php", "content")
        await changeContent("/code/friends-bar.php", "side-content")
        
        // Permet de changer l'URL sans recharger la page pour faire passer $_GET['page'] en 'mp'
        history.pushState({}, '', `/code/main.php?page=mp`);
    } catch (error) {
        console.error("Erreur AJAX lors de l'ouverture de l'espace messages privés : ", error)
    }
}

function serverBarClicked(space, CSSSelector) {
    document.querySelectorAll(CSSSelector).forEach(img => { // Sélectionne les éléments qui ont l'attribut 'data-server-id'
    if (space === 'private') {
        img.addEventListener('click', clickOnPrivate) // Déclenche l'action de manipuler le DOM pour l'espace privé (MP)
    } else if (space === 'server') {
        img.addEventListener('click', clickOnServer) // Déclenche l'action de manipuler le DOM pour les channels, tout en récupérant les channels
    }
    })
}

serverBarClicked('server', "[data-server-id]") // Capte le clic sur les différentes icônes de serveur dans la server-bar
serverBarClicked('private', "#private-space") // Capte le clic sur l'icône de l'espace personnel 