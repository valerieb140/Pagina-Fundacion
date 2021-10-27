
$(document).ready(function(){

    //Funciones Globales ->

    //Funcion para subir imagenes
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    });

    //funcion que captura el nombre de la imagen
    $('#image').change(function () {
        var filename = $('#image').val().split('\\').pop();
        imagen = $.trim(filename);

        
        //console.log(filename);
        //console.log(pais);
    })

    //Variables Globales ->
    var fila; //capturar la fila para editar o borrar el registro


//--------------------------------------------------------------------EDICION>>>>>  // NOTICIA  
    tablaNoticia = $("#tablaNoticia").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarNoticia'>Editar</button><button class='btn btn-danger btnBorrarNoticia'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
    $("#btnNuevoNoticia").click(function(){
        $("#formNoticia").trigger("reset");
        $(".card-img-top").attr("src", "images/image-fondo.png"); //devolviendo imagen destacada
        imagen = "image-fondo.png"; //imagen por defecto
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva Noticia");            
        $("#modalNoticia").modal("show");        
        id=null;
        opcion = 1; //alta
    });    
    
    //botón EDITAR    
    $(document).on("click", ".btnEditarNoticia", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());//id
        tituloNot = fila.find('td:eq(1)').text();//titulo
        descripNot = fila.find('td:eq(4)').text();//descripcion
        imagenNot = fila.find('td:eq(5)').text();//pais = fila.find('td:eq(2)').text(); lo quite porque si la persona va a editar le vamos a poner el campo vacio //imagen
        fechaNot = fila.find('td:eq(2)').text();//parseInt(fila.find('td:eq(3)').text()); //fecha
        contNot = fila.find('td:eq(3)').text();//contenido
        
        nomImg= $.trim(imagenNot);

        $("#titulo-not").val(tituloNot);//titulo
        //$("#image").val();//$("#pais").val(pais);//imagen
        $(".card-img-top").attr("src", "images/"+ nomImg); //devolviendo imagen destacada
        $("#fecha-not").val(fechaNot);//fecha
        $("#contenido-not").val(contNot);//contenido 
        $("#descrip-not").val(descripNot);//contenido 
        opcion = 2; //editar

        imagen = nomImg; 
        //console.log("se esta metiendo por aqui");
        
    // nombredocument = $.trim($("#image").val());
        // console.log(nombredocument);

        //imageC= document.getElementById("nombre-archivo");
        //contentimage = imageC.innerHTML;
        //console.log($.trim(pais));
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Noticia");            
        $("#modalNoticia").modal("show");  
        
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrarNoticia", function(){    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    //tablaPersonas.row(fila.parents('tr')).remove().draw();
                    window.location.reload();
                }
            });
        } 
    });

    //botón Cancelar
    $(document).on("click", "#btnCancelarNoticia", function(){    
    $("#modalNoticia").modal("hide");  
    });

    //Funcion para enviar datos de editar y agregar
    $("#formNoticia").submit(function(e){
    e.preventDefault();    
    tituloNoticia = $.trim($("#titulo-not").val());
    //pais = $.trim($("#pais").val());
    fechaNoticia = $.trim($("#fecha-not").val());    
    contenidoNoticia = $.trim($("#contenido-not").val());
    descripNoticia = $.trim($("#descrip-not").val());

    //nombreArch = $.trim($("#archivo").val());

    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {tituloNoticia:tituloNoticia, imagen:imagen, fechaNoticia:fechaNoticia, contenidoNoticia:contenidoNoticia, descripNoticia:descripNoticia, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            /*id = data[0].id;            
            nombre = data[0].nombre;
            pais = data[0].pais;
            edad = data[0].edad;
            otro = data[0].otro;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,edad,otro,pais]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,edad,otro,pais]).draw();}   */
            window.location.reload();
        }        
    });
    $("#modalNoticia").modal("hide");    

    });  



//--------------------------------------------------------------------EDICION>>>>>  // SERVICIOS
//----------------------------------------> CURSOS
tablaCurso = $("#tablaCurso").DataTable({
    "columnDefs":[{
     "targets": -1,
     "data":null,
     "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarCurso'>Editar</button><button class='btn btn-danger btnBorrarCurso'>Borrar</button></div></div>"  
    }],
     
     //Para cambiar el lenguaje a español
 "language": {
         "lengthMenu": "Mostrar _MENU_ registros",
         "zeroRecords": "No se encontraron resultados",
         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
         "sSearch": "Buscar:",
         "oPaginate": {
             "sFirst": "Primero",
             "sLast":"Último",
             "sNext":"Siguiente",
             "sPrevious": "Anterior"
          },
          "sProcessing":"Procesando...",
     }
 });
 
