<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../styles/header.css"> <!-- CSS Header -->
    <link rel="stylesheet" href="../styles/internal.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/search.css">
    <link rel="stylesheet" href="../styles/receipt_card.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>WeCooking | Pesquisa</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<style>
    p {
        margin: 0;
        padding: 0;
        z-index: 10;
        width: fit-content;
        font-weight: 600;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    .ui-slider {
        border: 0.1vh solid #c1c1c1 !important;
    }

    .ui-slider span {
        background-color: orange !important;
        border-radius: 4vh !important;
        border: none !important;
        outline: none;
    }

    .categorias,
    .ingredientes,
    .avaliacoes {
        margin-top: 3vh;
        display: flex;
        flex-direction: column;

        .inputTag {
            position: absolute;
            visibility: hidden;
        }

        .tag {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0.5vw;
            user-select: none;

            .check {
                height: 1.5vh;
                width: 1.5vh;
                border: 0.1vh solid #000;
                cursor: pointer;
            }

            .checked {
                background-color: #F78C2F;
            }
        }
    }

    .avaliacoes {
        gap: 1vh;
    }

    .avaliacoes .fa-star {
        color: #F78C2F;
    }

    .avalFav {
        position: absolute;
        visibility: hidden;
    }

    .receita {
        transition: 0.6s;
    }

    .receita:hover {
        transform: scale(1.1);
    }

    .filter {
        width: 96% !important;
    }

    .select-order {
        padding-right: 2vw !important;
    }
</style>

<body>
    <div class="screen">
        <div class="content">
            <div class="filter">
                <span id='searching'>Pesquisando por: </span>
                <div class="filter-by">Ordenar por:</div>
                <select name="filters" id="filters" class="select-order">
                    <option value="">(Sem filtro)</option>
                    <option value="recent">Mais recentes</option>
                    <option value="visited">Mais visitadas</option>
                </select>
            </div>
            <div class="row">
                <div class="filters">
                    <div class="preparo">
                        <label for="amount">Tempo de preparo:</label>
                        <span id="amount"></span>
                    </div>
                    <div id="slider-range"></div>
                    <!-- <button class="search">Aplicar</button> -->
                    <div class='categorias'>
                        <span>Categorias:</span>
                        <span class="bolo">
                            <input type="checkbox" value="bolo" class="inputTag" id="bolo">
                            <label class="tag" for="bolo">
                                <div class="check"></div>
                                <span>Bolo</span>
                            </label>
                        </span>
                        <span class="torta">
                            <input type="checkbox" value="torta" class="inputTag" id="torta">
                            <label class="tag" for="torta">
                                <div class="check"></div>
                                <span>Torta</span>
                            </label>
                        </span>
                    </div>
                    <div class='ingredientes'>
                        <span>Ingredientes:</span>
                        <span class="morango">
                            <input type="checkbox" value="morango" class="inputTag" id="morango">
                            <label class="tag" for="morango">
                                <div class="check"></div>
                                <span>Morango</span>
                            </label>
                        </span>
                        <span class="chocolate">
                            <input type="checkbox" value="chocolate" class="inputTag" id="chocolate">
                            <label class="tag" for="chocolate">
                                <div class="check"></div>
                                <span>Chocolate</span>
                            </label>
                        </span>
                        <span class="laranja">
                            <input type="checkbox" value="laranja" class="inputTag" id="laranja">
                            <label class="tag" for="laranja">
                                <div class="check"></div>
                                <span>Laranja</span>
                            </label>
                        </span>
                        <span class="cenoura">
                            <input type="checkbox" value="cenoura" class="inputTag" id="cenoura">
                            <label class="tag" for="cenoura">
                                <div class="check"></div>
                                <span>Cenoura</span>
                            </label>
                        </span>
                        <span class="limao">
                            <input type="checkbox" value="limao" class="inputTag" id="limao">
                            <label class="tag" for="limao">
                                <div class="check"></div>
                                <span>Limão</span>
                            </label>
                        </span>
                        <span class="milho">
                            <input type="checkbox" value="milho" class="inputTag" id="milho">
                            <label class="tag" for="milho">
                                <div class="check"></div>
                                <span>Milho</span>
                            </label>
                        </span>
                        <span class="maca">
                            <input type="checkbox" value="maca" class="inputTag" id="maca">
                            <label class="tag" for="maca">
                                <div class="check"></div>
                                <span>Maçã</span>
                            </label>
                        </span>
                    </div>
                    <div class="avaliacoes">
                        <span>Avaliações:</span>
                        <span class="5stars">
                            <input type="checkbox" value="5stars" class="inputTag" id="5stars">
                            <label class="tag" for="5stars">
                                <div class="check"></div>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                            </label>
                        </span>
                        <span class="4stars">
                            <input type="checkbox" value="4stars" class="inputTag" id="4stars">
                            <label class="tag" for="4stars">
                                <div class="check"></div>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                            </label>
                        </span>
                        <span class="3stars">
                            <input type="checkbox" value="3stars" class="inputTag" id="3stars">
                            <label class="tag" for="3stars">
                                <div class="check"></div>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                            </label>
                        </span>
                        <span class="2stars">
                            <input type="checkbox" value="2stars" class="inputTag" id="2stars">
                            <label class="tag" for="2stars">
                                <div class="check"></div>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                            </label>
                        </span>
                        <span class="1stars">
                            <input type="checkbox" value="1stars" class="inputTag" id="1stars">
                            <label class="tag" for="1stars">
                                <div class="check"></div>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                                <i class='fa-regular fa-star'></i>
                            </label>
                        </span>
                    </div>
                </div>
                <div class="main">
                    <div class="receipt-search">
                    </div>
                </div>
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
    let arrFilters = [];
    let searchText = '';
    let arrStars = ['5stars', '4stars', '3stars', '2stars', '1stars'];

    $('document').ready(function () {
        const cookies = document.cookie.split(" ");
        const cookieUser = cookies.find((element) => element.includes("User"));

        function getFavorites() {
            if (cookieUser) {
                var email = cookieUser.split("=")[1];

                $.ajax({
                    url: "https://wecooking.online/php/get_user_id.php",
                    type: "POST",
                    data: { userEmail: email },
                    success: function (response) {
                        usuario = response.split("</html>")[1];

                        $.ajax({
                            url: "https://wecooking.online/php/verify_all_favorites.php",
                            type: "POST",
                            data: { userId: usuario },
                            success: function (response) {
                                let result = response.split("</html>")[1];

                                let recArr = result.split("<br>")
                                console.log(recArr)

                                for (let x = 0; x < recArr.length; x++) {
                                    $('[id="fav' + recArr[x] + '"]').removeClass("fa-regular")
                                    $('[id="fav' + recArr[x] + '"]').addClass("fa-solid")
                                }
                            },
                            cache: false,
                        });
                    },
                    cache: false,
                });
            }
        }

        // --------------------------------------------------------- //

        function ifEmpty() {
            if ($('.receipt-search').children().length < 3) {
                if ($('.receipt-search').children().length === 2) {
                    $(".receipt-search").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                } else if ($('.receipt-search').children().length === 1) {
                    $(".receipt-search").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                }
            }
        }



        /* ----------------setInterval (function(){
            console.log(arrFilters)
        }, 900)----------------------------------------- //

        // --------------------------------------------------------- //
        // ---------------     Favoritar receita    ---------------- //
        // --------------------------------------------------------- */
        function favoriteHover() {
            let recLink = '';
            let link = '';

            $(".receipt-search a").on('mouseenter', function (e) {
                recLink = $(".receipt-search").find(e.currentTarget)
                link = recLink.attr("href")
                $(".receipt-search #rec" + link.split('/')[2] + "").find('.fa-heart').css("opacity", '1')
            })

            $(".receipt-search .fa-heart").on('mouseenter', function (e) {
                $(".receipt-search").find(recLink).attr('href', 'javascript:void(0)')
            })

            $(".receipt-search .fa-heart").on('mouseleave', function () {
                $(".receipt-search").find(recLink).attr('href', link)
            })

            $(".receipt-search .fa-heart").on('click', function () {
                if (cookieUser) {
                    $.ajax({
                        url: "https://wecooking.online/php/favoritar.php",
                        type: "POST",
                        data: { userId: usuario, receitaId: link.split('/')[2] },
                        success: function () {
                            location.reload();
                        },
                        cache: false,
                    });
                } else {
                    $(".screen").append("<div class='modal-warning'></div>")

                    $(".modal-warning").append("<div class='modal-message'></div>")

                    $(".modal-message").append("<span class='modal-title'>Gostou dessa receita?</span>")
                    $(".modal-message").append("<span>Faça o login para salva-lá em seus favoritos.</span>")
                    $(".modal-message").append("<div class='modal-links'></div>")

                    $(".modal-links").append("<a href='https://wecooking.online/login.php'>Fazer login</a>")
                    $(".modal-links").append("<span id='modalNo'>Não, obrigado</span>")

                    $("#modalNo").on("click", function () {
                        $(".modal-warning").remove();
                    })
                }
            })
        }
        // --------------------------------------------------------- //
        // --------------------------------------------------------- //
        // --------------------------------------------------------- //

        let allTags = [];
        let nAllTags = $(":input[type=checkbox]").length

        for (let tagN = 0; tagN < nAllTags; tagN++) {
            let thisTag = $(":input[type=checkbox]")[tagN]
            allTags.push(thisTag.id)
        }

        // --------------------------------- Se tiver um hash de pesquisa

        if (location.hash) {
            let searchVal = location.hash.split("#")[1]

            if (searchVal === 'recentes') {

                $(".select-order").val("recent")

                $.ajax({
                    url: './php/get_receipts.php',
                    type: 'POST',
                    data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1" ORDER BY receipt_date_added DESC' },
                    success: function (response) {
                        $(".receipt-search").empty()
                        $(".receipt-search").append(response)

                        $('.receipt-search').find("title").remove()

                        ifEmpty();
                        favoriteHover();
                        getFavorites();
                    },
                    cache: false
                });

            } else {

                if (searchVal.includes("%20")) {

                    searchText = searchVal.replace("%20", ' ')

                    for (let x = 0; x < searchVal.split("%20").length; x++) {

                        if (allTags.includes(searchVal.split("%20")[x]) === true) {
                            $('.' + searchVal.split("%20")[x]).find("div").addClass("checked")
                        }

                        searchText = searchText.replace("%20", ' ')
                    }

                    $("#searching").append('<span style="text-transform: capitalize">"' + searchText + '"</span>')

                } else {
                    $('.' + searchVal).find("div").addClass("checked")

                    $("#searching").append('<span style="text-transform: capitalize">"' + searchVal + '"</span>')
                }

                $.ajax({
                    url: 'https://wecooking.online/php/searching.php',
                    type: 'POST',
                    data: { searchValue: searchVal },
                    success: function (response) {
                        $(".receipt-search").empty()
                        $(".receipt-search").append(response)

                        $('.receipt-search').find("title").remove()

                        ifEmpty();
                        favoriteHover();
                        getFavorites();
                    },
                    cache: false
                });

            }

        } else {
            $.ajax({
                url: './php/get_receipts.php',
                type: 'POST',
                data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1"' },
                success: function (response) {
                    $(".receipt-search").empty()
                    $(".receipt-search").append(response)

                    $('.receipt-search').find("title").remove()

                    ifEmpty();
                    favoriteHover();
                    getFavorites();
                },
                cache: false
            });
        }

        window.onhashchange = function () {
            location.reload();
        }



        //-------------------------------------------- Tag clicada
        $(":input[type=checkbox]").on('click', function (e) {
            if (arrStars.includes(e.currentTarget.id)) { // Se a checkbox clicada for de avaliação

                if ($("." + e.currentTarget.id).find('div').hasClass("checked")) { // Se a checkbox já estiver clicada 
                    arrFilters = arrFilters.filter(function (x) { return x !== e.currentTarget.id })

                    $('.' + e.currentTarget.id).find("div").removeClass("checked")

                    $.ajax({
                        url: './php/get_receipts.php',
                        type: 'POST',
                        data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1"' },
                        success: function (response) {
                            $(".receipt-search").empty()
                            $(".receipt-search").append(response)

                            $('.receipt-search').find("title").remove()

                            ifEmpty();
                            favoriteHover();
                            getFavorites();
                        },
                        cache: false
                    });

                } else { // Se a checkbox não estiver clicada 
                    arrFilters.push(e.currentTarget.id)

                    $('.' + e.currentTarget.id).find("div").addClass("checked")

                    let numAvals = e.currentTarget.id

                    $.ajax({
                        url: './php/searching.php',
                        type: 'POST',
                        data: { consultaSql: "SELECT * FROM receipts WHERE receipt_status = '1'", avals: numAvals.split('s')[0] },
                        success: function (response) {
                            if (response.split("</html>")[1] === '0' || response.split("</html>")[1] === '') {
                                $(".receipt-search").empty()
                                $(".receipt-search").append('Nenhum resultado encontrado.')

                            } else {
                                $(".receipt-search").empty()
                                $(".receipt-search").append(response.split("</html>")[1])

                                $('.receipt-search').find("title").remove()

                                ifEmpty();
                            }

                            favoriteHover();
                            getFavorites();
                        },
                        cache: false
                    });
                }

            } else { // Se a checkbox clicada for de categoria ou ingrediente

                if ($("." + e.currentTarget.id).find('div').hasClass("checked")) { // Se a tag já estiver clicada 
                    arrFilters = arrFilters.filter(function (x) { return x !== e.currentTarget.id })

                    $('.' + e.currentTarget.id).find("div").removeClass("checked")

                    $("#searching").text("Pesquisando por:")
                    $.ajax({
                        url: './php/get_receipts.php',
                        type: 'POST',
                        data: { querySql: 'SELECT * FROM receipts WHERE receipt_status = "1"' },
                        success: function (response) {
                            $(".receipt-search").empty()
                            $(".receipt-search").append(response)

                            $('.receipt-search').find("title").remove()

                            ifEmpty();

                            favoriteHover();
                            getFavorites();
                        },
                        cache: false
                    });
                } else { // Se a tag não estiver clicada
                    arrFilters.push(e.currentTarget.id)

                    $('.' + e.currentTarget.id).find("div").addClass("checked")
                    let checkedInputs = $(".checked").length

                    if (checkedInputs === 1) {
                        $.ajax({
                            url: './php/searching.php',
                            type: 'POST',
                            data: { consultaSql: "SELECT * FROM receipts WHERE receipt_status = '1' AND receipt_tags LIKE $tag", tag: e.currentTarget.id },
                            success: function (response) {
                                if (response.split("</html>")[1] === '0') {
                                    $(".receipt-search").empty()
                                    $(".receipt-search").append('Nenhum resultado encontrado.')

                                    $('.receipt-search').find("title").remove()

                                } else {
                                    $(".receipt-search").empty()
                                    $(".receipt-search").append(response.split("</html>")[1])

                                    $('.receipt-search').find("title").remove()

                                    ifEmpty();
                                }

                                favoriteHover();
                                getFavorites();
                            },
                            cache: false
                        });
                    } else if (checkedInputs >= 2) {
                        let checkedCategTags = [];
                        let checkedIngrsTags = [];
                        $(".categorias .checked").each(function (index) {
                            checkedCategTags.push($(this).parent().attr("for"))
                        })
                        $(".ingredientes .checked").each(function (index) {
                            checkedIngrsTags.push($(this).parent().attr("for"))
                        })

                        $.ajax({
                            url: './php/searching.php',
                            type: 'POST',
                            data: { consultaSql: "SELECT * FROM receipts WHERE (receipt_tags LIKE $tag", tags: checkedInputs, ingrsTags: checkedIngrsTags, categTags: checkedCategTags },
                            success: function (response) {
                                if (response.split("</html>")[1] === '0') {
                                    $(".receipt-search").empty()
                                    $(".receipt-search").append('Nenhum resultado encontrado.')

                                    $('.receipt-search').find("title").remove()

                                } else {
                                    $(".receipt-search").empty()
                                    $(".receipt-search").append(response.split("</html>")[1])

                                    $('.receipt-search').find("title").remove()

                                    ifEmpty();
                                }

                                favoriteHover();
                                getFavorites();
                            },
                            cache: false
                        });
                    }
                }

            }
        })
        //---------------------------------------------- Ordenar Por:

        $("#filters").on('change', function (e) {
            arrFilters = arrFilters.filter(function (x) { return !x.includes('order') })

            if (e.currentTarget.value === '') {
                arrFilters = arrFilters.filter(function (x) { return !x.includes('order') })
            } else {
                arrFilters.push('order.' + e.currentTarget.value)
            }

            let consulta = ''
            let IDs = []
            let orderFilter = e.currentTarget.value

            if (orderFilter === 'recent') {
                consulta = 'SELECT * FROM receipts WHERE receipt_status = "1" ORDER BY receipt_date_added DESC'
            } else if (orderFilter === 'visited') {
                consulta = 'SELECT * FROM receipts WHERE receipt_status = "1" ORDER BY receipt_entries DESC'
            } else if (orderFilter === 'rated') {
                consulta = 'SELECT * FROM receipts WHERE receipt_status = "1"'
            } else if (orderFilter === 'favorited') {
                let showingReceipts = $('.receipt-search').find("a").length

                for (let i = 1; i <= showingReceipts; i++) {
                    let recInfo = $('.receipt-search a:nth-child(' + i + ')').attr("href")
                    let recFav = recInfo.split("/")[2]

                    if (recFav != undefined && recFav != null && recFav != '') {
                        let rID = IDs.push(recFav)
                    } else {
                        let rID = IDs.push('0')
                    }
                }

                consulta = 'select * from receipts where receipt_status = 1 order by (select count(receipt_id) from favorites where receipt_id = receipts.receipt_id) desc'
            } else if (orderFilter === '') {
                consulta = 'SELECT * FROM receipts WHERE receipt_status = "1"'
            }

            $.ajax({
                url: './php/get_receipts.php',
                type: 'POST',
                data: { querySql: consulta },
                success: function (response) {
                    $(".receipt-search").empty()
                    $(".receipt-search").append(response)

                    $('.receipt-search').find("title").remove()

                    ifEmpty();

                    favoriteHover();
                    getFavorites();
                },
                cache: false
            });
        })

        //----------------------------------------------- Slider tempo de preparo

        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 20,
                max: 120,
                values: [20, 120],
                slide: function (event, ui) {
                    $("#amount").text(ui.values[0] + "m - " + ui.values[1] + "m");
                },
                stop: function () {
                    $(".receipt-search").addClass("fade");

                    let minimumTime = $("#slider-range").slider("values", 0);
                    let maximumTime = $("#slider-range").slider("values", 1);

                    if (minimumTime === 20 && maximumTime === 120) {
                        arrFilters = arrFilters.filter(function (x) { return !x.includes('minTime') && !x.includes('maxTime') })
                    } else {
                        arrFilters = arrFilters.filter(function (x) { return !x.includes('minTime') && !x.includes('maxTime') })
                        arrFilters.push('minTime.' + minimumTime, 'maxTime.' + maximumTime)
                    }

                    $.ajax({
                        url: './php/filters.php',
                        type: 'POST',
                        data: { minTime: minimumTime, maxTime: maximumTime, consultaSql: 'SELECT * FROM receipts WHERE receipt_status = "1"' },
                        success: function (response) {
                            $(".receipt-search").removeClass("fade");

                            if (response.split("</html>")[1] === '0') {
                                $(".receipt-search").empty()
                                $(".receipt-search").append('Nenhum resultado encontrado.')

                                $('.receipt-search').find("title").remove()

                            } else {
                                $(".receipt-search").empty()
                                $(".receipt-search").append(response.split("</html>")[1])

                                $('.receipt-search').find("title").remove()

                                ifEmpty();
                            }

                            favoriteHover();
                            getFavorites();
                        },
                        cache: false
                    });
                }
            });
            $("#amount").text($("#slider-range").slider("values", 0) +
                "m - " + $("#slider-range").slider("values", 1) + "m");
        });

        // ----------------------------------------------------  ScrollUp Button
        $(window).scroll(function () {
            if ($(window).scrollTop() > 200) {
                $('#scroll_btn').css("visibility", "visible")
            } else {
                $('#scroll_btn').css("visibility", "")
            }
        });

        $('#scroll_btn').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });
    });

</script>

</html>