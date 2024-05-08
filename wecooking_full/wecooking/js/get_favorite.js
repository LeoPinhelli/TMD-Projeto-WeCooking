$("document").ready(function () {
    const cookies = document.cookie.split(" ");
    const cookieUser = cookies.find((element) => element.includes("User"));

    let receita = location.href.split("/")[4]

    if (cookieUser) {
        var email = cookieUser.split("=")[1];

        $.ajax({
            url: "https://wecooking.online/php/get_user_id.php",
            type: "POST",
            data: { userEmail: email },
            success: function (response) {
                usuario = response.split("</html>")[1];

                $.ajax({
                    url: "https://wecooking.online/php/verify_favorite.php",
                    type: "POST",
                    data: { userId: usuario, receitaId: receita },
                    success: function (response) {
                        let result = response.split("</html>")[1];

                        if (result === "1") {
                            $("#fav").removeClass("fa-regular")
                            $("#fav").addClass("fa-solid")
                            $("#fav").addClass("clicked")
                        } else {
                        }
                    },
                    cache: false,
                });
            },
            cache: false,
        });

        $("#fav").mouseover(function () {
            $("#fav").toggleClass("hover")
        })

        $("#fav").mouseout(function () {
            $("#fav").toggleClass("hover")
        })

        $("#fav").on("click", function () {
            $("#fav").toggleClass("fa-regular")
            $("#fav").toggleClass("fa-solid")
            $("#fav").toggleClass("clicked")

            $.ajax({
                url: "https://wecooking.online/php/favoritar.php",
                type: "POST",
                data: { favorito: "1", userId: usuario, receitaId: receita },
                cache: false,
            });
        })
    } else {
        $("#fav").on("click", function () {
            $(".screen").append("<div class='modal-warning'></div>")

            $(".modal-warning").append("<div class='modal-message'></div>")

            $(".modal-message").append("<span class='modal-title'>Gostou dessa receita?</span>")
            $(".modal-message").append("<span>Faça o login para salva-lá em seus favoritos.</span>")
            $(".modal-message").append("<div class='modal-links'></div>")

            $(".modal-links").append("<a href='https://wecooking.online/login.php'>Fazer login</a>")
            $(".modal-links").append("<span id='modalNo'>Não, obrigado</span>")

            $("#modalNo").on("click", function () {
                $(".modal-warning").remove();
            })
        })
        
        $("#fav").mouseover(function () {
            $("#fav").toggleClass("hover")
        })

        $("#fav").mouseout(function () {
            $("#fav").toggleClass("hover")
        })
    }
})