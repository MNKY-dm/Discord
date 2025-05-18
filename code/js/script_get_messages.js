console.log('oui')
function initMessages() {
    const container = document.getElementById('messages');
    const form = document.getElementById('msgForm');
    if (!container || !form) return;

    async function loadMessages() {
        const res = await fetch('discord-messages/get_messages.php');
        const data = await res.json();
        container.innerHTML = data.map(m => 
            `<div class="message">
                <p class="gg-regular">
                    <b class="gg-bold">${m.sender_id}</b> : ${m.message_content}
                </p>
            </div>`
        ).join('');
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const msg = document.getElementById('message').value;
        await fetch('discord-messages/send_messages.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `message=${encodeURIComponent(msg)}`
        });
        document.getElementById('message').value = '';
        loadMessages();
    });

    setInterval(loadMessages, 500);
    loadMessages();
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('messages') && document.getElementById('msgForm')) {
        initMessages();
    }
});