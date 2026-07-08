function deleteConfirmation(selector, message) {
    const deleteButtons = document.querySelectorAll(selector);

    deleteButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            const confirmed = confirm(message);

            if (!confirmed) {
                event.preventDefault();
            }
        });
    });
}