
<html lang="pt">
	<head>
		<link rel="stylesheet" href="../../styles/internal.css">
		<link rel="stylesheet" href="../../styles/receipt.css">
		<link rel="stylesheet" href="../../styles/receipt_card.css">
		<link rel="stylesheet" href="../../styles/footer.css">
		<title>Torta de Morango</title>
		<link rel="stylesheet" href="../../styles/header.css"> <!-- CSS Header -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	</head>
	<body>
		<div class="screen">
		<div class="content" style="margin-top: 5vh">
			<div class="inicio">
				<div class="images">
					<i class="fa-solid fa-chevron-left"></i>
					<div class="add-photo">,torta.png,torta1.png</div>
					<i class="fa-solid fa-chevron-right"></i>
				</div>
				<div class="receipt-info">
					<div class="title">Torta de Morango</div>
					<div class="tempo">Tempo de preparo: 60 minutos</div>
					<div class="dificuldade">Dificuldade: médio </div>
					<div class="favorite"><i class="fa-regular fa-heart" id="fav"></i>Favoritar</div>
					<div class="avaliacao">
						<i class="fa-regular fa-star" id="1"></i>
						<i class="fa-regular fa-star" id="2"></i>
						<i class="fa-regular fa-star" id="3"></i>
						<i class="fa-regular fa-star" id="4"></i>
						<i class="fa-regular fa-star" id="5"></i>
						<span class="aval" id="nota">0/5</span>
					</div>
					<span class="aval" id="avals">0 avaliações</span>
				</div>
			</div>
			<div class="ingredientes">
				<div class="title-ingrs">Ingredientes:</div>
				<div id="ingrs">
					<div class="ingrs">,2 colheres (sopa) de margarina,2 colheres (sopa) de óleo,1 ovo inteiro,2 colheres rasas (sopa) de açúcar,1 pitada de sal,1 colher rasa (sopa) de fermento em pó,farinha de trigo até a massa desgrudar da mão</div>
					<div class="ingrs-cover"></div>
					<div class="ingrs-fill">,1 lata de leite condensado,1 lata de creme de leite,3 gemas,3 copos de leite,1 colher (sopa) de maisena,2 caixinhas de morangos,1 gelatina de morango</div>
				</div>
			</div>
			<div class="modo-de-preparo">
				<div class="title-preparo">Modo de preparo:</div>
				<div id="preparos">
					<div class="preparo">/Misture todos os ingredientes, e quando ela estiver no ponto, forre um pirex de médio a grande (os mais fundos são melhores)./Fure a massa com um garfo e asse em fogo médio entre 10 a 15 minutos. /Quando dourar, está pronta (a massa fica fina, então cuidado para não deixar queimar). /Disponha a massa assada em um pirex e deixe esfriar um pouco. /Adicione o creme e, sobre ele, os morangos cortados na transversal. /Em seguida, adicione a gelatina já em ponto de clara (pois assim ela ficará na superfície). /Leve à geladeira por no mínimo 4 horas.</div>
					<div class="preparo-cover"></div>
					<div class="preparo-fill">/Misture todos os ingredientes e mexa até levantar fervura. /Quando você perceber que ele está bem cremoso, mexa bastante sem parar (cuidado para não deixar empelotar ou grudar no fundo da panela)./Na hora do uso, ele deve estar já frio ou levemente morno. </div>
				</div>
			</div>
			<div class="comments">
				<div class="env-comment">
					<textarea class="doComm" placeholder="Digite aqui seu comentário (Máximo 255 caracteres)"
						maxlength="255" id="text-comment"></textarea>
					<button class="btn" id="send-comment">Enviar comentário</button>
				</div>
			</div>
		</div>
		<button id="scroll_btn">
			<i class="fa-solid fa-arrow-up"></i>
		</button>
		</div>
	</body>
	<script type="text/javascript" src="../../js/header.js">// Header</script>
	<script type="text/javascript" src="../../js/footer.js">// Footer</script>
	<script type="text/javascript" src="../../js/menu_perfil.js">// Menu</script>  
	<script type="text/javascript" src="../../js/verify_session.js">// Verifica o cookie</script>
	<script type="text/javascript" src="../../js/logout.js">// Botão de Logout</script> 
	<script type="text/javascript" src="../../js/get_rating.js">// Avaliações</script>
	<script type="text/javascript" src="../../js/get_favorite.js">// Favorito</script>
	<script type="text/javascript" src="../../js/comments.js"></script>
	<script type="text/javascript" src="../../js/similar.js"></script>
	<script>
		let usuario = "";

		$("document").ready(function(){
			const cookies = document.cookie.split(" ");
			const cookieUser = cookies.find((element) => element.includes("User"));
			
			if (cookieUser) {
				var email = cookieUser.split("=")[1];
			}
	
			let receita = location.href.split("/")[4]

			//-------------------------------------------------

			// Scroll
			$(window).scroll(function () {
				if ($(window).scrollTop() > 200) {
					$("#scroll_btn").css("visibility", "visible")
				} else {
					$("#scroll_btn").css("visibility", "")
				}
			});
	
			$("#scroll_btn").on("click", function (e) {
				e.preventDefault();
				$("html, body").animate({ scrollTop: 0 }, "300");
			});
	

			//-------------------------------------------------

			$.ajax({
				url: "https://wecooking.online/php/verify_receipt_status.php",
				type: "POST",
				data: { receitaId: receita },
				success: function (response) {
					let result = response.split("</html>")[1];
	
					if (result === "0") {
						$.ajax({
							url: "https://wecooking.online/php/verify_admin.php", // Verifica se o usuário é admin
							type: "POST",
							data: { email: email },
							success: function (response) {
								let result = response.split("</html>")[1];
	
								if (result === "1") {
								} else {
									window.location = "https://wecooking.online/index.php";
								}
							},
							cache: false
						});
					}
				},
				cache: false,
			})

			//------------------------------------------------

			let ingredientes = $(".ingrs").text();
			let ingrs = ingredientes.split(",");
			let num_ingrs = ingrs.length;
			$(".ingrs").empty();
			$(".ingrs").append("<span><b>Massa</b></span>")

			for (let i = 1; i < num_ingrs; i++) {
				$(".ingrs").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
			}

			if ($(".ingrs-cover").text()) {
				let ingredientes = $(".ingrs-cover").text();
				let ingrs = ingredientes.split(",");
				let num_ingrs = ingrs.length;
				$(".ingrs-cover").empty();

				$(".ingrs-cover").append("<span><b>Cobertura</b></span>")

				for (let i = 1; i < num_ingrs; i++) {
					$(".ingrs-cover").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
				}
			} else {
				$(".ingrs-cover").remove()
			}

			if ($(".ingrs-fill").text()) {
				let ingredientes = $(".ingrs-fill").text();
				let ingrs = ingredientes.split(",");
				let num_ingrs = ingrs.length;
				$(".ingrs-fill").empty();

				$(".ingrs-fill").append("<span><b>Recheio</b></span>")

				for (let i = 1; i < num_ingrs; i++) {
					$(".ingrs-fill").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
				}
			} else {
				$(".ingrs-fill").remove()
			}
	
			$(".title-ingrs").text("Ingredientes (" + ($("#ingrs").find("div").length - $("#ingrs").children().length) + "):")

			//------------------------------------------------

			let preparo = $(".preparo").text();
			let passos = preparo.split("/"); console.log(passos);
			let num_passos = passos.length;
			$(".preparo").empty();
			$(".preparo").append("<span><b>Massa</b></span>")

			for (let i = 1; i < num_passos; i++) {
				$(".preparo").append("<div><p>" + i + "</p><span>" + passos[i] + "</span></div>")
			}

			if ($(".preparo-cover").text()) {
				let preparo = $(".preparo-cover").text();
				let passos = preparo.split("/"); console.log(passos);
				let num_passos = passos.length;
				$(".preparo-cover").empty();
				$(".preparo-cover").append("<span><b>Cobertura</b></span>")

				for (let i = 1; i < num_passos; i++) {
					$(".preparo-cover").append("<div><p>" + i + "</p><span>" + passos[i] + "</span></div>")
				}
			} else {
				$(".preparo-cover").remove()
			}

			if ($(".preparo-fill").text()) {
				let preparo = $(".preparo-fill").text();
				let passos = preparo.split("/"); console.log(passos);
				let num_passos = passos.length;
				$(".preparo-fill").empty();
				$(".preparo-fill").append("<span><b>Recheio</b></span>")

				for (let i = 1; i < num_passos; i++) {
					$(".preparo-fill").append("<div><p>" + i + "</p><span>" + passos[i] + "</span></div>")
				}
			} else {
				$(".preparo-fill").remove()
			}

			//------------------------------------------------

			let images = $(".add-photo").text();
			let imgs = images.split(",");
			let num_imgs = imgs.length;
			$(".add-photo").empty();

			for (let im = 1; im < num_imgs; im++) {
				$(".add-photo").append("<img src=" + imgs[im] + " alt=" + imgs[im] +  " id=img" + im + ">")
			}

			//-------------------------------------------------

			const imgNum = $(".add-photo").children().length;

			if (imgNum === 1) {
				$(".fa-chevron-left").css({ "opacity": "0", "cursor": "auto" })
				$(".fa-chevron-right").css({ "opacity": "0", "cursor": "auto" })

			} else if (imgNum === 2) {
				let imgSelec = 1;

				$("#img2").addClass("hideImageRight")
				$(".fa-chevron-left").css({ "opacity": "0", "cursor": "auto" })

				$(".fa-chevron-left").on("click", function () {
					if (imgSelec === 2) {
						$("#img1").removeClass("hideImageLeft")
						$("#img2").addClass("hideImageRight")

						$(".fa-chevron-left").css({ "opacity": "0", "cursor": "auto" })
						$(".fa-chevron-right").css({ "opacity": "1", "cursor": "pointer" })

						imgSelec = 1;
					}
				})

				$(".fa-chevron-right").on("click", function () {
					if (imgSelec === 1) {
						$("#img2").removeClass("hideImageRight")
						$("#img1").addClass("hideImageLeft")

						$(".fa-chevron-right").css({ "opacity": "0", "cursor": "auto" })
						$(".fa-chevron-left").css({ "opacity": "1", "cursor": "pointer" })

						imgSelec = 2;
					}
				})

			} else if (imgNum === 3) {
				let imgSelec = 1;

				$("#img2").addClass("hideImageRight")
				$("#img3").addClass("hideImageRight")
				$(".fa-chevron-left").css({ "opacity": "0", "cursor": "auto" })

				$(".fa-chevron-left").on("click", function () {
					if (imgSelec === 2) {
						$("#img1").removeClass("hideImageLeft")
						$("#img2").addClass("hideImageRight")

						$(".fa-chevron-left").css({ "opacity": "0", "cursor": "auto" })
						$(".fa-chevron-right").css({ "opacity": "1", "cursor": "pointer" })

						imgSelec = 1;

					} else if (imgSelec === 3) {
						$("#img2").removeClass("hideImageLeft")
						$("#img3").addClass("hideImageRight")

						$(".fa-chevron-right").css({ "opacity": "1", "cursor": "pointer" })

						imgSelec = 2;
					}
				})

				$(".fa-chevron-right").on("click", function () {
					if (imgSelec === 1) {
						$("#img2").removeClass("hideImageRight")
						$("#img1").addClass("hideImageLeft")

						$(".fa-chevron-left").css({ "opacity": "1", "cursor": "pointer" })

						imgSelec = 2;

					} else if (imgSelec === 2) {
						$("#img3").removeClass("hideImageRight")
						$("#img2").addClass("hideImageLeft")

						$(".fa-chevron-right").css({ "opacity": "0", "cursor": "auto" })

						imgSelec = 3;
					}
				})
			}

			//-------------------------------------------------

			$.ajax({
				url: "https://wecooking.online/php/acesso.php",
				type: "POST",
				data: { receitaId: receita },
				cache: false,
			});

		})
	</script>
</html>
		