function initMessages(receiver_id) {
    const container = document.getElementById('messages');
    const form = document.getElementById('msgForm');
    if (!container || !form) return;

    async function loadMessages() {
        const res = await fetch('discord_PM/get_PM.php?receiver_id=' + receiver_id);
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
        await fetch('discord_PM/send_PM.php?receiver_id=' + receiver_id, {
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
    // On cible les bons éléments qui ont data-receiver-id
    document.querySelectorAll('.channel-cosmetic[data-receiver-id]').forEach(channel => {
        channel.addEventListener('click', function(event) {
            event.preventDefault();
            const receiver_id = this.dataset.receiver_id;
            if (typeof clickOnChannel === 'function') {
                // On passe le vrai event et le bon receiver_id
                clickOnChannel({ 
                    currentTarget: this, 
                    preventDefault: () => {}, 
                    receiver_id: receiver_id 
                });
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const receiver_id = document.getElementById('messages')?.dataset.receiver_id
        || new URLSearchParams(window.location.search).get('receiver_id');
    if (document.getElementById('messages') && document.getElementById('msgForm') && receiver_id) {
        initMessages(receiver_id);
    }
    initChannelClicks();
});