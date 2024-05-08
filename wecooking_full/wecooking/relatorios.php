<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/search.css">
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <title>WeCooking | Relatórios</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<style>
    .content {
        display: flex;
        flex-direction: column;
    }

    .title {
        font-size: 3vh;
        border-bottom: 0.1vh solid orange;
    }

    .links {
        display: flex;
        flex-direction: row;

        gap: 1.5vw;
        margin-top: 4vh;
    }

    .links {
        color: #000;
        text-decoration: none;

        width: fit-content;

        border-radius: 2vh;
        box-shadow: 0.4vh 0.4vh 0.4vh #00000040;

        background-color: #fff;

        padding: 2vh;

        .link {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;

            .fa-solid {
                font-size: 4vh;
                align-self: flex-end;
                margin-left: 2vw;
            }
        }

        .link span {
            font-size: 2.4vh;
            text-align: center;
        }
    }

.links a {
text-decoration:none;color:#000;
}
</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Relatórios</div>
            <div class="links">
                <a href="https://wecooking.online/relatorio.php#entries">
                    <div class="link" style="padding-right: 1.5vw">
                        <span>Número de acessos</span>
                    </div>
                </a>
            </div>
        </div>
        <button id="scroll_btn">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
</body>
<script type="text/javascript" src="./js/header.js">// Header</script>
<script type="text/javascript" src="./js/menu_perfil.js">// Menu</script>
<script type="text/javascript" src="./js/verify_admin_session.js">// Verifica o cookie e se é um admin</script>
<script type="text/javascript" src="./js/logout.js">// Botão de Logout</script>

</html>