$(document).ready(function() {

    //$('.maskedTextField').maskAsNumber();
    if(!$("#data").val().length && !$("#sala").val().length){
        $('.buscar').attr("disabled", "disabled");
    }

    $("#data").blur(function(){
        if($("#data").val().length && $("#sala").val().length){
            $(".buscar").removeAttr("disabled");
        } else {
            $('.buscar').attr("disabled", "disabled");

        }
    });

    $("#sala").blur(function(){
        if($("#data").val().length && $("#sala").val().length){
            $(".buscar").removeAttr("disabled");
        } else {
            $('.buscar').attr("disabled", "disabled");

        }
    });
/*
    $("#teste").change(function() {
        $(".message_salvar").fadeOut("slow");
    });*/


    // $(".buscar").click(function() {
    //
    //     let sala = $('#sala').val();
    //     let data = $('#data').val();
    //
    //     //$(".message_salvar").fadeOut("slow");
    // });


});