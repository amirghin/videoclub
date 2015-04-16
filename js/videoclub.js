function campos_iguales($primero, $segundo){

	if($primero.val() == $segundo.val()){

		return true

	};
};

/*************************/
/******Limpia campos******/
/*************************/ 

function limpiar_campos(){
    $("input[type='text']").val("");
}

function search(){

    var buscar = $("#nombre_usuario").val();

    if (buscar!=""){
        var busqueda = $.ajax({
            url: "search.php",
            type: "POST",
            data: {nombre_usuario:buscar},
        });
        busqueda.done(function(response){
            var object = jQuery.parseJSON(response);
            var table = "<tr><td>Nombre</td><td>Apellido</td><td>Nombre de usuario</td></tr>";
            var tableValues = "";
            $.each(object.usuarios, function(key,value){
                tableValues += "<tr><td>"+value.nombre+"</td><td>"+value.apellido+"</td><td>"+value.nom_usuario+"</td><td> <input type='button' value='Eliminar'/> </td> <td> <input type='button' value='Modificar'/> </td></tr>";
                
            });
            $("#result").html(table+tableValues);
        });
        busqueda.error(function(error){
            alert("error");
        });

    }

}



$(function(){
    /********** Funciones de AJAX ********
    *********** con JQuery para insertar **
    *********** en la BD ******************/

    /********************* Insertar usuario *******************/
    $("#crear_usuario").click(function(){ 
        if(campos_iguales($("#contrasena"), $("#conf_contrasena"))){

        	var usuario = $(":input").serializeArray();
            $.ajax({
            method: "POST",
            url: "i_usuarios_administradores.php",
            data: usuario
            })
            .success(function( msg ) {

                alert( "se inserto el usuario");
                limpiar_campos();
            });
            
        } else{

        	alert("Las contraseñas son diferentes");
        };
    });

    /********************* Insertar generos *******************/

    $("#crear_genero").click(function(){ 
        var genero = $(":input").serializeArray();
        console.log(genero);
        $.ajax({
        method: "POST",
        url: "i_generos.php",
        data: genero
        })
        .success(function( msg ) {
        alert( "se inserto el genero");
        //limpiar_campos();
        }); 
    });

    /********************* Insertar peliculas *******************/
    $("#crear_peliculas").click(function(){
        var pelicula = $(":input").serializeArray();
        $.ajax({
        method: "POST",
        url: "i_peliculas.php",
        data: pelicula
        })
        .success(function( msg ) {
        alert( "se inserto la pelicula");
        limpiar_campos();
        }); 
    });




    /*****************Funcion de busqueda de usuarios************/
   
    $("#button").on("click", function(){
        search();
    });

    $('#search').keyup(function(e) {
        if(e.keyCode == 13) {
            search();
        }
    });   



});