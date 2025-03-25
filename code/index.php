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
        .chat {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 10px;
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
        <div class="channel"># général</div>
        <div class="channel"># annonces</div>
        <div class="channel"># support</div>
    </div>

    <!-- Zone principale du chat -->
    <div class="chat">
        <h2># général</h2>
        <div class="message"><strong>Malik :</strong> Salut tout le monde !</div>
        <div class="message"><strong>Rémi :</strong> Bienvenue sur le projet Discord !</div>
        <div class="message"><strong>Ash :</strong> Comment ça va ?</div>
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

</body>
</html>
