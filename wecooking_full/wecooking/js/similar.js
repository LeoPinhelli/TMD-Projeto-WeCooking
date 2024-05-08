$("document").ready(function () {
    let receita = location.href.split("/")[4]

    $.ajax({
        url: 'https://wecooking.online/php/get_similar_receipts.php',
        type: 'POST',
        data: { receiptId: receita },
        success: function (response) {
            $(".content").append('<div id="similar" style="width: 100%; display: grid;grid-template-columns: auto auto auto auto;place-items: center;margin-top: 12vh;"></div>')

            $("#similar").append(response.split("</html>")[1])

            if ($('#similar').children().length < 4) {
                if ($('#similar').children().length === 3) {
                    $("#similar").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                } else if ($('#similar').children().length === 2) {
                    $("#similar").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                } else if ($('#similar').children().length === 1) {
                    $("#similar").append('<div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div><div style="display: flex; padding: 2vh"><span style="width: 16vw"></span></div>')
                }
            }
        },
        cache: false,
    });
})