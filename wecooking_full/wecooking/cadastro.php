<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/external.css"> <!-- CSS Externo -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Criar conta</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>
<style>
    input[type=email] {
        margin-top: 3vh;
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
            <div class="center" style="height: 41vh">
                &nbsp
            </div>
            -->
            <div class="login_right">
                <h1 class="title">Cadastro</h1>
                <form id="form-cadastro">
                    <input type="text" class="input" name="nome" maxlength="50" autocomplete="off" placeholder="Nome*">
                    <input type="email" class="input" name="email" maxlength="50" autocomplete="off"
                        placeholder="Email*">
                    <div class="group-senha">
                        <input type="password" class="input" name="senha" id="senha" maxlength="50" autocomplete="off"
                            placeholder="Senha*">
                        <i class="fa-solid fa-eye" id="icon_senha"></i>
                    </div>
                    <div class="group-senha">
                        <input type="password" class="input" name="conf_senha" id="confSenha" maxlength="50"
                            autocomplete="off" placeholder="Confirmar senha*">
                        <i class="fa-solid fa-eye" id="icon_confSenha"></i>
                    </div>
                    <div class="column">
                        <span id="errorLabel"></span>
                    </div>
                    <div class="column">
                        <div class="links">
                            <a href="./login.php" class="link1">Fazer login</a>
                        </div>
                        <div class="button">
                            <input type="submit" name="enviar" value="CRIAR CONTA" class="btn_login" id="submit">
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

    $("form#form-cadastro").submit(function (e) {
        e.preventDefault(); // Previne o submit de recarregar a página

        let nameField = $("[name=nome]").val(); // Valor do campo de nome
        let emailField = $("[name=email]").val(); // Valor do campo de email
        let passwordField = $("[name=senha]").val(); // Valor do campo de senha
        let confirmPasswordField = $("[name=conf_senha]").val(); // Valor do campo de confirmar senha

        if (nameField === "") { // Se o campo de nome estiver vazio
            $("#errorLabel").text("Digite seu nome.")
        } else if (emailField === "") { // Se o campo de email estiver vazio
            $("#errorLabel").text("Digite um e-mail válido.")
        } else if (passwordField === "") { // Se o campo de senha estiver vazio
            $("#errorLabel").text("Digite sua senha.")
        } else if (confirmPasswordField === "") { // Se o campo de confirmar senha estiver vazio
            $("#errorLabel").text("Confirme sua senha.")
        }
        else { // Se nenhum campo estiver vazio
            $("#errorLabel").text("");

            var formData = new FormData(this); // Pega os dados do form

            $.ajax({
                url: './php/verify_email.php',
                type: 'POST',
                data: { email: emailField },
                success: function (response) {
                    let status = response.split("</html>")[1];

                    if (status === '0') {
                        $("#errorLabel").text("Já existe uma conta com este email.")
                    } else {
                        if (passwordField === confirmPasswordField) {
                            $("#submit").attr("disabled", true);

                            $.ajax({
                                url: './php/cadastro.php',
                                type: 'POST',
                                data: formData,
                                success: function () {
                                    window.location.href = "./login.php"
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        } else {
                            $("#errorLabel").html("As senhas precisam ser iguais")
                        }
                    }
                },
                cache: false,
            });
        }
    });
</script>

</html>