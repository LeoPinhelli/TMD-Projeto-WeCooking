$('document').ready(function () {
    const cookies = document.cookie.split(" ");
    const cookieUser = cookies.find((element) => element.includes("User"));

    if (cookieUser) { // Se o usuário estiver logado
        $("#menu-list").append('<li><span id="logout"><i class="fa-solid fa-right-from-bracket"></i>Sair</span></li>') // Coloca o botão de sair

        const cookieUserEmail = cookieUser.split("=")[1]; // Pega o email do usuário logado

        $.ajax({
            url: 'https://wecooking.online/php/verify_admin.php', // Verifica se o usuário é admin
            type: 'POST',
            data: { email: cookieUserEmail },
            success: function (response) {
                let result = response.split("</html>")[1];

                if (result === '1') {
                    $("#menu-list").append('<li><a href="https://wecooking.online/adm_dashboard.php"><i class="fa-solid fa-table-columns"></i><span>Adm. Dash.</span></a></li>') // Coloca o botão do dashboard de administrador
                } else {
                }
            },
            cache: false
        });

        $.ajax({ // Pega a foto do usuário e seta no perfil do menu
            url: 'https://wecooking.online/php/get_user_photo.php',
            type: 'POST',
            data: { email: cookieUserEmail },
            success: function (response) {
                let userPhotoPath = response.split("</html>")[1];
                $("#menu_perfil").empty();
                $("#menu_perfil").append("<img class='user_photo' src='https://wecooking.online/users_photos/" + userPhotoPath + "'>");

                $(".user_photo").on('error', function(){
                    $("#menu_perfil").empty();
                    $("#menu_perfil").append("<i class='fa-solid fa-user'></i>")
                })
            },
            cache: false
        });
    } else {
        $("#menu_perfil").click(function(){ // Faz o botão do perfil redirecionar para a tela de login
            location.href = "https://wecooking.online/login.php"
        })
    }
})