$("#btnNuevoCurso").click(function(){
 $("#formCurso").trigger("reset");
 $(".card-img-top").attr("src", "images/image-fondo.png"); //devolviendo imagen destacada
 imagen = "image-fondo.png"; //imagen por defecto
 $(".modal-header").css("background-color", "#28a745");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Nuevo Curso");            
 $("#modalCurso").modal("show");        
 id=null;
 opcion = 4; //alta
});    
 
//botón EDITAR    
$(document).on("click", ".btnEditarCurso", function(){
 fila = $(this).closest("tr");
 id = parseInt(fila.find('td:eq(0)').text());//id
 nombrecur = fila.find('td:eq(1)').text();//titulo
 imgcur = fila.find('td:eq(6)').text();//pais = fila.find('td:eq(2)').text(); lo quite porque si la persona va a editar le vamos a poner el campo vacio //imagen
 descripCur = fila.find('td:eq(2)').text();//parseInt(fila.find('td:eq(3)').text()); //fecha
 inicioCur = fila.find('td:eq(3)').text();//contenido
 duracCur = fila.find('td:eq(4)').text();//
 horarioCur = fila.find('td:eq(5)').text();//
 
 nomImg= $.trim(imgcur);
 //console.log(nomImg);
 //console.log(id);

 $("#titulo-cur").val(nombrecur);//titulo
 $(".card-img-top").attr("src", "images/"+ nomImg); //devolviendo imagen destacada
 $("#descrip-cur").val(descripCur);//descripcion
 $("#inicio-cur").val(inicioCur);//contenido 
 $("#duracion-cur").val(duracCur);//contenido 
 $("#horario-cur").val(horarioCur);//contenido 
 

 opcion = 5; //editar
 imagen = nomImg; 
 
 $(".modal-header").css("background-color", "#007bff");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Editar Curso");            
 $("#modalCurso").modal("show");  
 
});

//botón BORRAR
$(document).on("click", ".btnBorrarCurso", function(){    
 fila = $(this);
 id = parseInt($(this).closest("tr").find('td:eq(0)').text());
 opcion = 6 //borrar
 var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
 if(respuesta){
     $.ajax({
         url: "bd/crud.php",
         type: "POST",
         dataType: "json",
         data: {opcion:opcion, id:id},
         success: function(){
           // tablaPersonas.row(fila.parents('tr')).remove().draw();
            window.location.reload();
         }
     });
 }   
});

//botón Cancelar
$(document).on("click", "#btnCancelarCurso", function(){    
$("#modalCurso").modal("hide");  
});

//Funcion para enviar datos de editar y agregar
$("#formCurso").submit(function(e){
e.preventDefault();    
tituloCur = $.trim($("#titulo-cur").val()); //nombre
//pais = $.trim($("#pais").val()); //pais = imagenCur
descripCur = $.trim($("#descrip-cur").val()); //otro
inicioCur = $.trim($("#inicio-cur").val());    //edad 
duracCur = $.trim($("#duracion-cur").val());    //
horarioCur = $.trim($("#horario-cur").val());    //

//nombreArch = $.trim($("#archivo").val());

$.ajax({
 url: "bd/crud.php",
 type: "POST",
 dataType: "json",
 data: {tituloCur:tituloCur, imagen:imagen, inicioCur:inicioCur, descripCur:descripCur, duracCur:duracCur, horarioCur:horarioCur, id:id, opcion:opcion},
 success: function(data){  
     console.log(data);
     /*id = data[0].id;            
     tituloCur = data[0].tituloCur;
     imagenCur = data[0].imagenCur;
     inicioCur = data[0].inicioCur;
     descripCur = data[0].descripCur;
     duracCur = data[0].duracCur;
     horarioCur = data[0].horarioCur;
     if(opcion == 1){tablaPersonas.row.add([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}
     else{tablaPersonas.row(fila).data([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}*/     
     
     window.location.reload();
 }        
});
$("#modalCurso").modal("hide");    

}); 


