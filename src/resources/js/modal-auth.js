document.addEventListener("DOMContentLoaded", function () {
    var isAuthenticated = JSON.parse(
        document.getElementById("auth-data").textContent
    );
    var modal = document.getElementById("loginModal");
    var links = document.querySelectorAll("x-link");

    links.forEach(function (link) {
        link.addEventListener("click", function (event) {
            if (!isAuthenticated) {
                event.preventDefault();
                modal.classList.remove("hidden");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var loginModal = document.getElementById("loginModal");
    var closeModalButton = document.getElementById("closeModalButton"); 
    var overlay = document.getElementById('overlay')

    window.addEventListener("click", function (event) {
        if (event.target.closest("#closeModalButton") || event.target == overlay) {
            loginModal.classList.add('hidden');
        }
    });
});
