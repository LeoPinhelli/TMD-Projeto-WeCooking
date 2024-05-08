$('document').ready(function () {
    var logoutBtn = document.getElementById("logout");

    $(logoutBtn).click(function () {
        document.cookie = "User=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        location.reload();
    });
})