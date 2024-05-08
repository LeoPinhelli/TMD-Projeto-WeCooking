$("document").ready(function () {
    let receita = location.href.split("/")[4]

    $.ajax({
        url: 'https://wecooking.online/php/get_avaliacao.php',
        type: 'POST',
        data: { receitaId: receita },
        success: function (response) {
            let sumAvals = 0;
            let numAvals = response.split('</html>')[1].split("*")[0];
            let avals = response.split('</html>')[1].split("*")[1].split(",");

            for (let aval = 0; aval < numAvals; aval++) {
                sumAvals += parseInt(avals[aval]);
            };
            let media = sumAvals / parseInt(numAvals);
            let mediaAvals = media.toFixed(1);

            if (mediaAvals >= 1 && mediaAvals < 2) {
                $('#1').removeClass("fa-regular")
                $('#1').addClass("fa-solid")
            } else if (mediaAvals >= 2 && mediaAvals < 3) {
                $('#1, #2').removeClass("fa-regular")
                $('#1, #2').addClass("fa-solid")
            } else if (mediaAvals >= 3 && mediaAvals < 4) {
                $('#1, #2, #3').removeClass("fa-regular")
                $('#1, #2, #3').addClass("fa-solid")
            } else if (mediaAvals >= 4 && mediaAvals < 5) {
                $('#1, #2, #3, #4').removeClass("fa-regular")
                $('#1, #2, #3, #4').addClass("fa-solid")
            } else if (mediaAvals >= 5) {
                $('#1, #2, #3, #4, #5').removeClass("fa-regular")
                $('#1, #2, #3, #4, #5').addClass("fa-solid")
            };

            $("#nota").text(mediaAvals + "/5")
            $("#avals").text(numAvals + " avaliações")
        },
        cache: false,
    });

    $('.fa-regular').mouseover(function (e) {
		for (let i = 0; i <= e.currentTarget.id; i++) {
			$('#' + i).css("color", "orange")
		}
	})

	$('.fa-regular').mouseout(function (e) {
		$('.fa-regular').css("color", "")
	})

    $('.fa-star').click(function (e) {

		const cookies = document.cookie.split(" ");
		const cookieUser = cookies.find((element) => element.includes("User"));

		if (cookieUser) {
			let idValue = e.currentTarget.id;
			let idValuePlus1 = parseInt(idValue) + 1;

			for (let i = 0; i <= idValue; i++) {
				$('#' + i).removeClass("fa-regular")
				$('#' + i).addClass("fa-solid")

				for (let x = idValuePlus1; x <= 5; x++) {
					$('#' + x).removeClass("fa-solid")
					$('#' + x).addClass("fa-regular")
				}
			};

			let receita = location.href.split("/")[4]
			let email = cookieUser.split("=")[1]; // Pega o email usado para logar

			$.ajax({
				url: 'https://wecooking.online/php/get_user_id.php',
				type: 'POST',
				data: { userEmail: email },
				success: function (response) {
					let usuario = response.split('</html>')[1];

					$.ajax({
						url: 'https://wecooking.online/php/avaliacao.php',
						type: 'POST',
						data: { avaliacao: idValue, userId: usuario, receitaId: receita },
                        success: function () {
                            location.reload();
                        },
						cache: false,
					});
				},
				cache: false,
			});


		} else {
			$(".screen").append("<div class='modal-warning'></div>")

            $(".modal-warning").append("<div class='modal-message'></div>")

            $(".modal-message").append("<span class='modal-title'>Gostou dessa receita?</span>")
            $(".modal-message").append("<span>Faça o login para poder avalia-lá.</span>")
            $(".modal-message").append("<div class='modal-links'></div>")

            $(".modal-links").append("<a href='https://wecooking.online/login.php'>Fazer login</a>")
            $(".modal-links").append("<span id='modalNo'>Não, obrigado</span>")

            $("#modalNo").on("click", function () {
                $(".modal-warning").remove();
            })
		}
	})
})