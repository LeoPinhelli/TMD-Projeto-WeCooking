<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/footer.css"> <!-- Footer Styles  -->
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WeCooking | Alterar dados</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="./styles/file.css" type="text/css" />
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
</head>
<style>
.error {
align-self: center;
color: red;
margin-bottom: 2vh
}

    .content {
        display: flex;
        flex-direction: column;
    }

    .title {
        font-size: 3vh;
        border-bottom: 0.1vh solid orange;
    }

    #form-user {
        display: flex;
        flex-direction: row;
        margin-top: 3vh;

        align-self: center;
    }

    .receipt-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: auto;
        margin-left: 5vw;
    }

    .input {
        width: 24vw;
        border: none;
        border-radius: 0.5vh;
        padding: 1vh 1vw;
        background: #ffffff;
        color: #000000;
        font-size: 1.8vh;
        outline: none;
        box-sizing: border-box;
        box-shadow: 0.4vh 0.4vh 0.4vh #00000040;
        border: 0.1vh solid #c1c1c1;
    }

    .group-senha {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-bottom: 3vh;
    }

    .fa-eye,
    .fa-eye-slash {
        font-size: 2vh;
        position: absolute;
        margin-right: 1vw;
        cursor: pointer;
        color: #F89540;
    }

    #submit {
        font-family: 'Roboto', sans-serif;
        font-size: 2vh;
        color: #fff;
        font-weight: 700;

        outline: none;
        border: 0.1vh solid transparent;
        background: #F89540;
        cursor: pointer;
        padding: 0.8vh 3vw;
        border-radius: 20vh;
        text-transform: uppercase;
        transition: 0.3s;

        box-shadow: 0.4vh 0.4vh 0.4vh #00000040;
        align-self: center
    }

    #submit:hover {
        color: #F89540;
        background-color: #FFF;
        border: 0.1vh solid #c1c1c1;
    }

    #submit:disabled {
        background-color: #c1c1c1;
        color: #fff;
        cursor: default;
    }

    .dropzone {
        width: 22vw;
        background-color: #c1c1c1;
        border: none ;
        border-radius: 2vh;
    }

    #imageUpload {
        font-size: 20vh;
        position: absolute;
        align-self: center;
    }

    .dz-image img {
        height: 24vh;
        width: auto;
        align-self: center;
        border-radius: 20vh;
    }

    .dz-preview {
        bottom: 3vh;
        position: relative;
    }

    .dz-message img {
        position: absolute;
        height: 24vh;
        width: 24vh;
        align-self: center;
        border-radius: 20vh;

        object-fit: cover;
        cursor: pointer;
        top: 5vh;
    }

    .imageText {
        background-color: #F78C2F;
        padding: 1vh 2vw;
        border-radius: 3vh;

        font-weight: 700;
        color: #fff;
        cursor: pointer;
        margin-top: 29vh
    }
</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Alterar Informações Pessoais </div>
            <form id="form-user">
                <div class="add-photo">
                    <div id="fileUploader" class="dropzone" name="fileUploader">
                        <div class="dz-message">
                            <div class="imageText">Adicionar Foto</div>
                        </div>
                    </div>
                </div>
                <div class="receipt-info">
                    <label>Nome*</label>
                    <input type="text" name="nome" placeholder="Digite seu nome:" class="input" style="margin-bottom: 3vh">
                    <label>Email*</label>
                    <input type="text" name="email" placeholder="Digite seu email:" class="input" style="margin-bottom: 3vh">
                    <label for="senha">Senha*</label>
                    <div class="group-senha">
                        <input type="password" class="input" name="senha" id="senha" placeholder="Digite sua senha:">
                        <i class="fa-solid fa-eye" id="icon_senha"></i>
                    </div>
                    <!-- <label for="conf_senha">Confirmar senha*</label>
                    <div class="group-senha">
                        <input type="password" class="input" name="conf_senha" id="conf_senha"
                            placeholder="Digite sua senha novamente:">
                        <i class="fa-solid fa-eye" id="icon_conf_senha"></i>
                    </div> -->
