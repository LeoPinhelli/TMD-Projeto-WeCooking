$("document").ready(function () {
    const cookies = document.cookie.split(" ");
    const cookieUser = cookies.find((element) => element.includes("User"));

    let receita = location.href.split("/")[4]

    $("#send-comment").attr('disabled', true)

    $.ajax({
        url: 'https://wecooking.online/php/get_comments.php',
        type: 'POST',
        data: { receiptId: receita },
        success: function (response) {
            let commentInfo = response.split("</html>")[1]

            let nComments = (commentInfo.split("/").length - 1)

            if (nComments >= 1) {
                for (let i = 0; i < nComments; i++) {
                    let item = commentInfo.split("/")[i]
                    let comment = item.split(";")[0]
                    let user = item.split(";")[(1)]

                    $(".comments").append("<div id='comment" + i + "'></div>")
                    $("#comment" + i).append("<span class='comment' id='text" + i + "'>" + comment + "</span>")

                    $.ajax({
                        url: 'https://wecooking.online/php/get_user_comment.php',
                        type: 'POST',
                        data: { userId: user },
                        success: function (response) {
                            let userData = response.split("</html>")[1]
                            let userName = userData.split(",")[0]
                            let userPhoto = userData.split(",")[1]

                            $("#text" + i).before("<div class='image'><img src='https://wecooking.online/users_photos/" + user + "/" + userPhoto + "'><span>" + userName + "</span></div>")
                        },
                        cache: false,
                    });
                }
            } else {
                $(".comments").append("<span class='no-comment'>Nenhum comentário encontrado.</span>")
            }
        },
        cache: false,
    });

    if (cookieUser) {
        var email = cookieUser.split("=")[1];

        $("#send-comment").on("click", function () {
            let commentValue = document.getElementById("text-comment").value

                $.ajax({
                    url: "https://wecooking.online/php/get_user_id.php",
                    type: "POST",
                    data: { userEmail: email },
                    success: function (response) {
                        usuario = response.split("</html>")[1];

                        $.ajax({
                            url: "https://wecooking.online/php/save_comment.php",
                            type: "POST",
                            data: { userId: usuario, receitaId: receita, comment: commentValue },
                            success: function (response) {
                                location.reload();
                            },
                            cache: false,
                        });
                    },
                    cache: false,
                })
        })

        $("#text-comment").on("keyup", function () {
            if ($("#text-comment").val() === '') {
                $("#send-comment").attr('disabled', true)
            } else {
                $("#send-comment").attr('disabled', false)
            }
        })

    } else {
        $("#send-comment").on('click', function () {
            $(".screen").append("<div class='modal-warning'></div>")

            $(".modal-warning").append("<div class='modal-message'></div>")

            $(".modal-message").append("<span class='modal-title'>Gostou dessa receita?</span>")
            $(".modal-message").append("<span>Faça o login para comentar.</span>")
            $(".modal-message").append("<div class='modal-links'></div>")

            $(".modal-links").append("<a href='https://wecooking.online/login.php'>Fazer login</a>")
            $(".modal-links").append("<span id='modalNo'>Não, obrigado</span>")

            $("#modalNo").on("click", function () {
                $(".modal-warning").remove();
            })
        })
    }

    $(".env-comment").before("<div class='title' style='color: #FF6A28; font-size: 2.4vh'><b>Comentários</b></div>")
})