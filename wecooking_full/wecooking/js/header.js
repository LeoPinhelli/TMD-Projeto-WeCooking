$(".content").before('<div class="header"></div>')

$(".header").append('<div class="center"></div>')
$(".header").append('<div class="back_perfil" id="menu_perfil">   <i class="fa-solid fa-user"></i>   </div>')
$(".header").append('<div class="menu_perfil" id="perfil"></div>')

$(".center").append('<a href="https://wecooking.online"><img src="https://wecooking.online/assets/logo.png" class="logo"></a>')
$(".center").append('<label class="text"><a href="https://wecooking.online"><span>Início</span></a></label>')
$(".center").append('<label class="text"><a href="https://wecooking.online/filter.php"><span>Receitas</span></a></label>')
$(".center").append('<label class="text"><a href="https://wecooking.online/receita_layout.php#user"><span>Enviar sua receita</span></a></label>')
$(".center").append('<div class="search-input"><form id="form-search"><input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar receita"><i id="search-btn" class="fa-solid fa-magnifying-glass"></i></form></div>')

$(".menu_perfil").append('<ul id="menu-list"></ul>')

$("#menu-list").append('<li><a href="https://wecooking.online/favorites.php"><i class="fa-solid fa-heart"></i><span>Receitas favoritas</span></a></li>   <li><a href="https://wecooking.online/alterar_dados.php"><i class="fa-solid fa-pen"></i><span>Alterar dados</span></a></li>  ')

$("#search-btn").on('click', function(){
    let searchVal = $("#pesquisa").val();
    
    window.location.href = "https://wecooking.online/filter.php#" + searchVal

    /* $.ajax({
        url: 'https://wecooking.online/php/searching.php',
        type: 'POST',
        data: { searchValue: searchVal },
        success: function (response) {
            $(".receipt").empty()
            $(".receipt").append(response)
        },
        cache: false
    }); */
})

$("form#form-search").submit(function(e){
    e.preventDefault();

    let searchVal = $("#pesquisa").val();
    
    window.location.href = "https://wecooking.online/filter.php#" + searchVal

    /*
    $.ajax({
        url: 'https://wecooking.online/php/searching.php',
        type: 'POST',
        data: { searchValue: searchVal },
        success: function (response) {
            $(".receipt").empty()
            $(".receipt").append(response)
        },
        cache: false
    }); */
})