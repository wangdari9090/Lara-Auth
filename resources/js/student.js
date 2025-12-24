setTimeout(function () {
    var alert = document.getElementById("success-alert");
    if (alert) {
        var bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }
}, 2000);