//----------------------------------------> TALLER
tablaTaller = $("#tablaTaller").DataTable({
    "columnDefs":[{
     "targets": -1,
     "data":null,
     "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarTaller'>Editar</button><button class='btn btn-danger btnBorrarTaller'>Borrar</button></div></div>"  
    }],
     
     //Para cambiar el lenguaje a español
 "language": {
         "lengthMenu": "Mostrar _MENU_ registros",
         "zeroRecords": "No se encontraron resultados",
         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
         "sSearch": "Buscar:",
         "oPaginate": {
             "sFirst": "Primero",
             "sLast":"Último",
             "sNext":"Siguiente",
             "sPrevious": "Anterior"
          },
          "sProcessing":"Procesando...",
     }
 });
 
$("#btnNuevoTaller").click(function(){
 $("#formTaller").trigger("reset");
 $(".card-img-top").attr("src", "images/image-fondo.png"); //devolviendo imagen destacada
 imagen = "image-fondo.png"; //imagen por defecto
 $(".modal-header").css("background-color", "#28a745");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Nuevo Taller");            
 $("#modalTaller").modal("show");        
 id=null;
 opcion = 7; //alta
});    
 
//botón EDITAR    
$(document).on("click", ".btnEditarTaller", function(){
 fila = $(this).closest("tr");
 id = parseInt(fila.find('td:eq(0)').text());//id
 nombreTal = fila.find('td:eq(1)').text();//titulo
 imgTal = fila.find('td:eq(6)').text();//pais = fila.find('td:eq(2)').text(); lo quite porque si la persona va a editar le vamos a poner el campo vacio //imagen
 descripTal = fila.find('td:eq(2)').text();//parseInt(fila.find('td:eq(3)').text()); //fecha
 inicioTal = fila.find('td:eq(3)').text();//contenido
 duracTal = fila.find('td:eq(4)').text();//
 horarioTal = fila.find('td:eq(5)').text();//
 
 nomImg= $.trim(imgTal);
 //console.log(nomImg);
 //console.log(id);

 $("#titulo-tal").val(nombreTal);//titulo
 $(".card-img-top").attr("src", "images/"+ nomImg); //devolviendo imagen destacada
 $("#descrip-tal").val(descripTal);//descripcion
 $("#inicio-tal").val(inicioTal);//contenido 
 $("#duracion-tal").val(duracTal);//contenido 
 $("#horario-tal").val(horarioTal);//contenido 
 

 opcion = 8; //editar
 imagen = nomImg; 
 
 $(".modal-header").css("background-color", "#007bff");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Editar Taller");            
 $("#modalTaller").modal("show");  
 
});

//botón BORRAR
$(document).on("click", ".btnBorrarTaller", function(){    
 fila = $(this);
 id = parseInt($(this).closest("tr").find('td:eq(0)').text());
 opcion = 9 //borrar
 var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
 if(respuesta){
     $.ajax({
         url: "bd/crud.php",
         type: "POST",
         dataType: "json",
         data: {opcion:opcion, id:id},
         success: function(){
            //tablaPersonas.row(fila.parents('tr')).remove().draw();
            window.location.reload();
         }
     });
 }   
});

//botón Cancelar
$(document).on("click", "#btnCancelarTaller", function(){    
$("#modalTaller").modal("hide");  
});

//Funcion para enviar datos de editar y agregar
$("#formTaller").submit(function(e){
e.preventDefault();    
tituloTal = $.trim($("#titulo-tal").val()); //nombre
//pais = $.trim($("#pais").val()); //pais = imagenTal
descripTal = $.trim($("#descrip-tal").val()); //otro
inicioTal = $.trim($("#inicio-tal").val());    //edad 
duracTal = $.trim($("#duracion-tal").val());    //
horarioTal = $.trim($("#horario-tal").val());    //

//nombreArch = $.trim($("#archivo").val());

$.ajax({
 url: "bd/crud.php",
 type: "POST",
 dataType: "json",
 data: {tituloTal:tituloTal, imagen:imagen, inicioTal:inicioTal, descripTal:descripTal, duracTal:duracTal, horarioTal:horarioTal, id:id, opcion:opcion},
 success: function(data){  
     console.log(data);
     /*id = data[0].id;            
     tituloCur = data[0].tituloCur;
     imagenCur = data[0].imagenCur;
     inicioCur = data[0].inicioCur;
     descripCur = data[0].descripCur;
     duracCur = data[0].duracCur;
     horarioCur = data[0].horarioCur;
     if(opcion == 1){tablaPersonas.row.add([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}
     else{tablaPersonas.row(fila).data([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}*/     
     
     window.location.reload();
 }        
});
$("#modalTaller").modal("hide");    

}); 


