<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/external.css"> <!-- CSS Externo -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Recuperar senha</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>
<style>
    .info {
        width: auto;
        margin-top: 2vh;
    }

    #form-recuperar {
        width: auto !important;
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
                <h1 class="title">Recuperar Senha</h1>
                <div class="info">
                    Você receberá um email com instruções para recuperar sua senha.
                </div>
                <form id="form-recuperar">
                    <label for="email" class="label" id="label_email">E-mail*</label>
                    <input type="email" class="input" name="email" placeholder="Email*">
                    <div class="column">
                        <span id="errorLabel"></span>
                    </div>
                    <div class="column">
                        <div class="links">
                            <a href="./login.php" class="link1">Fazer login</a>
                        </div>
                        <div class="button">
                            <input type="submit" name="enviar" value="ENVIAR" class="btn_login" id="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $("form#form-recuperar").submit(function (e) {
        e.preventDefault(); // Previne o submit de recarregar a página

        let emailField = $("[name=email]").val(); // Valor do campo de email

        if (emailField === "") { // Se o campo de email estiver vazio
            $("#errorLabel").text("Digite um e-mail válido.")
        } else { // Se nenhum campo estiver vazio
            $("#errorLabel").text("");

            var formData = new FormData(this); // Pega os dados do form

            $.ajax({
                url: './php/verify_email.php',
                type: 'POST',
                data: { email: emailField },
                success: function (response) {
                    let status = response.split("</html>")[1];

                    if (status === '1') {
                        $("#errorLabel").text("Não existe uma conta com este e-mail.")
                    } else {
                        $("#submit").attr("disabled", true)

                        $.ajax({
                            url: './php/recuperar_senha.php',
                            type: 'POST',
                            data: formData,
                            success: function () {
                                $("#errorLabel").html("<span style='color: lightgreen'>E-mail de recuperação enviado</span>")
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                },
                cache: false,
            });
        }
    })
</script>

</html>