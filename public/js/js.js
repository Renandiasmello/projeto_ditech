$(document).ready(function() {

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

    

});