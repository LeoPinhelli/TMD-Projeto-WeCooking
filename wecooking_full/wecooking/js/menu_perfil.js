$('document').ready(function() {

    let menuPerfil = document.getElementById("menu_perfil");

    const cookies = document.cookie.split(" ");
    const cookieUser = cookies.find((element) => element.includes("User"));

    $(menuPerfil).click(function () {
        if (cookieUser) {
            $('#perfil').toggleClass("scaleUp");
        }
    }); 

})	