<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../styles/external.css"> <!-- CSS Externo -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="tela_externa">
        <a href="https://wecooking.online"><img src="./assets/logo.png" class="logo"></a>
        <div class="content">
            <!--
            <div class="login_left">
                <img src="../assets/logo.png" class="logo">
                <div class="desc">
                    O seu website de receitas!
                </div>
            </div>
            <div class="center">
                &nbsp
            </div> -->
            <div class="login_right">
                <h1 class="title">Login</h1>
                <form id="form-login">
                    <input type="email" class="input" name="email" maxlength="255" autocomplete="off"
                        placeholder="Email*">
                    <div class="group-senha">
                        <input type="password" class="input" name="senha" maxlength="255" autocomplete="off" id="senha"
                            placeholder="Senha*">
                        <i class="fa-solid fa-eye" id="icon_senha"></i>
                    </div>
                    <div class="column">
                        <span id="errorLabel"></span>
                    </div>
                    <div class="column">
                        <div class="links">
                            <a href="./cadastro.php" class="link1">Criar conta</a>
                            <a href="./recuperar.php" class="link2">Esqueci a senha</a>
                        </div>
                        <div class="button">
                            <input type="submit" name="enviar" value="LOGIN" class="btn_login" id="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $("document").ready(function () {
        /* if (window.location.hash) {
            let msg = window.location.hash.split("#")[1];
            alert(msg);
            window.location.hash = "";
        } */
    })

    $(".fa-eye").on("click", function (e) {
        $("#icon_senha").toggleClass("fa-eye")
        $("#icon_senha").toggleClass("fa-eye-slash")

        if ($("#senha").attr('type') === 'password') {
            $("#senha").attr('type', 'text')
        } else {
            $("#senha").attr('type', 'password')
        }
    })

    $("form#form-login").submit(function (e) {
        e.preventDefault(); // Previne o submit de recarregar a página

        let emailField = $("[name=email]").val(); // Valor do campo de email
        let passwordField = $("[name=senha]").val(); // Valor do campo de senha

        if (emailField === "") { // Se o campo de email estiver vazio
            $("#errorLabel").text("Digite um e-mail válido.")
        } else if (passwordField === "") { // Se o campo de senha estiver vazio
            $("#errorLabel").text("Digite sua senha.")
        } else { // Se nenhum campo estiver vazio
            $("#errorLabel").text("")

            var formData = new FormData(this); // Pega os dados do form

            $.ajax({
                url: './php/login.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    let loginStatus = response.split("</html>")[1];

                    if (loginStatus === '1') {
                        document.cookie = "User=" + emailField;
                        window.location.href = "https://wecooking.online"
                    } else if (loginStatus === '0') {
                        $("#errorLabel").text("Email ou senha incorretos")
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
</script>

</html>