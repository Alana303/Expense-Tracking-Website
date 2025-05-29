document.addEventListener("DOMContentLoaded", function () {
    const serviceBoxes = document.querySelectorAll(".service-box");

    serviceBoxes.forEach(box => {
        box.addEventListener("mouseenter", function () {
            this.style.transform = "scale(1.05)";
            this.style.transition = "0.3s";
        });

        box.addEventListener("mouseleave", function () {
            this.style.transform = "scale(1)";
        });
    });
});
