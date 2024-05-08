<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <title>WeCooking | Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<style>
    .title {
        font-size: 3vh;
        border-bottom: 0.1vh solid orange;
    }

    .links {
        display: flex;
        flex-direction: row;

        gap: 3vw;
        margin-top: 4vh;
    }

    .links a {
        color: #000;
        text-decoration: none;

        height: 8vh;
        width: auto;

        border-radius: 2vh;
        border: 0.1vh solid #f1f1f1;

        background-color: #fff;
        box-shadow: 0.4vh 0.4vh 0.4vh #00000040;

        transition: 0.4s ease-in-out;
        padding: 2vh;

        .link {
            display: flex;
            justify-content: space-between;
            height: 100%;

            .fa-solid {
                font-size: 3vh;
                align-self: flex-end;
                margin-left: 2vw;
                color: orange;
            }
        }

        .link span {
            font-size: 3vh;
            text-align: center;
        }
    }

    .links a:hover {
        background-color: #ffa50050;
    }
</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Admin Dashboard</div>
            <div class="links">
                <a href="https://wecooking.online/receita_layout.php#admin">
                    <div class="link">
                        <span>Adicionar Receitas</span>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </a>

                <a href="https://wecooking.online/gerenciador_receitas.php">
                    <div class="link">
                        <span>Gerenciar Receitas</span>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                </a>

                <a href="https://wecooking.online/gerenciador_usuarios.php">
                    <div class="link">
                        <span>Gerenciar Usuários</span>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                </a>

                <a href="https://wecooking.online/relatorios.php">
                    <div class="link">
                        <span>Relatórios</span>
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                </a>
            </div>
            <div class="links">
                <a href="https://wecooking.online/receitas_usuarios.php">
                    <div class="link">
                        <span>Receitas dos Usuários</span>
                        <i class="fa-solid fa-receipt"></i>
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
<script>
</script>

</html>