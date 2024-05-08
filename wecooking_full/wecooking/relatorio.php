<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="./styles/internal.css">
    <link rel="stylesheet" href="./styles/gerenciador.css">
    <link rel="stylesheet" href="./styles/header.css"> <!-- Header Styles  -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <title>WeCooking | Relatório</title>
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
        width: 20vw !important;
    }

    thead tr th:nth-child(5),
    tbody tr td:nth-child(5) {
        width: 20vw !important;
    }

    thead tr th:nth-child(6),
    tbody tr td:nth-child(6) {
        width: 3vw !important;
    }

    tbody tr td i {
        color: #000;
        font-size: 2.4vh;
    }

    tbody tr td i:hover {
        color: #F89540;
    }

    .dataTables_filter,
    .dataTables_length,
    .dataTables_info,
    .dataTables_paginate {
        transform: scale(0);
        position: absolute;
    }

    .title {
        font-size: 3vh;
        border-bottom: 0.1vh solid orange;
    }

    .sorting {
        cursor: pointer;
    }

    .sorting .fa-solid {
        margin-left: 1vw;
    }

    .content {
        margin-bottom: 10vh;
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
    let sql = '';

    $('document').ready(function () {
        if (window.location.hash) {
            let relatorio = window.location.hash.split('#')[1]

            if (relatorio.split(',')[0] === 'entries') {
                sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY receipt_entries'

                $.ajax({
                    url: "https://wecooking.online/php/get_relatorio_receipts.php",
                    type: "POST",
                    data: { consulta: sql, tipo: relatorio.split(',')[0] },
                    success: function (response) {
                        $(".content").append(response)

                        new DataTable('#tabela_receitas', {
                            lengthMenu: [
                                [-1],
                                ['Tudo']
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

                        ordenar();
                    },
                    cache: false,
                });

                

                
            }

            /* else if (relatorio.split(',')[0] === 'favorites') {
                if (relatorio.split(',')[1] === '10') {
                    if (relatorio.split(',')[2] === 'desc') {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) DESC LIMIT 10'

                        $(".title").text('10 receitas mais favoritadas')
                    }
                    else {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) LIMIT 10'

                        $(".title").text('10 receitas menos favoritadas')
                    }
                }
                else if (relatorio.split(',')[1] === '25') {
                    if (relatorio.split(',')[2] === 'desc') {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) DESC LIMIT 25'

                        $(".title").text('25 receitas mais favoritadas')
                    }
                    else {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) LIMIT 25'

                        $(".title").text('25 receitas menos favoritadas')
                    }
                }
                else if (relatorio.split(',')[1] === '50') {
                    if (relatorio.split(',')[2] === 'desc') {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) DESC LIMIT 50'

                        $(".title").text('50 receitas mais favoritadas')
                    }
                    else {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) LIMIT 50'

                        $(".title").text('50 receitas menos favoritadas')
                    }
                }
                else if (relatorio.split(',')[1] === 'all') {
                    if (relatorio.split(',')[2] === 'desc') {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id) DESC'

                        $(".title").text('Receitas mais favoritadas')
                    }
                    else {
                        sql = 'SELECT * FROM receipts WHERE receipt_status = 1 ORDER BY (SELECT COUNT(receipt_id) FROM favorites WHERE receipt_id = receipts.receipt_id)'

                        $(".title").text('Receitas menos favoritadas')
                    }
                }


                $.ajax({
                    url: "https://wecooking.online/php/get_relatorio_receipts.php",
                    type: "POST",
                    data: { consulta: sql, tipo: relatorio.split(',')[0] },
                    success: function (response) {
                        $(".table").append(response.split("</html>")[1])
                    },
                    cache: false,
                });
            } */
        }
        else {
            location.href = 'https://wecooking.online'
        }


        function ordenar() {
            $('.sorting').on('click', function () {
                $(".sorting").find('.fa-solid').toggleClass("fa-chevron-down")
                $(".sorting").find('.fa-solid').toggleClass("fa-chevron-up")
            })

            $(".title").text('Receitas por acessos (' + $("tbody").children().length + ')')
        }

    })
</script>

</html>