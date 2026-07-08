deleteConfirmation(
    '.delete-book-btn',
    'Voulez-vous vraiment supprimer ce livre ?'
);

const openButton = document.querySelector(".change-image-btn");
const modal = document.querySelector("#change-image-modal");
const closeButton = document.querySelector(".close-modal");

if (openButton && modal && closeButton) {
    openButton.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });
    closeButton.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
}
modal.addEventListener("click", (event) => {
    if (event.target === event.currentTarget) {
        modal.classList.add("hidden");
    }
});
document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
        modal.classList.add("hidden");
    }
});