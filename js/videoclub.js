function campos_iguales($primero, $segundo){

    if($primero.val() == $segundo.val()){

        return true

    };
};

/*********************************/
/**** Verficar espacios en *******/
/********* blanco ***************/
/********************************/

function verificar_campos(){
    var campos = $(".requerido");
    if (campos.val() == ""){
        alert("No pueden haber espacios en blanco");
        return false;
    }else return true;
}


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

    }else{
        alert("Los campos no pueden ir en blanco");
    }

};

function successPeliculasID(response){
    var objetoPeliculasId = jQuery.parseJSON(response);

   if (objetoPeliculasId.error) {
        console.log(objetoPeliculasId);
        alert(objetoPeliculasId.error.msg);
    }else{
        console.log(objetoPeliculasId);
        if ($("#results").length){
            $("#results").append("<tr><td>"+objetoPeliculasId.peliculas.nombre+"</td><td>"+objetoPeliculasId.peliculas.duracion+"</td><td>"+objetoPeliculasId.peliculas.precio_alquiler+"</td><td><a href='#' class='modificar'>Modificar</a></td><td><a href='#' class='eliminar'>Eliminar</a></td></tr>")
        }else{
            $("#b_peliculas_id").append("<table id='results'><tr><td>Nombre Pelicula</td><td>Duracion</td><td>Precio Alquiler</td><td>Modificar</td><td>Eliminar</td></tr></table>");
            $("#results").append("<tr><td>"+objetoPeliculasId.peliculas.nombre+"</td><td>"+objetoPeliculasId.peliculas.duracion+"</td><td>"+objetoPeliculasId.peliculas.precio_alquiler+"</td><td><a href='#' class='modificar'>Modificar</a></td><td><a href='#' class='eliminar'>Eliminar</a></td></tr>")
        }
        $(".modificar").click(function(e){
            e.preventDefault();
            $("#eliminar_peliculas").hide();
            var form = $("#modificar"),
                id_pelicula = form.find('#id_pelicula'),
                nombre_pelicula = form.find('#nombre_pelicula'),
                precio_alquiler = form.find("#precio_alquiler"),
                duracion = form.find("#duracion"),
                genero = form.find("#genero"),
                ruta_imagenes = form.find("#ruta_imagenes");

            form.removeClass('hidden');

            id_pelicula.val(objetoPeliculasId.peliculas.id_pelicula);
            nombre_pelicula.val(objetoPeliculasId.peliculas.nombre);
            precio_alquiler.val(objetoPeliculasId.peliculas.precio_alquiler);
            duracion.val(objetoPeliculasId.peliculas.duracion);
            ruta_imagenes.val(objetoPeliculasId.peliculas.ruta_imagenes);
        });

        $(".eliminar").click(function(e){
            e.preventDefault();
            $("#modificar_peliculas").hide();
            var form = $("#modificar"),
                id_pelicula = form.find('#id_pelicula'),
                nombre_pelicula = form.find('#nombre_pelicula'),
                precio_alquiler = form.find("#precio_alquiler"),
                duracion = form.find("#duracion"),
                genero = form.find("#genero"),
                ruta_imagenes = form.find("#ruta_imagenes");
            form.removeClass('hidden');

            id_pelicula.val(objetoPeliculasId.peliculas.id_pelicula);
            nombre_pelicula.val(objetoPeliculasId.peliculas.nombre);
            precio_alquiler.val(objetoPeliculasId.peliculas.precio_alquiler);
            duracion.val(objetoPeliculasId.peliculas.duracion);
            ruta_imagenes.val(objetoPeliculasId.peliculas.ruta_imagenes);            
        })
    }




    //console.log(objetoPeliculasId);


}

function buscar_peliculas_id(){
    if (verificar_campos()){
        var id_pelicula = $("#id_pelicula").val();
        var busqueda = $.ajax({
            url: "controllers/busqueda_pelicula_id_controller.php",
            type: "POST",
            data: {id_pelicula:id_pelicula},
        })
        .success(function(response){
            successPeliculasID(response);
        });
    }

}

function llenar_dropdown(){
    $.ajax({
        method:"POST",
        url: "controllers/generos_controller.php"

    })
    .success (function (data){
        var object = jQuery.parseJSON(data);
        var selectData = "";
        $.each(object.generos, function(key,value){
            $("#genero").append("<option value="+value.id_genero+">"+value.nombre+"</option>");

        });
    })
};



$(function(){


    /********** Funciones de AJAX ********
    *********** con JQuery para insertar **
    *********** en la BD ******************/

    llenar_dropdown(); // TODO -- validar que esta funcion se ejecute cuando el dropdown de generos esta presente en el form

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
        data: genero,
        contentType: false
        })
        .success(function( msg ) {
         alert( "se inserto el genero");
        //limpiar_campos();
        }); 
    });

    /********************* Insertar peliculas *******************/
    $("#crear_peliculas").click(function(){
        $("#hidden_genero").val($("#genero option:selected").val());
        var peliculas = $(":input").serializeArray();
        console.log(peliculas);

        $.ajax({
        method: "POST",
        url: "controllers/insertar_peliculas_controller.php",
        data: peliculas
        })
        .success(function( response ) {
           if (response.error) {
                // handle the error
                throw response.error.message;
                console.log(response.error.message);
            }else{
                console.log(response);
                alert( "se inserto la pelicula");
            }
        //limpiar_campos();
        }); 
    });


    /********************* Modificar peliculas *******************/

    $("#modificar_peliculas").click(function(){ 
        //$("#eliminar_peliculas").hide();
        $("#hidden_genero").val($("#genero option:selected").val());
        var peliculas = $("#modificar :input").serializeArray();
        console.log(peliculas);
        $.ajax({
        method: "POST",
        url: "controllers/modificar_peliculas_controller.php",
        data: peliculas
        })
        .success(function( response ) {
            //console.log("hola");
           if (response.error) {
                // handle the error
                //throw response.error.message;
                alert(response.error.message);
            }else{
                console.log(response);
                alert( "se modifico la pelicula");
            }
        //limpiar_campos();
        }); 
    });

    /********************* Eliminar peliculas *******************/

    $("#eliminar_peliculas").click(function(){
        //$("#modificar_peliculas").hide();
        $("#hidden_genero").val($("#genero option:selected").val());
        var peliculas = $("#modificar :input").serializeArray();
        console.log(peliculas);
        $.ajax({
        method: "POST",
        url: "controllers/eliminar_peliculas_controller.php",
        data: peliculas
        })
        .success(function( response ) {
            //console.log("hola");
           if (response.error) {
                // handle the error
                //throw response.error.message;
                alert(response.error.message);
            }else{
                console.log(response);
                alert( "se modifico la pelicula");
            }
        //limpiar_campos();
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

    $("#buscar_peliculas_id").on("click", function(){
        buscar_peliculas_id();
    })



});