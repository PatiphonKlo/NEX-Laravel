document.addEventListener("DOMContentLoaded", function () {
    var loginModal = document.getElementById("loginModal");
    var overlay = document.getElementById('overlay')

    window.addEventListener("click", function (event) {
        if (event.target.closest("#closeModalButton") || event.target == overlay) {
            loginModal.classList.add('hidden');
        }
    });
});
