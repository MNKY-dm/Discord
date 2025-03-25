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
            background-color: var(--bg-color);
            color: var(--text-color);
            overflow: hidden;
            transition: background-color 0.3s, color 0.3s;
        }

        :root {
            --bg-color: #36393f;
            --text-color: white;
            --sidebar-bg: #202225;
            --channel-bg: #2f3136;
            --message-bg: #40444b;
            --message-sent-bg: #5865f2;
            --button-bg: #5865f2;
            --hover-bg: #40444b;
        }

        .light-mode {
            --bg-color: white;
            --text-color: black;
            --sidebar-bg: #e3e5e8;
            --channel-bg: #f0f0f0;
            --message-bg: #dcdcdc;
            --message-sent-bg: #007bff;
            --button-bg: #007bff;
            --hover-bg: #99aab5;
        }

        /* Sidebar styling */
        .sidebar {
            width: 80px;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
            transition: background-color 0.3s;
        }

        .server-icon {
            width: 60px;
            height: 60px;
            margin: 10px 0;
            border-radius: 50%;
            background-color: var(--button-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .server-icon:hover {
            background-color: var(--hover-bg);
        }

        .channels, .members {
            width: 240px;
            background-color: var(--channel-bg);
            padding: 10px;
            transition: background-color 0.3s;
        }

        .channel {
            padding: 8px;
            cursor: pointer;
            border-radius: 5px;
        }

        .channel:hover {
            background-color: var(--message-bg);
        }

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
            background-color: var(--message-bg);
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            animation: fadeIn 0.5s ease;
        }

        .message.sent {
            background-color: var(--message-sent-bg);
            color: white;
            text-align: right;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
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
            background-color: var(--channel-bg);
            padding: 10px;
            display: flex;
            align-items: center;
            border-top: 1px solid var(--message-bg);
        }

        .send-message input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: var(--message-bg);
            color: var(--text-color);
            outline: none;
        }

        .send-message button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: var(--button-bg);
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .send-message button:hover {
            background-color: var(--hover-bg);
        }

        /* Liste des membres */
        .members {
            width: 240px;
            background-color: var(--channel-bg);
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

        /* Bouton de basculement du thème */
        .toggle-theme-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: var(--button-bg);
            border: none;
            padding: 10px 15px;
            color: white;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .toggle-theme-btn:hover {
            background-color: var(--hover-bg);
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
    <div class="sidebar">
        <div class="server-icon">🏠</div>
        <div class="server-icon">💬</div>
        <div class="server-icon">🎮</div>
    </div>

    <div class="channels">
        <h3>Salons</h3>
        <div class="channel" onclick="switchChannel('general')"># général</div>
        <div class="channel" onclick="switchChannel('annonces')"># annonces</div>
        <div class="channel" onclick="switchChannel('support')"># support</div>
    </div>

    <div class="chat-container">
        <div class="chat" id="chat">
            <!-- Salon général -->
            <div id="general" class="channel-content active">
                <h2># général</h2>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Malik" class="message-avatar"><strong>Malik :</strong> Salut tout le monde !
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Rémi" class="message-avatar"><strong>Rémi :</strong> Salut Malik, comment ça va ?
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Malik" class="message-avatar"><strong>Malik :</strong> Ça va bien, et toi ?
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Rémi" class="message-avatar"><strong>Rémi :</strong> Ça va, je suis super content de travailler sur ce projet Discord !
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Ash" class="message-avatar"><strong>Ash :</strong> Moi aussi ! On va bien s'amuser 😎
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Malik" class="message-avatar"><strong>Malik :</strong> Totalement ! On va avoir un super produit à la fin !
                </div>
            </div>

            <!-- Salon annonces -->
            <div id="annonces" class="channel-content">
                <h2># annonces</h2>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Rémi" class="message-avatar"><strong>Rémi :</strong> Les nouvelles fonctionnalités arrivent bientôt !
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Ashvin" class="message-avatar"><strong>Ashvin :</strong> Super, j'ai hâte de les tester !
                </div>
            </div>

            <!-- Salon support -->
            <div id="support" class="channel-content">
                <h2># support</h2>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Noah" class="message-avatar"><strong>Noah :</strong> Comment puis-je aider ?
                </div>
                <div class="message">
                    <img src="https://via.placeholder.com/50" alt="Ash" class="message-avatar"><strong>Ash :</strong> J'ai un problème de connexion.
                </div>
            </div>
        </div>

        <div class="send-message">
            <input type="text" id="messageInput" placeholder="Envoyer un message...">
            <button id="sendBtn">Envoyer</button>
        </div>
    </div>

    <div class="members">
        <h3>Membres en ligne</h3>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Malik">Malik</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Rémi">Rémi</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Ash">Ash</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Noah">Noah</div>
        <div class="member"><img src="https://via.placeholder.com/50" alt="Ashvin">Ashvin</div>
    </div>

    <!-- Bouton de basculement du thème -->
    <button class="toggle-theme-btn" onclick="toggleMode()">🌙/🌞</button>

    <script>
        let currentChannel = "general";
        const chatMessages = {
            general: [
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Malik'><strong>Malik :</strong> Salut tout le monde !</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Rémi'><strong>Rémi :</strong> Salut Malik, comment ça va ?</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Malik'><strong>Malik :</strong> Ça va bien, et toi ?</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Rémi'><strong>Rémi :</strong> Ça va, je suis super content de travailler sur ce projet Discord !</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Ash'><strong>Ash :</strong> Moi aussi ! On va bien s'amuser 😎</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Malik'><strong>Malik :</strong> Totalement ! On va avoir un super produit à la fin !</div>`
            ],
            annonces: [
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Rémi'><strong>Rémi :</strong> Les nouvelles fonctionnalités arrivent bientôt !</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Ashvin'><strong>Ashvin :</strong> Super, j'ai hâte de les tester !</div>`
            ],
            support: [
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Noah'><strong>Noah :</strong> Comment puis-je aider ?</div>`,
                `<div class='message'><img src='https://via.placeholder.com/50' class='message-avatar' alt='Ash'><strong>Ash :</strong> J'ai un problème de connexion.</div>`
            ]
        };

        function toggleMode() {
            document.body.classList.toggle("light-mode");
        }

        function switchChannel(channel) {
            currentChannel = channel;
            document.getElementById("chat-title").textContent = `# ${channel}`;
            updateChat();
        }

        function updateChat() {
            const chatContainer = document.getElementById("chat");
            chatContainer.innerHTML = `<h2 id="chat-title"># ${currentChannel}</h2>`;
            chatMessages[currentChannel].forEach(message => {
                chatContainer.innerHTML += message;
            });
        }

        document.getElementById("sendBtn").addEventListener("click", sendMessage);
        document.getElementById("messageInput").addEventListener("keydown", (e) => {
            if (e.key === "Enter") sendMessage();
        });

        function sendMessage() {
            const messageInput = document.getElementById("messageInput");
            const messageText = messageInput.value.trim();
            if (messageText !== "") {
                const newMessage = `<div class='message sent'><strong>Vous :</strong> ${messageText}</div>`;
                chatMessages[currentChannel].push(newMessage);
                updateChat();
                messageInput.value = "";
            }
        }

        // Initial load
        updateChat();
    </script>

</body>

</html>