<span class="error"></span>
                    <button id="submit">Salvar</button>
                </div>
            </form>
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
    let userData = null;

    $('document').ready(function () {
        const cookies = document.cookie.split(" ");
        const cookieUser = cookies.find((element) => element.includes("User"));

        if (cookieUser) { // Se o usuário estiver logado
            const cookieUserEmail = cookieUser.split("=")[1]; // Pega o email do usuário logado

            $.ajax({
                url: 'https://wecooking.online/php/get_user_data.php',
                type: 'POST',
                data: { userEmail: cookieUserEmail },
                success: function (response) {
                    userData = response.split("</html>")[1];

                    $("[name=nome]").attr("value", userData.split(",")[1]);
                    $("[name=email]").attr("value", userData.split(",")[2]);
                    //$("[name=senha]").attr("value", userData.split(",")[3]);
                    //$("[name=conf_senha]").attr("value", userData.split(",")[3]);

                    if (userData.split(",")[4]) {
                        $(".dz-message").append("<img id='userPhoto' src='https://wecooking.online/users_photos/" + userData.split(",")[0] + "/" + userData.split(",")[4] + "'>");
                        $(".imageText").text("Alterar Foto")
                    } else {
                        $(".dz-message").append("<i class='fa-solid fa-user' id='imageUpload'></i>")
                        $(".imageText").text("Adicionar Foto")
                    }
                },
                cache: false
            });

        } else {
            location.href = "https://wecooking.online"
        }
    })

    $(".fa-eye").on("click", function (e) {
        let clickedIcon = e.currentTarget.id;
        let passId = clickedIcon.split("icon_")[1]

        $("#" + clickedIcon).toggleClass("fa-eye")
        $("#" + clickedIcon).toggleClass("fa-eye-slash")

        if ($("#" + passId).attr('type') === 'password') {
            $("#" + passId).attr('type', 'text')
        } else {
            $("#" + passId).attr('type', 'password')
        }
    })

    $("form#form-user").submit(function (e) {
        e.preventDefault(); // Previne o submit de recarregar a página
        var formData = new FormData(this); // Pega os dados do form

        formData.append('id', userData.split(",")[0])

        if (myDropzone.files.length === 0) {
            formData.append('foto', userData.split(",")[4])
        }

        let inputSenha = $("#senha").val();
        //let inputConfirmSenha = $("#conf_senha").val();

if (inputSenha === ''){

$(".error").text('Digite a sua senha para salvar seus dados')
}

     else if (inputSenha === userData.split(",")[3] ){
$("#submit").attr("disabled", true)
            $.ajax({
                url: './php/change_user_data.php',
                type: 'POST',
                data: formData,
                success: function () {
                    myDropzone.processQueue();

if (myDropzone.files.length === 0) {
            location.reload()
        }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
$(".error").text('Senha incorreta')
}
    });

    let myDropzone = new Dropzone("div#fileUploader", {
        url: "./php/upload_user_photo.php",
        paramName: 'files',
        uploadMultiple: true,
        addRemoveLinks: true,
        autoProcessQueue: false,
        acceptedFiles: ".jpeg, .jpg, .png", // Allowed extensions
        dictDefaultMessage: "Selecionar arquivos...",
        dictCancelUpload: "",
        dictRemoveFile: "",
        parallelUploads: 100,
        maxFiles: 1,
        init: function () {
            var myDropzone = this;

            this.on('sending', function (file, xhr, formData) {
                formData.append('id', userData.split(",")[0]);
            });

            this.on('success', function () {
                location.reload();
            })
            // Called when a file is added to the queue
            // Receives `file`
            this.on("addedfile", file => {
                if (myDropzone.files.length >= 0) {
                    $("#imageUpload").css("visibility", "hidden");
                    $("#userPhoto").css("visibility", "hidden");
                    $(".imageText").text("Alterar Foto")
                }
                /* if (myDropzone.files.length > 3) {
                    $("#fileUploader").find(".dz-button").text((myDropzone.files.length - 1) + " arquivos selecionados");
                }
                else {
                    $("#fileUploader").find(".dz-button").text(myDropzone.files.length + " arquivos selecionados");
                } 
                $(".msg-aviso").addClass("hide-msg");
                $(".dz-default").css("border", "");
                */
                // Inicio configuração de botão para remover arquivo
                if (this.options.addRemoveLinks) {
                    file._removeLink = Dropzone.createElement(
                        `<i class="fa-solid fa-xmark x-mark" href="javascript:undefined;" data-dz-remove></i>`
                    );
                    file.previewElement.appendChild(file._removeLink);
                }
                let removeFileEvent = (e) => {
                    $("#fileUploader").find(".dz-button").text((myDropzone.files.length - 1) + " arquivos selecionados");
                    if ((myDropzone.files.length - 1) === 0) {
                        warning = 0;
                        $("#fileUploader").find(".dz-button").text("Selecionar arquivos...");
                        $("#imageUpload").css("visibility", "visible");
                        $("#userPhoto").css("visibility", "visible");
                        $(".imageText").text("Adicionar Foto")
                    }
                    //$.ajax({
                    //    url: "./php/deleteFiles.php",
                    //    type: 'POST',
                    //    data: { nome: file.name, id: journey_id, step: "step-3", acao: "single" },
                    //});
                    //console.log(file.name);
                    e.preventDefault();
                    e.stopPropagation();
                    if (file.status === Dropzone.UPLOADING) {
                        return Dropzone.confirm(
                            this.options.dictCancelUploadConfirmation,
                            () => this.removeFile(file)
                        );
                    } else {
                        if (this.options.dictRemoveFileConfirmation) {
                            return Dropzone.confirm(
                                this.options.dictRemoveFileConfirmation,
                                () => this.removeFile(file)
                            );
                        } else {
                            return this.removeFile(file);
                        }
                    }
                };
                for (let removeLink of file.previewElement.querySelectorAll("[data-dz-remove]")) {
                    removeLink.addEventListener("click", removeFileEvent);
                }
                // Fim configuração de botão para remover arquivo
            });
            this.on("error", function (file) {
                this.removeFile(file);
            });
        },
    });

</script>

</html>