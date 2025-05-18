function initMessages(channelId) {
    const container = document.getElementById('messages');
    const form = document.getElementById('msgForm');
    if (!container || !form) return;

    async function loadMessages() {
        const res = await fetch('discord-messages/get_messages.php?channel_id=' + channelId);
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

function initChannelClicks() {
    // On cible les bons éléments qui ont data-channel-id
    document.querySelectorAll('.channel-cosmetic[data-channel-id]').forEach(channel => {
        channel.addEventListener('click', function(event) {
            event.preventDefault();
            const channelId = this.dataset.channelId;
            // Appelle ici ta logique pour changer de channel
            if (typeof clickOnChannel === 'function') {
                // On passe le vrai event et le bon channelId
                clickOnChannel({ 
                    currentTarget: this, 
                    preventDefault: () => {}, 
                    channelId: channelId 
                });
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const channelId = document.getElementById('messages')?.dataset.channelId
        || new URLSearchParams(window.location.search).get('channel_id');
    if (document.getElementById('messages') && document.getElementById('msgForm') && channelId) {
        initMessages(channelId);
    }
    initChannelClicks();
});