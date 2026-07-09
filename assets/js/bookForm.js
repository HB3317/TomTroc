const imageInput = document.querySelector("#bookImage");
const preview = document.querySelector("#book-preview");

imageInput.addEventListener("change", () => {
    const file = imageInput.files[0];
    if (!file) {
        return;
    }
    preview.src = URL.createObjectURL(file);
});