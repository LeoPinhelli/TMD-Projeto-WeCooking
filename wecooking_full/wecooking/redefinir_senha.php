<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/external.css"> <!-- CSS Externo -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Redefinir senha</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>
<style>
    .info {
        margin-top: 2vh;
    }
</style>

<body>
    <div class="tela_externa">
        <a href="https://wecooking.online"><img src="./assets/logo.png" class="logo"></a>
        <div class="content">
            <!--
            <div class="login_left">
                <img src="./assets/logo.png" class="logo">
                <div class="desc">
                    O seu website de receitas!
                </div>
            </div>
            <div class="center">
                &nbsp
            </div>
            -->
            <div class="login_right">
                <h1 class="title">Redefinir Senha</h1>
                <div class="info">
                    Insira sua nova senha abaixo.
                </div>
                <form id="form-redefinir">
                    <input type="email" id="email" class="input" name="email" value="tiago.budziak@escola.pr.gov.br"
                        disabled style="background-color: #c1c1c1">
                    <div class="group-senha">
                        <input type="password" class="input" name="nova_senha" id="senha" placeholder="Nova senha*">
                        <i class="fa-solid fa-eye" id="icon_senha"></i>
                    </div>
                    <div class="group-senha">
                        <input type="password" class="input" name="conf_nova_senha" id="confSenha"
                            placeholder="Confirmar nova senha*">
                        <i class="fa-solid fa-eye" id="icon_confSenha"></i>
                    </div>
                    <div class="column">
                        <span id="errorLabel"></span>
                    </div>
                    <div class="column">
                        <div class="links">
                            <a href="./login.php" class="link1">Fazer login</a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="button">
                            <input type="submit" name="enviar" value="ALTERAR SENHA" class="btn_login" id="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(".fa-eye").on("click", function (e) { // Mostrar senha
        let idValue = e.target.id;

        $("#" + idValue).toggleClass("fa-eye")
        $("#" + idValue).toggleClass("fa-eye-slash")

        if ($("#" + idValue.split("_")[1]).attr('type') === 'password') {
            $("#" + idValue.split("_")[1]).attr('type', 'text')
        } else {
            $("#" + idValue.split("_")[1]).attr('type', 'password')
        }
    })

    let windowHash = window.location.hash;

    $("document").ready(function () {
        if (window.location.hash) {
            $("#email").attr("value", windowHash.split("#")[1])
            window.location.hash = "";
        }
        else {
            window.location = "./login.php"
        }
    })

    $("form#form-redefinir").submit(function (e) {
        e.preventDefault(); // Previne o submit de recarregar a página

        let emailField = $("[name=email]").val(); // Valor do campo de email
        let passwordField = $("[name=nova_senha]").val(); // Valor do campo de senha
        let confirmPasswordField = $("[name=conf_nova_senha]").val(); // Valor do campo de confirmar senha

        var formData = new FormData(this); // Pega os dados do form
        formData.append('email', emailField);

        if (passwordField === "") { // Se o campo de senha estiver vazio
            $("#errorLabel").text("Digite sua senha!")
        } else if (confirmPasswordField === "") { // Se o campo de confirmar senha estiver vazio
            $("#errorLabel").text("Confirme sua senha!")
        } else {
            if (passwordField === confirmPasswordField) {
                $("#submit").attr("disabled", true);

                $.ajax({
                    url: './php/redefinir_senha.php',
                    type: 'POST',
                    data: formData,
                    success: function () {
                        $("#errorLabel").text("Senha alterada com sucesso!")
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
            else {
                $("#errorLabel").text("As senhas precisam ser iguais!")
            }
        }
    });
</script>

</html>