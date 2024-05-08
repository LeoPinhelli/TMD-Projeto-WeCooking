
<html lang="pt">
	<head>
		<link rel="stylesheet" href="../../styles/internal.css">
		<link rel="stylesheet" href="../../styles/receipt.css">
		<link rel="stylesheet" href="../../styles/footer.css">
		<title>trevis</title>
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
					<div class="add-photo">,blz.jpeg,trovoso.png,disgraca.png</div>
					<i class="fa-solid fa-chevron-right"></i>
				</div>
				<div class="receipt-info">
					<div class="title">trevis</div>
					<div class="tempo">Tempo de preparo: 0 minutos</div>
					<div class="dificuldade">Dificuldade:  </div>
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
				<div class="title">Ingredientes:</div>
				<div id="ingrs">
					<div class="ingrs">,a,a,a</div>
					<div class="ingrs-cover">,chocolate,,</div>
					<div class="ingrs-fill">,morango,,</div>
				</div>
			</div>
			<div class="modo-de-preparo">
				<div class="title-preparo">Modo de preparo:</div>
				<div id="preparos">
					<div class="preparo">/fazer a massa/é isso/t</div>
					<div class="preparo-cover">/derreter o chocolate//</div>
					<div class="preparo-fill">/bater//</div>
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

			for (let i = 1; i < (num_ingrs - 1); i++) {
				$(".ingrs").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
			}

			if ($(".ingrs-cover").text()) {
				let ingredientes = $(".ingrs-cover").text();
				let ingrs = ingredientes.split(",");
				let num_ingrs = ingrs.length;
				$(".ingrs-cover").empty();

				$(".ingrs-cover").append("<span><b>Cobertura</b></span>")

				for (let i = 1; i < (num_ingrs - 1); i++) {
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

				for (let i = 1; i < (num_ingrs - 1); i++) {
					$(".ingrs-fill").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
				}
			} else {
				$(".ingrs-fill").remove()
			}
	
			$(".title-ingrs").text("Ingredientes (" + (($(".ingrs").children().length - 1) + ($(".ingrs-cover").children().length - 1) + ($(".ingrs-fill").children().length - 1)) + "):")

			//------------------------------------------------

			let preparo = $(".preparo").text();
			let passos = preparo.split("/"); console.log(passos);
			let num_passos = passos.length;
			$(".preparo").empty();
			$(".preparo").append("<span><b>Massa</b></span>")

			for (let i = 1; i < (num_passos - 1); i++) {
				$(".preparo").append("<div><p>" + i + "</p><span>" + passos[i] + "</span></div>")
			}

			if ($(".preparo-cover").text()) {
				let preparo = $(".preparo-cover").text();
				let passos = preparo.split("/"); console.log(passos);
				let num_passos = passos.length;
				$(".preparo-cover").empty();
				$(".preparo-cover").append("<span><b>Cobertura</b></span>")

				for (let i = 1; i < (num_passos - 1); i++) {
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

				for (let i = 1; i < (num_passos - 1); i++) {
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
		