$(document).ready(function() {

    $("#data_reserva_").blur(function() {

        $(".message_reserva").fadeOut("slow");
        $(".message_disponivel").fadeOut("slow");

        let data_reserva = $(this).val();
        let hora_inicial = $('#hora_inicial').val();
        let id_sala = $('#id_sala').val();

        if(data_reserva.length && hora_inicial.length){
            $.ajax({
                url: "get_data_ajax.php",
                type: "POST",
                data: {
                        data_reserva: data_reserva,
                        hora_inicial: hora_inicial,
                        id_sala: id_sala
                },
                dataType: 'json',
                success: function(j){

                    if(j.return == true){
                        $('.cadastrar').attr("disabled", "disabled");
                        $(".message_reserva").fadeIn("slow");
                        $(".message_disponivel").fadeOut("slow");
                    } else {
                        $(".cadastrar").removeAttr("disabled");
                        $(".message_reserva").fadeOut("slow");
                        $(".message_disponivel").fadeIn("slow");

                    }

                }
            });
        }
    });

    $("#hora_inicial").blur(function() {

        $(".message_reserva").fadeOut("slow");
        $(".message_disponivel").fadeOut("slow");

        let hora_inicial = $(this).val();
        let data_reserva = $('#data_reserva_').val();
        let id_sala = $('#id_sala').val();

        if(data_reserva.length && hora_inicial.length){
            $.ajax({
                url: "get_data_ajax.php",
                type: "POST",
                data: {
                    data_reserva: data_reserva,
                    hora_inicial: hora_inicial,
                    id_sala: id_sala
                },
                dataType: 'json',
                success: function(j){

                    if(j.return == true){
                        $('.cadastrar').attr("disabled", "disabled");
                        $(".message_reserva").fadeIn("slow");
                        $(".message_disponivel").fadeOut("slow");
                    } else {
                        $(".cadastrar").removeAttr("disabled");
                        $(".message_reserva").fadeOut("slow");
                        $(".message_disponivel").fadeIn("slow");

                    }

                }
            });
        }
    });


});