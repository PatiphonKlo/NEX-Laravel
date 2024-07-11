import "flowbite";

window.onbeforeunload = function (event) {
    // ตรวจสอบว่าประเภทการนำทางเป็นการรีโหลด
    const [navigation] = performance.getEntriesByType('navigation');
    if (navigation && navigation.type === 'reload') {
        // จำลองการเรียก fetch เพื่อเคลียร์แคช (แทนที่ด้วยการเรียก API ที่แท้จริง)
        fetch("/clear-cache")
            .then((response) => response.json())
            .then((data) => console.log(data))
            .catch((error) => console.error("Error clearing cache:", error));
    }
};
class App {
    // Components
    initComponents() {
        // Back To Top
        const mybutton = document.querySelector('[data-toggle="back-to-top"]');

        window.addEventListener("scroll", function () {
            if (window.scrollY > 72) {
                mybutton.classList.add("flex");
                mybutton.classList.remove("hidden");
            } else {
                mybutton.classList.remove("flex");
                mybutton.classList.add("hidden");
            }
        });

        mybutton.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    // Topbar Fullscreen Button
    initfullScreenListener() {
        var self = this;
        var fullScreenBtn = document.querySelector(
            '[data-toggle="fullscreen"]'
        );

        if (fullScreenBtn) {
            fullScreenBtn.addEventListener("click", function (e) {
                e.preventDefault();
                document.body.classList.toggle("fullscreen-enable");
                if (
                    !document.fullscreenElement &&
                    !document.mozFullScreenElement &&
                    !document.webkitFullscreenElement
                ) {
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (
                        document.documentElement.webkitRequestFullscreen
                    ) {
                        document.documentElement.webkitRequestFullscreen(
                            Element.ALLOW_KEYBOARD_INPUT
                        );
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            });
        }
    }

    init() {
        this.initComponents();
        this.initfullScreenListener();
    }
}

new App().init();

import UploadArea from "./uploadArea";

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".upload-area").forEach((uploadAreaElement) => {
        new UploadArea(uploadAreaElement);
    });
});