//--------------------------------------------------------------------EDICION>>>>>  // SLIDER

tablaSlider = $("#tablaSlider").DataTable({
    "columnDefs":[{
     "targets": -1,
     "data":null,
     "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarSlider'>Editar</button><button class='btn btn-danger btnBorrarSlider'>Borrar</button></div></div>"  
    }],
     
     //Para cambiar el lenguaje a español
 "language": {
         "lengthMenu": "Mostrar _MENU_ registros",
         "zeroRecords": "No se encontraron resultados",
         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
         "sSearch": "Buscar:",
         "oPaginate": {
             "sFirst": "Primero",
             "sLast":"Último",
             "sNext":"Siguiente",
             "sPrevious": "Anterior"
          },
          "sProcessing":"Procesando...",
     }
 });
 
$("#btnNuevoSlider").click(function(){
 $("#formSlider").trigger("reset");
 $(".card-img-top").attr("src", "images/image-fondo.png"); //devolviendo imagen destacada
 imagen = "image-fondo.png"; //imagen por defecto
 $(".modal-header").css("background-color", "#28a745");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Nuevo Slider");            
 $("#modalSlider").modal("show");        
 id=null;
 opcion = 10; //insertar
});    
 
//botón EDITAR    
$(document).on("click", ".btnEditarSlider", function(){
 fila = $(this).closest("tr");
 id = parseInt(fila.find('td:eq(0)').text());//id
 imgSld = fila.find('td:eq(1)').text();//titulo
 tituloSld = fila.find('td:eq(2)').text();//pais = fila.find('td:eq(2)').text(); lo quite porque si la persona va a editar le vamos a poner el campo vacio //imagen
 descripSld = fila.find('td:eq(3)').text();//parseInt(fila.find('td:eq(3)').text()); //fecha
 enlaceSld = fila.find('td:eq(4)').text();//contenido
 
 
 nomImg= $.trim(imgSld);
 //console.log(nomImg);
 //console.log(id);

 $("#titulo-sld").val(tituloSld);//titulo
 $(".card-img-top").attr("src", "images/"+ nomImg); //devolviendo imagen destacada
 $("#enlace-sld").val(enlaceSld);//descripcion
 $("#descrip-sld").val(descripSld);//contenido 

 

 opcion = 11; //editar
 imagen = nomImg; 
 
 $(".modal-header").css("background-color", "#007bff");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Editar Slider");            
 $("#modalSlider").modal("show");  
 
});

//botón BORRAR
$(document).on("click", ".btnBorrarSlider", function(){    
 fila = $(this);
 id = parseInt($(this).closest("tr").find('td:eq(0)').text());
 opcion = 12 //borrar
 var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
 if(respuesta){
     $.ajax({
         url: "bd/crud.php",
         type: "POST",
         dataType: "json",
         data: {opcion:opcion, id:id},
         success: function(){
           // tablaPersonas.row(fila.parents('tr')).remove().draw();
            window.location.reload();
         }
     });
 }   
});

//botón Cancelar
$(document).on("click", "#btnCancelarSlider", function(){    
$("#modalSlider").modal("hide");  
});

//Funcion para enviar datos de editar y agregar
$("#formSlider").submit(function(e){
e.preventDefault();    
tituloSld = $.trim($("#titulo-sld").val()); 
//pais = $.trim($("#pais").val()); //pais = imagenCur
enlaceSld = $.trim($("#enlace-sld").val()); 
descripSld = $.trim($("#descrip-sld").val());  


//nombreArch = $.trim($("#archivo").val());

$.ajax({
 url: "bd/crud.php",
 type: "POST",
 dataType: "json",
 data: {tituloSld:tituloSld, imagen:imagen, enlaceSld:enlaceSld, descripSld:descripSld, id:id, opcion:opcion},
 success: function(data){  
     console.log(data);
     /*id = data[0].id;            
     tituloCur = data[0].tituloCur;
     imagenCur = data[0].imagenCur;
     inicioCur = data[0].inicioCur;
     descripCur = data[0].descripCur;
     duracCur = data[0].duracCur;
     horarioCur = data[0].horarioCur;
     if(opcion == 1){tablaPersonas.row.add([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}
     else{tablaPersonas.row(fila).data([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}*/     
     
     window.location.reload();
 }        
});
$("#modalSlider").modal("hide");    

}); 


