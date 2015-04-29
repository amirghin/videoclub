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
    $("input[type='password']").val("");
}

function search(){
    //console.log("hola");

    var buscar = $("#nombre_usuario").val();

    if (buscar!=""){
        var busqueda = $.ajax({
            url: "controllers/busqueda_usuarios_controller.php",
            type: "POST",
            data: {nombre_usuario:buscar},
        });
        busqueda.done(function(response){
            var object = jQuery.parseJSON(response);
            console.log(object);
            if (object.usuarios.length !== 0 ){
                var table = "<tr><td>Nombre</td><td>Apellido</td><td>Nombre de usuario</td><td>Eliminar</td><td>Modificar</td></tr>";
                var tableValues = "";
                //console.log(object.usuarios.length);
            
                $.each(object.usuarios, function(key,value){
                    tableValues += "<tr><td>"+value.nombre+"</td><td>"+value.apellido+"</td><td>"+value.nom_usuario+"</td><td> <a href='#' class='eliminar' id="+key+">Eliminar</a> </td> <td> <a href='#' class='modificar' id="+key+">Modificar</a>  </td></tr>";
                    
                });
            }else{
                alert ("No se han encontrado coincidencias");
            }
            $("#result").html(table+tableValues);


            $('.eliminar').click(function(e){
                e.preventDefault();
                var key = $(this).attr("id");
                var id_usuario = object.usuarios[key].id_usuario;
                console.log(id_usuario);

                $.ajax({
                method: "POST",
                url: "controllers/eliminar_usuarios_controller.php",
                data: {id_usuario:id_usuario}
                })
                .success(function( response ) {
                   if (response.error) {
                        // handle the error
                        //throw response.error.message;
                        alert(response.error.message);
                    }else{
                        console.log(response);
                        alert("Usuario eliminado");
                        
                        search();
                        //alert( "se modifico la pelicula");
                    }
                //limpiar_campos();
                }); 
                
            });
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
};



function successPeliculasNombre(response){
    var objetoPeliculasNombre = jQuery.parseJSON(response);
    //console.log(objetoPeliculasNombre.peliculas[0].nombre_pelicula);
    if (objetoPeliculasNombre.error) {
        console.log(objetoPeliculasNombre);
        alert(objetoPeliculasNombre.error.msg);
    }else{
        console.log(objetoPeliculasNombre );
        var table = "<tr><td>ID Pelicula</td><td>Nombre Pelicula</td><td>Cantidad copias</td><td>Precio Alquiler</td><td>Reservar</td></tr>";
        var tableValues = "";
        $.each(objetoPeliculasNombre.peliculas, function(key,value){
            tableValues += "<tr><td>"+value.id_pelicula+"</td><td>"+value.nombre+"</td><td>"+value.num_copia+"</td><td>"+value.precio_alquiler+"</td><td> <a href='' class='reservar' id="+key+">Reservar</a> </td></tr>";
            
        });
        $("#result").html(table+tableValues);


        $('.reservar').click(function(e){
            e.preventDefault();
            var key = $(this).attr("id"),
                //id_pelicula = objetoPeliculasNombre.peliculas[key].id_pelicula,
                id_copia = objetoPeliculasNombre.peliculas[key].id_copia,
                cantidad = objetoPeliculasNombre.peliculas[key].num_copia;
            //$("#id_pelicula").val(id_pelicula);
            $("#id_copia").val(id_copia);
            if(cantidad > 0){
                $("#f_reservar_peliculas").removeClass("hidden");
            }else{
                alert("No hay peliculas disponibles para reservar");
            }
            
            //if (objetoPeliculasNombre)
            
        });

    }   
};

function successPeliculasGenero(response){
    console.log(response);
    var objetoPeliculasGenero = jQuery.parseJSON(response);
    if (objetoPeliculasGenero.error) {
        console.log(objetoPeliculasGenero);
        alert(objetoPeliculasGenero.error.msg);
    }else{
        var table = "<tr><td>ID Pelicula</td><td>Nombre Pelicula</td><td>Disponibilidad</td><td>Precio Alquiler</td><td>Reservar</td></tr>";
        var tableValues = "";
        $.each(objetoPeliculasGenero, function(key,value){
            tableValues += "<tr><td>"+value.id_pelicula+"</td><td>"+value.nombre+"</td><td>"+value.Disponibilidad+"</td><td>"+value.precio_alquiler+"</td><td> <a href='' class='reservar' id="+key+">Reservar</a> </td></tr>";
            
        });
        $("#result").html(table+tableValues);


        $('.eliminar').click(function(e){
            e.preventDefault();
            var key = $(this).attr("id");
            $("#form_m_usuarios").removeClass("hidden");
            
        });

    }   
}

function buscar_pelicula_nombre(filtro, texto_buscar){
    if (verificar_campos()){
        var nombre_pelicula_pelicula = texto_buscar;
        var busqueda = $.ajax({
            url: "controllers/busqueda_pelicula_nombre_controller.php",
            type: "POST",
            data: {nombre_pelicula:nombre_pelicula_pelicula},
        })
        .success(function(response){
            successPeliculasNombre(response);
        });
    }
};

function buscar_pelicula_genero(filtro, texto_buscar){
    if (verificar_campos()){
        var genero_pelicula = texto_buscar;
        var busqueda = $.ajax({
            url: "controllers/busqueda_pelicula_genero_controller.php",
            type: "POST",
            data: {genero_pelicula:genero_pelicula},
        })
        .success(function(response){
            successPeliculasGenero(response);
        });
    }
};


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

};

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


function llenar_dropdown_cargos(){
    $.ajax({
        method:"POST",
        url: "controllers/llenar_cargos_controller.php"

    })
    .success (function (data){
        console.log(data);
        var object = jQuery.parseJSON(data);
        console.log(object);
        var selectData = "";
        $.each(object.cargos, function(key,value){
            $("#cargos").append("<option value="+value.id_cargo+">"+value.tipo+"</option>");

        });
    })
};

function llenar_dropdown_peliculas(){
     $.ajax({
        method:"POST",
        url: "controllers/llenar_peliculas_controller.php"

    })
    .success (function (data){
        console.log(data);
        var object = jQuery.parseJSON(data);
        console.log(object);
        var selectData = "";
        $.each(object.peliculas_dropdown, function(key,value){
            $("#id_pelicula").append("<option value="+value.id_pelicula+">"+value.nombre+"</option>");

        });
    })   
};

function llenar_dropdown_ubicaciones(){
     $.ajax({
        method:"POST",
        url: "controllers/llenar_ubicaciones_controller.php"

    })
    .success (function (data){
        console.log(data);
        var object = jQuery.parseJSON(data);
        console.log(object);
        var selectData = "";
        $.each(object.ubicaciones_dropdown, function(key,value){
            $("#ubicaciones_cod_ubicacion").append("<option value="+value.cod_ubicacion+">"+value.detalle+"</option>");

        });
    })   
};


function verficar_estado_cliente(id_cliente){
    $.ajax({
        url: "controllers/verificar_estado_cliente_controller.php",
        method:"POST",
        data: {id_cliente:id_cliente},
    })
    .success (function (data){
        //console.log(data);
        var object = jQuery.parseJSON(data);
        //console.log(object);
        if (object.error) {
            //throw data.error.message;
            alert(object.error.msg);
            
        }
        else{
            
            var activo_web = parseFloat(object.clientes[0].activo_web),
                estado = object.clientes[0].estado;
            if (activo_web === 1 && estado === "aprobado"){
                $("#f_reservar_peliculas .requerido").removeAttr("disabled");
                //$("#estado_aprobacion").val(estado);
            }else{return false}
        }
    })
}


$(function(){


    /********** Funciones de AJAX ********
    *********** con JQuery para insertar **
    *********** en la BD ******************/

    //llenar_dropdown(); // TODO -- validar que esta funcion se ejecute cuando el dropdown de generos esta presente en el form
    //llenar_dropdown_cargos();

    /********************* Insertar usuario *******************/
    $("#crear_usuario").click(function(){ 
        if(campos_iguales($("#contrasena"), $("#conf_contrasena"))){

            var usuario = $(":input").serializeArray();
            $.ajax({
            method: "POST",
            url: "controllers/insertar_usuarios_administradores.php",
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
    $("#insertar_peliculas").click(function(){
        genero = $("#genero option:selected").val();
        $("#hidden_genero").val(genero);
        console.log(genero);
        var peliculas = $(":input").serializeArray();
        console.log(peliculas);
        if(verificar_campos() && genero != '0'){
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

        }else if(genero == "0"){
            alert("Por favor seleccione un Genero");

        }
    });


    /*****************Insertar copias************/
    $("#insertar_copias").click(function(){
        var h_pelicula = $("#id_pelicula option:selected").val();
        var h_ubicacion = $("#ubicaciones_cod_ubicacion option:selected").val();
        $("#h_pelicula").val(h_pelicula);
        $("#h_ubicacion").val(h_ubicacion);
        var copias = $(":input").serializeArray();

        if(h_ubicacion != "0" && h_pelicula != "0"){
            $.ajax({
            method: "POST",
            url: "controllers/insertar_copias_controller.php",
            data: copias
            })

            .success(function( response ) {
               if (response.error) {
                    // handle the error
                    //throw response.error.message;
                    alert(response.error.message);
                }else{
                    console.log(response);
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 
        }else{
            alert("Por Favor seleccione una pelicula y una ubicacion");
        }

    });

    /*****************Insertar Roles*******************/
    $("#insertar_rol").click(function(){       
        var rol = $(":input").serializeArray();

        if(verificar_campos()){
            $.ajax({
            method: "POST",
            url: "controllers/insertar_rol_controller.php",
            data: rol
            })

            .success(function( response ) {
               if (response.error) {
                    // handle the error
                    throw response.error.message;
                    console.log(response.error.message);
                }else{
                    console.log(response);
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 
        }
    });

    /*****************Insertar ubicaciones ************/
    $("#insertar_ubicacion").click(function(){
        var ubicacion = $(":input").serializeArray();
        if(verificar_campos()){

            $.ajax({
            method: "POST",
            url: "controllers/insertar_ubicaciones_controller.php",
            data: ubicacion
            })

            .success(function( response ) {
               if (response.error) {
                    // handle the error
                    throw response.error.message;
                    console.log(response.error.message);
                }else{
                    console.log(response);
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 
        }
        
    });

    /*****************Insertar Cargos ************/
    $("#insertar_cargo").click(function(){
        
        var tipo = $("#tipo option:selected").val();
        $("#h_tipo").val(tipo);
        var cargos = $(":input").serializeArray();
        if(tipo != "0" && verificar_campos()){
            $.ajax({
            method: "POST",
            url: "controllers/insertar_cargo_controller.php",
            data: cargos
            })

            .success(function( response ) {
                console.log(objeto = jQuery.parseJSON(response));
               if (response.error) {
                    // handle the error
                    throw response.error.message;
                    console.log(response.error.message);
                }else{
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 

        }else if(tipo == "0"){

            alert("Tiene que seleccionar un tipo");
        }
    });
    /**************Insertar Actores Directores********************/

    $("#insertar_actor_director").click(function(){
    
        var genero = $("#actor_genero option:selected").val();
        $("#h_genero").val(genero);
        var actores = $(":input").serializeArray();
        console.log(actores);
        if(genero != "0" && verificar_campos()){
            $.ajax({
            method: "POST",
            url: "controllers/insertar_actor_director_controller.php",
            data: actores
            })

            .success(function( response ) {
                console.log(objeto = jQuery.parseJSON(response));
               if (response.error) {
                    // handle the error
                    throw response.error.message;
                    console.log(response.error.message);
                }else{
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 

        }else if(genero == "0"){

            alert("Tiene que seleccionar un genero");
        }
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

    /*********** Busqueda parte transaccional *******************/

    $("#buscar_peliculas").click(function(){
        var filtro = ($('input[name=busqueda]:checked').val());
        var texto_buscar = ($('#texto_busqueda').val());
        if (filtro === "genero"){
            buscar_pelicula_genero(filtro, texto_buscar);
        }else if (filtro === "nombre"){
            buscar_pelicula_nombre(filtro, texto_buscar);
        }

    });

    /*********** Buscar generos *******************/

    $("#buscar_generos #genero").change(function(){
        id_genero = $("#genero option:selected").val();
        nombre = $("#genero option:selected").text();

        $("#id_genero").val(id_genero);
        $("#nombre_genero").val(nombre);
        $("#form_m_generos").removeClass('hidden');
    });

    /*********** Borrar generos *******************/

    $("#eliminar_genero").click(function(){
        console.log("elimnar");
        id_genero = $("#id_genero").val();
        nombre = $("#nombre_genero").val();

        var objeto = {
            id_genero : id_genero,
            nombre : nombre
        };

        $.ajax({
        method: "POST",
        url: "controllers/eliminar_genero_controller.php",
        data: objeto
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

    /*************** Eliminar generos *******************/

    $("#modificar_genero").click(function(){
        id_genero = $("#id_genero").val();
        nombre = $("#nombre_genero").val();

        var objeto = {
            id_genero : id_genero,
            nombre : nombre
        };

        console.log(objeto);

        $.ajax({
        method: "POST",
        url: "controllers/modificar_generos_controller.php",
        data: objeto
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


    $("#id_cliente").keyup(function(e) {
        id_cliente = $(this).val();
        if(e.keyCode == 13) {
            verficar_estado_cliente(id_cliente);
        }
    });   

    /******************** Insertar reservacion *****************/

    $("#insertar_reserva").click(function(){
        var reservacion = $("#f_reservar_peliculas :input").serializeArray();
        console.log(reservacion);
        $.ajax({
            method:"POST",
            url: "controllers/insertar_reservaciones_controllers.php",
            data: reservacion            
        })
        .success(function( response ) {
           if (response.error) {
                // handle the error
                throw response.error.message;
                console.log(response.error.message);
            }else{
                console.log(response)
                var objeto = jQuery.parseJSON(response);
                alert( objeto.success.mensaje);
            }
        //limpiar_campos();
        }); 
    });


    /******************** Insertar devoluciones *****************/
    $("#insertar_devoluciones").click(function(){
        if (verificar_campos()){
            var devoluciones = $(":input").serializeArray();
            console.log(devoluciones);
            $.ajax({
                method: "POST",
                url : "controllers/insertar_devoluciones_controllers.php",
                data: devoluciones
            })
            .success(function( response ) {
               if (response.error) {
                    // handle the error
                    //throw response.error.message;
                    alert(response.error.message);
                }else{
                    console.log(response)
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 
        }
        
    })
    /******************* Insertar Genero **********************/
    $("#insertar_genero").click(function(){
        if (verificar_campos()){
            var genero = $(":input").serializeArray();
            console.log(genero);
            $.ajax({
                method: "POST",
                url : "controllers/insertar_genero_controller.php",
                data: genero
            })
            .success(function( response ) {
               if (response.error) {
                    // handle the error
                    //throw response.error.message;
                    alert(response.error.message);
                }else{
                    console.log(response)
                    var objeto = jQuery.parseJSON(response);
                    alert( objeto.success.mensaje);
                }
            //limpiar_campos();
            }); 
        }
        
    })

    /************* Insertar Cliente ****************************/
    $("#i_clientes").click(function(){
            if (verificar_campos()){
                var cliente = $(":input").serializeArray();
                console.log(cliente);
                $.ajax({
                    method: "POST",
                    url : "controllers/insertar_cliente_controller.php",
                    data: cliente
                })
                .success(function( response ) {
                   if (response.error) {
                        // handle the error
                        //throw response.error.message;
                        alert(response.error.message);
                    }else{
                        console.log(response)
                        var objeto = jQuery.parseJSON(response);
                        alert( objeto.success.mensaje);
                    }
                //limpiar_campos();
                }); 
            }
            
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

    /*****************Funcion de busqueda de peliculas id************/
    $("#buscar_peliculas_id").on("click", function(){
        buscar_peliculas_id();
    })


    if ($("#i_copias").length > 0){
        llenar_dropdown_peliculas();
        llenar_dropdown_ubicaciones();
    };

    if ($("#i_peliculas").length > 0){
        llenar_dropdown();
    };

    if ($("#i_devoluciones").length > 0){
        llenar_dropdown_cargos();
    };




});