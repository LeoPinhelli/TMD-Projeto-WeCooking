<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/gerenciador.css">
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <title>WeCooking | Gerenciador de Receitas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<style>
    thead tr th:nth-child(2),
    tbody tr td:nth-child(2) {
        width: 20vw !important;
        text-align: start;
    }

    thead tr th:nth-child(3),
    tbody tr td:nth-child(3) {
        width: 20vw !important;
        text-align: start;
    }

    thead tr th:nth-child(4),
    tbody tr td:nth-child(4) {
        width: 8vw !important;
    }

    thead tr th:nth-child(5),
    tbody tr td:nth-child(5) {
        width: 3vw !important;
    }

    tbody tr td i {
        color: #000;
        font-size: 2.4vh;
    }

    tbody tr td i:hover {
        color: #F89540;
    }

    .title {
        font-size: 3vh;
        border-bottom: 0.1vh solid orange;
    }
</style>

<body>
    <div class="screen">
        <div class="content" style="margin-top: 5vh">
            <div class="title">Receitas cadastradas</div>
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
    $('document').ready(function () {
        $.ajax({
            url: './php/get_all_receipts.php',
            type: 'POST',
            data: { page: 'gerenciador_receitas' },
            success: function (response) {
                $(".content").append(response)
                new DataTable('#tabela_receitas', {
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'Tudo']
                    ],
                    language: {
                        "lengthMenu": "Mostrar _MENU_ resultados",
                        "zeroRecords": "Nenhuma receita encontrada",
                        "search": "Pesquisar:",
                        "paginate": {
                            "next": "Próximo",
                            "previous": "Anterior"
                        },
                        "info": "Mostrando _END_ de _TOTAL_ resultados",
                        "infoEmpty": "Mostrando 0 de 0 resultados",
                        "infoFiltered": "(filtrado de _MAX_ resultados totais)",
                    }

                });
            },
            cache: false
        });
    })

    $("body").on('click', 'td', function (e) {
        let clickedId = e.currentTarget.id;
        if (clickedId) {
            let statusReceita = clickedId.split("_")[1]
            let receitaId = clickedId.split("_")[2]

            $.ajax({
                url: './php/change_receipt_status.php',
                type: 'POST',
                data: { status: statusReceita, id: receitaId },
                success: function (response) {
                    location.reload();
                },
                cache: false
            });
        } else { }

    })



    /* $('.boldCell').click(function (e) {
         let receitaId = e.currentTarget.id;
         console.log(receitaId);
 
         $.ajax({
             url: './php/change_receipt_status.php',
             type: 'POST',
             data: { status: '1' },
             success: function (response) {
                 location.reload();
             },
             cache: false
         });
     })*/
</script>

</html>