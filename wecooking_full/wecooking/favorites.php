<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/receipt_card.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Favoritos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="./styles/file.css" type="text/css" />
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>
<style>
    p {
        margin: 0;
        padding: 0;
        z-index: 10;
        width: fit-content;
        font-weight: 600;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    .content {
        margin-bottom: 24vh;

        .title {
            font-size: 3vh;
            border-bottom: 0.1vh solid orange;
        }

        .favorites {
            margin-top: 4vh;
            display: grid;
            grid-template-columns: auto auto auto auto;
            place-items: center;

        }
    }
</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Receitas Favoritas </div>
            <div class="favorites">

            </div>
        </div>
        <button id="scroll_btn">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</body>
<script type="text/javascript" src="./js/header.js">// Header</script>
<script type="text/javascript" src="./js/footer.js">// Footer</script>
<script type="text/javascript" src="./js/menu_perfil.js">// Menu</script>
<script type="text/javascript" src="./js/verify_session.js">// Verifica o cookie</script>
<script type="text/javascript" src="./js/logout.js">// Botão de Logout</script>
<script>
    let userId = null;

    $('document').ready(function () {
        const cookies = document.cookie.split(" ");
        const cookieUser = cookies.find((element) => element.includes("User"));

        if (cookieUser) { // Se o usuário estiver logado
            const cookieUserEmail = cookieUser.split("=")[1]; // Pega o email do usuário logado

            $.ajax({
                url: 'https://wecooking.online/php/get_user_id.php', // Verifica se o usuário é admin
                type: 'POST',
                data: { userEmail: cookieUserEmail },
                success: function (response) {
                    let userId = response.split("</html>")[1];

                    $.ajax({
                        url: 'https://wecooking.online/php/get_user_favorites.php', // Verifica se o usuário é admin
                        type: 'POST',
                        data: { user_id: userId },
                        success: function (response) {
                            let userFavorites = response.split("</html>")[1];

                            if (userFavorites === '0') {
                                $(".favorites").append('<span>Sem Favoritos</span>')
                            } else {
                                $(".favorites").append(userFavorites)
                            }
                            //----------------------------------------------------------

                            $(".title").append("(" + $(".favorites").children('a').length + ")")

                            //----------------------------------------------------------

                            if ($('.favorites').children().length < 4) {
                                if ($('.favorites').children().length === 3) {
                                    $(".favorites").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                                } else if ($('.favorites').children().length === 2) {
                                    $(".favorites").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                                } else if ($('.favorites').children().length === 1) {
                                    $(".favorites").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                                }
                            }

                            //----------------------------------------------------------

                            let recLink = null;
                            let link = null;

                            $(".favorites a").on('mouseenter', function (e) {
                                recLink = $(".favorites").find(e.currentTarget)
                                link = recLink.attr("href")
                            })

                            $(".favorites .fa-heart").on('mouseenter', function () {
                                $(".favorites").find(recLink).attr('href', 'javascript:void(0)')
                            })
                            $(".favorites .fa-heart").on('mouseleave', function () {
                                $(".favorites").find(recLink).attr('href', link)
                            })

                            $(".favorites .fa-heart").on('click', function () {
                                $.ajax({
                                    url: "https://wecooking.online/php/favoritar.php",
                                    type: "POST",
                                    data: { userId: userId, receitaId: link.split('/')[2] },
                                    success: function () {
                                        location.reload();
                                    },
                                    cache: false,
                                });
                            })

                            //----------------------------------------------------------
                        },
                        cache: false
                    });
                },
                cache: false
            });

        } else {
            location.href = "https://wecooking.online"
        }

        // Scroll
        $(window).scroll(function () {
            if ($(window).scrollTop() > 200) {
                $('#scroll_btn').css("visibility", "visible")
            } else {
                $('#scroll_btn').css("visibility", "")
            }
        });

        $('#scroll_btn').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });
    })

</script>

</html>