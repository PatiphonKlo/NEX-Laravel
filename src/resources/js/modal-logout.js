document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("logoutModal");
    var button = document.getElementById("logoutButton");
    var closeModalButton = document.getElementById("closeModalButton"); 

    button.addEventListener("click", function (event) {
        modal.classList.remove("hidden");
        event.stopPropagation(); // ป้องกันการเกิด event bubbling
    });

    window.addEventListener("click", function (event) {
        if (event.target !== modal) {
            modal.classList.add("hidden");
        }
    });
});

