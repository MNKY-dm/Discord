<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Board</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        #messages { border: 1px solid #ccc; padding: 10px; max-height: 300px; overflow-y: auto; }
    </style>
</head>
<body>
    <h2>Live Message Board</h2>
    <form id="msgForm">
        <input type="text" id="message" placeholder="Type a message" required>
        <button type="submit">Send</button>
    </form>
    <div id="messages"></div>

    <script>
        async function loadMessages() {
            const res = await fetch('get.php');
            const data = await res.json();
            const container = document.getElementById('messages');
            container.innerHTML = data.map(m => `<p>${m.content}</p>`).join('');
        }

        document.getElementById('msgForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const msg = document.getElementById('message').value;
            try {
                await fetch('send.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `message=${encodeURIComponent(msg)}`
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Fetch OK')
                    }
                    else {
                        throw new Error('AJAX error ' + response.status)
                    }
                })
            }
            catch (error) {
                console.log('Erreur AJAX :', error)
            }
            document.getElementById('message').value = '';
            loadMessages();
        });

        setInterval(loadMessages, 3000); // 3s
        loadMessages();
    </script>
</body>
</html>
