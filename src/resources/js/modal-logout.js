document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("logoutModal");
    var button = document.getElementById("logoutButton");

    button.addEventListener("click", function (event) {
        modal.classList.remove("hidden");
        event.stopPropagation(); 
    });

    window.addEventListener("click", function (event) {
        if (event.target !== modal) {
            modal.classList.add("hidden");
        }
    });
});

