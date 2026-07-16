document.addEventListener('DOMContentLoaded', () => {
    const messages = document.querySelector('.messages');

    if (messages) {
        messages.scrollTop = messages.scrollHeight;
    }
});

const messageTextarea = document.querySelector('textarea[name="content"]');
messageTextarea.focus();
messageTextarea.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        this.form.submit();
    }
});