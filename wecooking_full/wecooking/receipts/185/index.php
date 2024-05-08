
<html lang="pt">
	<head>
		<link rel="stylesheet" href="../../styles/internal.css">
		<link rel="stylesheet" href="../../styles/receipt.css">
		<link rel="stylesheet" href="../../styles/footer.css">
		<title>Bolo de chocolate com surpresinha</title>
		<link rel="stylesheet" href="../../styles/header.css"> <!-- CSS Header -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://kit.fontawesome.com/2e6f1b8c97.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	</head>
	<body>
		<div class="screen">
		<div class="content" style="margin-top: 5vh">
			<div class="inicio">
				<div class="add-photo">,bolo(1).png,bolo.png,FyS2lCrWAAAgxm7.png</div>
				<div class="receipt-info">
					<div class="title">Bolo de chocolate com surpresinha</div>
					<div class="tempo">Tempo de preparo: 123 minutos</div>
					<div class="dificuldade">Dificuldade: médio </div>
					<div class="favorite"><i class="fa-regular fa-heart" id="fav"></i>Favoritar</div>
					<div class="avaliacao">
						<div class="popup_login">Deseja avaliar essa receita?<br>Realize o <a
								href="https://wecooking.online/login.php">login</a> primeiro.</div>
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
				<div id="ingrs">,bolo,chocolate,surpresinha</div>
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
	<script type="text/javascript" src="../../js/comments.js"></script>
	<script>
		let usuario = "";

		$("document").ready(function(){
			const cookies = document.cookie.split(" ");
			const cookieUser = cookies.find((element) => element.includes("User"));
			const email = cookieUser.split("=")[1];
	
			let receita = location.href.split("/")[4]

			//------------------------------------------------

			$.ajax({
				url: "https://wecooking.online/php/get_user_id.php",
				type: "POST",
				data: { userEmail: email },
				success: function (response) {
					usuario = response.split("</html>")[1];
	
					$.ajax({
						url: "https://wecooking.online/php/verify_favorite.php",
						type: "POST",
						data: { userId: usuario, receitaId: receita },
						success: function (response) {
							let result = response.split("</html>")[1];
	
							if (result === "1") {
								$("#fav").removeClass("fa-regular")
								$("#fav").addClass("fa-solid")
								$("#fav").addClass("clicked")
							} else {
							}
						},
						cache: false,
					});
				},
				cache: false,
			});

			//------------------------------------------------

			let ingredientes = $("#ingrs").text();
			let ingrs = ingredientes.split(",");
			let num_ingrs = ingrs.length;
			$("#ingrs").empty();

			for (let i = 1; i < num_ingrs; i++) {	
				$("#ingrs").append("<div><p>-</p><span>" + ingrs[i] + "</span></div>")
			}
			//------------------------------------------------

			let images = $(".add-photo").text();
			let imgs = images.split(",");
			let num_imgs = imgs.length;
			$(".add-photo").empty();

			for (let im = 1; im < num_imgs; im++) {
				$(".add-photo").append("<img src=" + imgs[im] + " alt=" + imgs[im] + ">")
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

			$("#fav").on("click", function () {
				$("#fav").toggleClass("fa-regular")
				$("#fav").toggleClass("fa-solid")
				$("#fav").toggleClass("clicked")
		
				$.ajax({
					url: "https://wecooking.online/php/favoritar.php",
					type: "POST",
					data: { favorito: "1", userId: usuario, receitaId: receita },
					cache: false,
				});
				
			})
		
			$("#fav").mouseover(function () {
				$("#fav").toggleClass("hover")
			})
		
			$("#fav").mouseout(function () {
				$("#fav").toggleClass("hover")
			})

			//-------------------------------------------------

			$("#send-comment").on("click", function () {
				let commentValue = document.getElementById("text-comment").value

				$.ajax({
					url: "https://wecooking.online/php/get_user_id.php",
					type: "POST",
					data: { userEmail: email },
					success: function (response) {
						usuario = response.split("</html>")[1];

						$.ajax({
							url: "https://wecooking.online/php/save_comment.php",
							type: "POST",
							data: { userId: usuario, receitaId: receita, comment: commentValue },
							success: function (response) {
								location.reload();
							},
							cache: false,
						});
					},
					cache: false,
				})
			})
		})
	</script>
</html>
		