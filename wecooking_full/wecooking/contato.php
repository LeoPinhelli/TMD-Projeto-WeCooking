<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../styles/header.css"> <!-- CSS Header -->
    <link rel="stylesheet" href="../styles/internal.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>WeCooking | Contato</title>
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

    .texts a {
        color: orange;
        text-decoration: none;
    }

    .texts a:hover {
        text-decoration: underline;
    }

    .footer {
        position: absolute;
        bottom: 0;
    }

</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Contato</div>
            <div class="texts">
                <span>Valorizamos muito as opiniões, dúvidas, críticas, elogios e sugestões dos nossos usuários, pois elas desempenham um papel fundamental no nosso aprimoramento contínuo.</span>
                <span>Todas as mensagens que recebemos são lidas e contribuem para melhorar os serviços que oferecemos. No entanto, é importante compreender que nem sempre conseguimos fornecer um suporte individualizado para todos os usuários do nosso site.</span>
                <span>Caso queira entrar em contato com a nossa equipe, envie um e-mail para: <a href="mailto:we.cooking.emails@gmail.com">we.cooking.emails@gmail.com</a></span>
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