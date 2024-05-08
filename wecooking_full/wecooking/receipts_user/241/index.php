
<html lang="pt">
	<head>
		<link rel="stylesheet" href="../../styles/internal.css">
		<link rel="stylesheet" href="../../styles/receipt.css">
		<link rel="stylesheet" href="../../styles/footer.css">
		<title>Brownie(user)</title>
		<link rel="stylesheet" href="../../styles/header.css"> <!-- CSS Header -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	</head>
	<style>
		.dificuldade {
			text-transform: capitalize;
		}

		.images img {
			position: relative !important;
			height: 22vh !important;
			width: 15vw !important;
			object-fit: cover !important;
		}

		.add-photo div {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		.add-photo a {
			position: absolute;
			z-index: 10;
		}

		.add-photo i {
			color: #fff !important; 
			font-size: 5vh !important; 
		}

		.preparo {
			border: none !important;
		}

		.footer {
			margin-top: 20vh !important;
		}

		#download {
			padding: 1vh 2.5vw;
			border-radius: 2vh;
			border: none;
			outline: none;

			font-size: 1.8vh;
			text-transform: capitalize;
			color: #fff;
			font-weight: 700;
			font-family: "Poppins", sans-serif;
			text-align: center;

			background-color: #F78C2F;
			cursor: pointer;
			z-index: 2;
			margin-top: 2vh;

			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
	</style>
	<body>
		<div class="screen">
		<div class="content" style="margin-top: 5vh">
			<div class="inicio">
				<div class="images" style="flex-direction: column">
					<div class="add-photo" style="flex-direction: row; gap: 1.2vw">,imagem_2023-11-16_224718236.png</div>
				</div>
				<div class="receipt-info" style="height: 22vh;">
					<div class="title">Brownie(user)</div>
					<div class="tempo">Tempo de preparo: 40 minutos</div>
					<div class="dificuldade">Dificuldade: fácil </div>
				</div>
			</div>
			<div style="display: flex; flex-direction: row; width: 100%; gap: 8vw">
				<div class="ingredientes" style="margin-top: 10vh">
					<div class="title-ingrs">Ingredientes:</div>
					<div id="ingrs">
						<div class="ingrs">6 colheres (sopa) bem cheias, de margarina sem sal,3/4 xícara (chá) achocolatado,1/2 xícara (chá) chocolate em pó,1 e 1/4 xícara (chá) farinha de trigo,2 xícaras (chá) açúcar,4 ovos,2 pitadas de sal,1 colher (chá) de extrato ou essência de baunilha,1 tablete de chocolate meio amargo picado em cubinhos,1/2 xícara (chá) de nozes picadas ou castanhas de caju granuladas</div>
					</div>
				</div>
				<div class="modo-de-preparo" style="margin-top: 10vh">
					<div class="title-preparo">Modo de preparo:</div>
					<div id="preparos">
						<div class="preparo">Misture os ovos e o açúcar.,Em seguida, agregue todos os outros ingredientes até formar um creme uniforme. Despeje em uma assadeira, forrada com papel-manteiga e leve ao forno médio por 40 minutos.,O brownie estará pronto quando a parte de cima estiver levemente corada e, ao se espetar um palito, ele esteja levemente úmido (devido ao chocolate derretido).,Corte em quadrados ainda quente e sirva com uma bola de sorvete de creme, ou congele num saquinho para freezer.,Para descongelar, coloque o brownie num prato de sobremesa e aqueça no micro-ondas, potência alta, por 1 minuto.</div>
					</div>
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

			let titleText = $(".receipt-info .title").text().split("(")[0]
			$(".receipt-info .title").empty()
			$(".receipt-info .title").text(titleText)

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

			for (let i = 0; i < (num_ingrs); i++) {
				$(".ingrs").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
			}

			//------------------------------------------------

			let preparo = $(".preparo").text();
			let passos = preparo.split(",");
			let num_passos = passos.length;
			$(".preparo").empty();

			for (let i = 0; i < (num_passos); i++) {
				$(".preparo").append("<div><p>-</p><span>" + passos[i] + "</span></div>")
			}

			//------------------------------------------------

			let images = $(".add-photo").text();
			let imgs = images.split(",");
			let num_imgs = imgs.length;
			$(".add-photo").empty();

			for (let im = 1; im < num_imgs; im++) {
				$(".add-photo").append("<div><img src=" + imgs[im] + " alt=" + imgs[im] +  " id=img" + im + "><a href=" + imgs[im] + " download=" + "><i></i></a></div>")
				$(".add-photo div i").addClass("fa-solid fa-download")
			}

			//-------------------------------------------------

		})
	</script>
</html>
		