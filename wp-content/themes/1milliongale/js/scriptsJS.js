document.addEventListener("DOMContentLoaded", function () {
    if (typeof lightbox !== "undefined") {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    } else {
        console.error("Lightbox no se ha cargado correctamente.");
    }
});