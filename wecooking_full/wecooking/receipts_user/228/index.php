
<html lang="pt">
	<head>
		<link rel="stylesheet" href="../../styles/internal.css">
		<link rel="stylesheet" href="../../styles/receipt.css">
		<link rel="stylesheet" href="../../styles/footer.css">
		<title>Bolo de limão(user)</title>
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
					<div class="add-photo" style="flex-direction: row; gap: 1.2vw">,BOLOlimao2.jpeg,BOLOlimao1.jpg</div>
				</div>
				<div class="receipt-info" style="height: 22vh;">
					<div class="title">Bolo de limão(user)</div>
					<div class="tempo">Tempo de preparo: 40 minutos</div>
					<div class="dificuldade">Dificuldade: médio </div>
				</div>
			</div>
			<div style="display: flex; flex-direction: row; width: 100%; gap: 8vw">
				<div class="ingredientes" style="margin-top: 10vh">
					<div class="title-ingrs">Ingredientes:</div>
					<div id="ingrs">
						<div class="ingrs">Massa:,4,ovos,1/2,copo,de,óleo,2,copos,de,açúcar,,não,muito,cheios,1,copo,de,leite,1,caixa,de,gelatina,de,limão,2,xícaras,de,farinha,de,trigo,1,colher,de,sopa,de,Fermento,em,pó,Cobertura:,1,lata,de,leite,condensado,Suco,de,3,limões</div>
					</div>
				</div>
				<div class="modo-de-preparo" style="margin-top: 10vh">
					<div class="title-preparo">Modo de preparo:</div>
					<div id="preparos">
						<div class="preparo">Massa:,Bata,no,liquidificador,os,ovos,inteiros,,o,óleo,e,o,açúcar,(bem,batidos).,Coloque,a,gelatina,e,continue,batendo,até,dissolver.,Despeje,em,uma,tigela,e,acrescente,a,farinha,e,o,fermento,em,pó,,mexendo,sempre,,colocando,o,leite.,Coloque,em,assadeira,untada,e,polvilhada,com,farinha.,Depois,de,assado,e,ainda,quente,,fure,com,o,garfo.,Cobertura:,Bata,no,liquidificador,ou,na,mão,o,leite,condensado,com,suco,de,3,limões,até,formar,uma,cobertura,homogênea.,Cubra,o,bolo,quando,o,mesmo,estiver,frio.</div>
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
		