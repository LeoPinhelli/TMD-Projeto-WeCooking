<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../styles/header.css"> <!-- CSS Header -->
    <link rel="stylesheet" href="../styles/internal.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>WeCooking | Sobre Nós</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>

<style>
    .screen {
        width: 100vw !important;
    }

    .title {
        font-size: 3vh;
        border-bottom: 0.1vh solid #F78C2F;
    }

    .texts {
        display: flex;
        flex-direction: column;

        margin-top: 6vh;

        gap: 4vh;
    }

    .desc {
        margin-top: -2vh;
    }

    .footer {
        position: absolute;
        bottom: 0
    }

</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Sobre nós</div>
            <div class="texts">
                <span>O WeCooking é um site de receitas desenvolvido para a conclusão de curso do Colégio Pedro Macedo.</span>
                <span><b>Desenvolvedor</b></span>
                <span class="desc">Tiago Hilgenberg Ijaille Budziak: responsável pelo desenvolvimento do site, utilizando as linguagens HTML, CSS, JavaScript, PHP e MySQL.</span>
                <span><b>Designer</b></span>
                <span class="desc">Gregory José Kolbe: responsável por desenhar e modelar todas as telas do nosso site na plataforma Figma.</span>
                <span><b>Analista</b></span>
                <span class="desc">Leonardo Sotti Pinhelli: responsável pelas pesquisas à respeito do projeto e por documentar todo o projeto.</span>
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
</script>

</html>