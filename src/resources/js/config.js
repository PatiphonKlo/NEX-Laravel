(function () {
    // บรรทัดนี้เริ่มต้นฟังก์ชันที่ทำงานทันที (Immediately Invoked Function Expression, IIFE)

    // var savedConfig = sessionStorage.getItem("__CONFIG__");
    var savedConfig = localStorage.getItem("__CONFIG__");
    // บรรทัดนี้ดึงข้อมูลการกำหนดค่าที่เก็บไว้ใน localStorage ในตัวแปร savedConfig

    var defaultConfig = {
        layout: {
            width: "default",  // Boxed width Only available at large resolutions > 1600px (xl)
            position: "fixed",
        },
        topbar: {
            view: "default"
        },
    };
    // กำหนดค่าเริ่มต้นสำหรับการกำหนดค่าของเลย์เอาท์และแถบบน (topbar)

    const html = document.getElementsByTagName("html")[0];
    // เข้าถึง HTML element หลักของหน้าเว็บ

    let config = Object.assign(JSON.parse(JSON.stringify(defaultConfig)), {});
    // สร้างตัวแปร config โดยคัดลอกค่าจาก defaultConfig

    config.theme = html.getAttribute("data-mode") || defaultConfig.theme;
    config.layout.width = html.getAttribute("data-layout-width") || defaultConfig.layout.width;
    config.layout.position = html.getAttribute("data-layout-position") || defaultConfig.layout.position;
    config.topbar.view = html.getAttribute("data-topbar-view") || defaultConfig.topbar.view;
    // อัปเดตค่าใน config จาก attributes ของ HTML element

    window.defaultConfig = JSON.parse(JSON.stringify(config));
    // บันทึกค่า config เป็นค่าเริ่มต้น

    if (savedConfig !== null) {
        config = JSON.parse(savedConfig);
        config.topbar.view = html.getAttribute("data-topbar-view") || defaultConfig.topbar.view;
    }
    // หากมีค่า savedConfig ใน localStorage, อัปเดตค่า config

    window.config = config;
    // บันทึกค่า config ให้เข้าถึงได้

    if (config) {
        html.setAttribute("data-layout-width", config.layout.width);
        html.setAttribute("data-layout-position", config.layout.position);
        // ตั้งค่า attributes บน HTML element ตามค่าใน config

        if (window.innerWidth <= 1140) {
            html.setAttribute("data-topbar-view", "mobile");
        } else {
            html.setAttribute("data-topbar-view", config.topbar.view);
        }
        // ตั้งค่าการแสดงผลของแถบบน (topbar) ให้เหมาะสมกับขนาดหน้าจอ
    }
})();
// ปิดการทำงานของฟังก์ชัน IIFE