//--------------------------------------------------------------------EDICION>>>>>  // GALERIA

tablaGaleria = $("#tablaGaleria").DataTable({
    "columnDefs":[{
     "targets": -1,
     "data":null,
     "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarGaleria'>Editar</button><button class='btn btn-danger btnBorrarGaleria'>Borrar</button></div></div>"  
    }],
     
     //Para cambiar el lenguaje a español
 "language": {
         "lengthMenu": "Mostrar _MENU_ registros",
         "zeroRecords": "No se encontraron resultados",
         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
         "sSearch": "Buscar:",
         "oPaginate": {
             "sFirst": "Primero",
             "sLast":"Último",
             "sNext":"Siguiente",
             "sPrevious": "Anterior"
          },
          "sProcessing":"Procesando...",
     }
 });
 
$("#btnNuevoGaleria").click(function(){
 $("#formGaleria").trigger("reset");
 $(".card-img-top").attr("src", "images/image-fondo.png"); //devolviendo imagen destacada
 imagen = "image-fondo.png"; //imagen por defecto
 $(".modal-header").css("background-color", "#28a745");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Nueva Imagen");            
 $("#modalGaleria").modal("show");        
 id=null;
 opcion = 13; //insertar
});    
 
//botón EDITAR    
$(document).on("click", ".btnEditarGaleria", function(){
 fila = $(this).closest("tr");
 id = parseInt(fila.find('td:eq(0)').text());//id
 imgGal = fila.find('td:eq(1)').text();//titulo
 tituloGal = fila.find('td:eq(2)').text();//pais = fila.find('td:eq(2)').text(); lo quite porque si la persona va a editar le vamos a poner el campo vacio //imagen
 
 nomImg= $.trim(imgGal);
 //console.log(nomImg);
 //console.log(id);


 $(".card-img-top").attr("src", "images/"+ nomImg); //devolviendo imagen destacada
 $("#titulo-gal").val(tituloGal);//descripcion


 opcion = 14; //editar
 imagen = nomImg; 
 
 $(".modal-header").css("background-color", "#007bff");
 $(".modal-header").css("color", "white");
 $(".modal-title").text("Editar Imagen");            
 $("#modalGaleria").modal("show");  
 
});

//botón BORRAR
$(document).on("click", ".btnBorrarGaleria", function(){    
 fila = $(this);
 id = parseInt($(this).closest("tr").find('td:eq(0)').text());
 opcion = 15 //borrar
 var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
 if(respuesta){
     $.ajax({
         url: "bd/crud.php",
         type: "POST",
         dataType: "json",
         data: {opcion:opcion, id:id},
         success: function(){
           // tablaPersonas.row(fila.parents('tr')).remove().draw();
            window.location.reload();
         }
     });
 }   
});

//botón Cancelar
$(document).on("click", "#btnCancelarGaleria", function(){    
$("#modalGaleria").modal("hide");  
});

//Funcion para enviar datos de editar y agregar
$("#formGaleria").submit(function(e){
e.preventDefault();    
tituloGal = $.trim($("#titulo-gal").val()); 


$.ajax({
 url: "bd/crud.php",
 type: "POST",
 dataType: "json",
 data: {tituloGal:tituloGal, imagen:imagen, id:id, opcion:opcion},
 success: function(data){  
     console.log(data);
     /*id = data[0].id;            
     tituloCur = data[0].tituloCur;
     imagenCur = data[0].imagenCur;
     inicioCur = data[0].inicioCur;
     descripCur = data[0].descripCur;
     duracCur = data[0].duracCur;
     horarioCur = data[0].horarioCur;
     if(opcion == 1){tablaPersonas.row.add([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}
     else{tablaPersonas.row(fila).data([id,tituloCur,descripCur,inicioCur,duracCur,horarioCur,imagenCur]).draw();}*/     
     
     window.location.reload();
 }        
});
$("#modalGaleria").modal("hide");    

});  



});