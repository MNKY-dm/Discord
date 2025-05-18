async function loadMessages() {
    const res = await fetch('get_messages.php');
    const data = await res.json();
    const container = document.getElementById('messages');
    container.innerHTML = data.map(m => `<p>${m.message_content}</p>`).join('');
}

document.getElementById('msgForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const msg = document.getElementById('message').value;
    await fetch('send_messages.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `message=${encodeURIComponent(msg)}`
    });
    document.getElementById('message').value = '';
    loadMessages();
});

setInterval(loadMessages, 3000); // poll every 3 seconds
loadMessages();