function campos_iguales($primero, $segundo){

	if($primero.val() == $segundo.val()){

		return true

	};
};

$(function(){
    $("#crear_usuario").click(function(){
        if(campos_iguales($("#contrasena"), $("#conf_contrasena"))){

        	var usuario = $(":input").serializeArray();
            console.log(usuario);
            $.ajax({
            method: "POST",
            url: "i_usuarios_administradores.php",
            data: usuario
            })
                .done(function( msg ) {
                alert( "Data Saved: " + msg );
            });
            
        } else{

        	alert("Las contraseñas son diferentes");
        };
    });


});