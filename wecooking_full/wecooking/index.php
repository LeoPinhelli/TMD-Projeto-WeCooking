<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../styles/header.css"> <!-- CSS Header -->
    <link rel="stylesheet" href="../styles/internal.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/receipt_card.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/modal.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>WeCooking | Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>

    <!--
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
-->

</head>

<style>
    p {
        margin: 0;
        padding: 0;
        z-index: 10;
        width: fit-content;
        font-weight: 600;
    }

    .content {
        display: flex;
        flex-direction: column;
    }

    .banner {
        width: 99vw;
        height: auto;

        display: flex;
        flex-direction: column;
        align-items: center;
        align-self: center;

        margin-bottom: 5vh;

        transition: 0.9s;
    }

    .banner a {
        transition: 1s;
    }

    .banner img {
        height: 44vh;
    }

    .banner a:nth-child(2) {
        position: absolute;
        z-index: 1;
    }

    .title {
        font-size: 3vh;
        color: #FF6A28;
        font-weight: 700;

        display: flex;
        flex-direction: row;
        align-items: flex-end;

        align-self: center;
        width: 94%;


        .more {
            font-size: 1.8vh;
            color: #000;

            cursor: pointer;
        }

        .more:hover {
            text-decoration: underline;
        }
    }

    .fa-heart {
        opacity: 0;
        transition: 0.5s;
        cursor: pointer;

        z-index: 50;
    }

    .title a {
        margin-left: auto;
        text-decoration: none;
    }

    .receita {
        transition: 0.6s;
    }

    .receita:hover {
        transform: scale(1.1);
    }
</style>

