// Preloader
document.addEventListener("DOMContentLoaded", function () {
    const preloader = document.querySelector(".preloader");

    window.addEventListener("load", function () {
        // Add a delay before hiding the preloader (e.g., 2 seconds)
        setTimeout(() => {
        preloader.classList.add("hidden");
        }, 800); // 2000ms = 2 seconds
    });
});
