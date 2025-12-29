document.addEventListener("DOMContentLoaded", function () {
    // Auto dismiss alerts
    document.querySelectorAll(".alert-dismissible").forEach(function (alert) {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 3000);
    });

    // Sidebar toggle
    const toggleBtn = document.getElementById("toggle-btn");
    const sidebar = document.getElementById("sidebar-wrapper");
    const content = document.getElementById("main-content");

    if (toggleBtn && sidebar && content) {
        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("collapsed");
            content.classList.toggle("expanded");
        });
    }
});
