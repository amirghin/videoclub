function campos_iguales($primero, $segundo){

	if($primero.val() == $segundo.val()){

		return true

	};
};

$(function(){
    $("#crear_usuario").click(function(){
        if(campos_iguales($("#contrasena"), $("#conf_contrasena"))){

        	var usuario = $(":input").serializeArray();
            $.ajax({
            method: "POST",
            url: "i_usuarios_administradores.php",
            data: usuario
            })
                .done(function( msg ) {
                alert( "se inserto el usuario");
            });
            
        } else{

        	alert("Las contraseñas son diferentes");
        };
    });


});