<body>
    <div class="screen">
        <div class="content">

            <div class="banner" style="background-color: #202020;">
                <a href="https://wecooking.online/filter.php#torta" id="banner1">
                    <img src="./assets/banner.png">
                </a>
                <a href="https://wecooking.online/filter.php#bolo" id="banner2" style="opacity: 0">
                    <img src="./assets/banner2.png">
                </a>
            </div>

            <div class='title'>Receitas da semana</div>
            <div class="receipt-index-2">

            </div>

            <div class='title' style="margin-top: 4vh">
                Adicionadas recentemente
                <a href='https://wecooking.online/filter.php#recentes'><span class='more'>Ver mais</span></a>
            </div>
            <div class="receipt-index">

            </div>

            <div class='title' style="margin-top: 4vh">
                Bolos
                <a href='https://wecooking.online/filter.php#bolo'><span class='more'>Ver mais</span></a>
            </div>
            <div class="receipt-index-3">

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
    let usuario = '';

    $('document').ready(function () {
        const cookies = document.cookie.split(" ");
        const cookieUser = cookies.find((element) => element.includes("User"));

        if (cookieUser) {
            var email = cookieUser.split("=")[1];

            $.ajax({
                url: "https://wecooking.online/php/get_user_id.php",
                type: "POST",
                data: { userEmail: email },
                success: function (response) {
                    usuario = response.split("</html>")[1];

                    $.ajax({
                        url: "https://wecooking.online/php/verify_all_favorites.php",
                        type: "POST",
                        data: { userId: usuario },
                        success: function (response) {
                            let result = response.split("</html>")[1];

                            let recArr = result.split("<br>")
                            console.log(recArr)

                            for (let x = 0; x < recArr.length; x++) {
                                $('[id="fav' + recArr[x] + '"]').removeClass("fa-regular")
                                $('[id="fav' + recArr[x] + '"]').addClass("fa-solid")
                            }
                        },
                        cache: false,
                    });
                },
                cache: false,
            });
        }

        $.ajax({
            url: './php/get_receipts.php',
            type: 'POST',
            data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1" ORDER BY receipt_date_added DESC LIMIT 4 ' },
            success: function (response) {
                $(".receipt-index").append(response)

                let recLink = '';
                let link = '';

                $(".receipt-index a").on('mouseenter', function (e) {
                    recLink = $(".receipt-index").find(e.currentTarget)
                    link = recLink.attr("href")
                    $(".receipt-index #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '1')
                })

                $(".receipt-index a").on('mouseleave', function (e) {
                    $(".receipt-index #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '0')
                })

                $(".receipt-index .fa-heart").on('mouseenter', function () {
                    $(".receipt-index").find(recLink).attr('href', 'javascript:void(0)')
                })
                $(".receipt-index .fa-heart").on('mouseleave', function () {
                    $(".receipt-index").find(recLink).attr('href', link)
                })

                $(".receipt-index .fa-heart").on('click', function () {
                    if (cookieUser) {
                        $.ajax({
                            url: "https://wecooking.online/php/favoritar.php",
                            type: "POST",
                            data: { userId: usuario, receitaId: link.split('/')[2] },
                            success: function () {
                                location.reload();
                            },
                            cache: false,
                        });

                    } else {
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
                    }
                })
            },
            cache: false
        });

        $.ajax({
            url: './php/get_receipts.php',
            type: 'POST',
            data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1" ORDER BY receipt_entries DESC LIMIT 4 ' },
            success: function (response) {
                $(".receipt-index-2").append(response)

                let recLink = '';
                let link = '';

                $(".receipt-index-2 a").on('mouseenter', function (e) {
                    recLink = $(".receipt-index-2").find(e.currentTarget)
                    link = recLink.attr("href")
                    $(".receipt-index-2 #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '1')
                })

                $(".receipt-index-2 a").on('mouseleave', function (e) {
                    $(".receipt-index-2 #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '0')
                })

                $(".receipt-index-2 .fa-heart").on('mouseenter', function () {
                    $(".receipt-index-2").find(recLink).attr('href', 'javascript:void(0)')
                })
                $(".receipt-index-2 .fa-heart").on('mouseleave', function () {
                    $(".receipt-index-2").find(recLink).attr('href', link)
                })

                $(".receipt-index-2 .fa-heart").on('click', function () {
                    if (cookieUser) {
                        $.ajax({
                            url: "https://wecooking.online/php/favoritar.php",
                            type: "POST",
                            data: { userId: usuario, receitaId: link.split('/')[2] },
                            success: function () {
                                location.reload();
                            },
                            cache: false,
                        });

                    } else {
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
                    }
                })
            },
            cache: false
        });

        $.ajax({
            url: './php/get_receipts.php',
            type: 'POST',
            data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1" AND receipt_tags LIKE "%bolo%" LIMIT 4 ' },
            success: function (response) {
                $(".receipt-index-3").append(response)

                if ($(".receipt-index-3").children().length != 5) {
                    $(".receipt-index-3").append('<div style="padding: 2vh; display: flex"><span style="width: 16vw;"></span></div>')
                }

                let recLink = '';
                let link = '';

                $(".receipt-index-3 a").on('mouseenter', function (e) {
                    recLink = $(".receipt-index-3").find(e.currentTarget)
                    link = recLink.attr("href")
                    $(".receipt-index-3 #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '1')
                })

                $(".receipt-index-3 a").on('mouseleave', function (e) {
                    $(".receipt-index-3 #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '0')
                })

                $(".receipt-index-3 .fa-heart").on('mouseenter', function () {
                    $(".receipt-index-3").find(recLink).attr('href', 'javascript:void(0)')
                })
                $(".receipt-index-3 .fa-heart").on('mouseleave', function () {
                    $(".receipt-index-3").find(recLink).attr('href', link)
                })

                $(".receipt-index-3 .fa-heart").on('click', function () {
                    if (cookieUser) {
                        $.ajax({
                            url: "https://wecooking.online/php/favoritar.php",
                            type: "POST",
                            data: { userId: usuario, receitaId: link.split('/')[2] },
                            success: function () {
                                location.reload();
                            },
                            cache: false,
                        });

                    } else {
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
                    }
                })
            },
            cache: false
        });

        //-----------------------------------------------------------

        let i = 1;

        setInterval(function () {
            if (i === 1) {
                $("#banner1").css('opacity', '0')
                $("#banner2").css('opacity', '1')
                $(".banner").css('background-color', '#372232')

                i = 2
            } else if (i === 2) {
                $("#banner2").css('opacity', '0')
                $("#banner1").css('opacity', '1')
                $(".banner").css('background-color', '#202020')

                i = 1
            }
        }, 4000);
    });

    // Scroll
    let btn = $('#scroll_btn');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            $(btn).css("visibility", "visible")
        } else {
            $(btn).css("visibility", "")
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    //-------------------------------------------------------------------
</script>

</html>