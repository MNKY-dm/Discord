<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discord</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            display: flex;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #36393f;
            color: white;
            overflow: hidden; /* Empêche le défilement global */
        }

        /* Barre latérale des serveurs */
        .sidebar {
            width: 80px;
            background-color: #202225;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
        }

        .server-icon {
            width: 60px;
            height: 60px;
            margin: 10px 0;
            border-radius: 50%;
            background-color: #5865f2;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Barre latérale des canaux */
        .channels {
            width: 240px;
            background-color: #2f3136;
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        .channel {
            padding: 8px;
            cursor: pointer;
            border-radius: 5px;
        }

        .channel:hover {
            background-color: #40444b;
        }

        /* Zone principale du chat */
        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 10px;
            background-color: #40444b;
            padding: 10px;
            border-radius: 5px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Barre d'envoi de message */
        .send-message {
            background-color: #2f3136;
            padding: 10px;
            display: flex;
            align-items: center;
            border-top: 1px solid #40444b;
        }

        .send-message input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #40444b;
            color: white;
            outline: none;
        }

        .send-message button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #5865f2;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .send-message button:hover {
            background-color: #4f50e2;
        }

        /* Liste des membres */
        .members {
            width: 240px;
            background-color: #2f3136;
            padding: 10px;
        }

        .member {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .member img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar, .channels, .members {
                width: 100%;
                height: auto;
            }

            .chat {
                padding: 10px;
            }

            .send-message {
                flex-direction: column;
            }

            .send-message input {
                width: 100%;
                margin-bottom: 10px;
            }

            .send-message button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Barre latérale des serveurs -->
    <div class="sidebar">
        <div class="server-icon">🏠</div>
        <div class="server-icon">💬</div>
        <div class="server-icon">🎮</div>
    </div>

    <!-- Barre latérale des canaux -->
    <div class="channels">
        <h3>Salons</h3>
        <div class="channel" id="general"># général</div>
        <div class="channel"># annonces</div>
        <div class="channel"># support</div>
    </div>

    <!-- Zone principale du chat -->
    <div class="chat-container">
        <div class="chat" id="chat">
            <h2># général</h2>
            <div class="message"><strong>Malik :</strong> Salut tout le monde !</div>
            <div class="message"><strong>Rémi :</strong> Bienvenue sur le projet Discord !</div>
            <div class="message"><strong>Ash :</strong> Comment ça va ?</div>
        </div>

        <!-- Barre d'envoi de message -->
        <div class="send-message">
            <input type="text" id="messageInput" placeholder="Envoyer un message...">
            <button id="sendBtn">Envoyer</button>
        </div>
    </div>

    <!-- Liste des membres -->
    <div class="members">
        <h3>Membres en ligne</h3>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Malik">Malik</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Rémi">Rémi</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Ash">Ash</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Noah">Noah</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Ashvin">Ashvin</div>
    </div>

    <!-- JavaScript : Gestion de l'envoi de message -->
    <script>
        const messageInput = document.getElementById('messageInput');
        const sendBtn = document.getElementById('sendBtn');
        const chat = document.getElementById('chat');

        // Fonction pour envoyer un message
        function sendMessage() {
            const messageText = messageInput.value.trim();
            if (messageText !== "") {
                const newMessage = document.createElement('div');
                newMessage.classList.add('message');
                newMessage.innerHTML = `<strong>Vous :</strong> ${messageText}`;
                chat.appendChild(newMessage);
                messageInput.value = "";

                // Fait défiler vers le dernier message
                chat.scrollTop = chat.scrollHeight;
            }
        }

        // Envoi du message au clic
        sendBtn.addEventListener('click', sendMessage);

        // Envoi du message avec "Entrée"
        messageInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    </script>

</body>

</html>