function campos_iguales($primero, $segundo){

	if($primero.val() == $segundo.val()){

		return true

	};
};

$(function(){
    $("#crear_usuario").click(function(){
        if(campos_iguales($("#contrasena"), $("#conf_contrasena"))){

        	alert("iguales");
        } else{

        	alert("diferentes");
        };
    });
});