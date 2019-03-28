$(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip(); 
            $('#loading-image').hide();
            $('.submenu').click(function() {
            $('.submenu').siblings('a').removeClass('active');
            $(this).addClass('active');

    });
       });
        //boton previo
        $("#previo").click(function() { 
                if($('.active').hasClass('lectura') || $('.active').hasClass('autoevaluacion')){
                  var elemento = $('.active');
                  elemento.prev().click();
                };
               
               
            });
        $("#previovideo").click(function() { 
             
              var enlace = $('#previovideo').attr('data-tema-previo');
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "false" || $( 'a[href*='+enlace+']' ).attr('aria-expanded') === undefined){
                $( 'a[href*='+enlace+']' ).click();
              }
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "true"){
                $( "#"+enlace+" a:last-child" ).click();
              }
            });
        //función de click en el modulo previo y en la ultima autoevaluación
        $("#moduloprevio").click(function() { 
              var enlace = $('#moduloprevio').attr('data-modulo-previo');
              var enlaceUltimoTema = $('#moduloprevio').attr('data-modulo-tema-previo');
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "false" || $( 'a[href*='+enlace+']' ).attr('aria-expanded') === undefined){
                $( 'a[href*='+enlace+']' ).click();
                $( 'a[href*='+enlaceUltimoTema+']' ).click();
              }
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "true"){
                $( "#"+enlaceUltimoTema+" a:last-child" ).click();
              }
            });
        $("#siguiente").click(function() { 
                if($('.active').hasClass('video') || $('.active').hasClass('lectura')){
                  var elemento = $('.active');
                  elemento.next().click();
                };
               
               
            });

          ///boton siguiente de autoevaluacion: despliega la siguiente unidad y abre el primer tema.
       
          $("#siguienteautoevaluacion").click(function() {
              var enlace = $('#siguienteautoevaluacion').attr('data-autoevaluacion');
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "false" || $( 'a[href*='+enlace+']' ).attr('aria-expanded') === undefined){
                $( 'a[href*='+enlace+']' ).click();
              }
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "true"){
                $( "#"+enlace+" a:first-child" ).click();
              }
            });

            $("#siguientemodulo").click(function() {
              var enlace = $('#siguientemodulo').attr('data-modulo');
              var enlacePrimerTema = 'contenido' + $('#siguientemodulo').attr('data-modulo-tema');
              
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "false" || $( 'a[href*='+enlace+']' ).attr('aria-expanded') === undefined){
                $( 'a[href*='+enlace+']' ).click();
               if ($( 'a[href*='+enlacePrimerTema+']' ).attr('aria-expanded') === "false" || $( 'a[href*='+enlacePrimerTema+']' ).attr('aria-expanded') === undefined ){

                $( 'a[href*='+enlacePrimerTema+']' ).click();
                };
                $( "#"+enlacePrimerTema+" a:first-child" ).click();
              }
              if($( 'a[href*='+enlace+']' ).attr('aria-expanded') === "true"){
                $( "#"+enlacePrimerTema+" a:first-child" ).click();
                
              }
            });


        $('.list-group-item').unbind('click');
        $(".list-group-item").click(  function (){
         if($(this).hasClass('video')){
            var temaid = $(this).parent().attr('id');
            $.ajax({
            async: false,
             type: 'get',
             url: varurl,
            data: { temaid: temaid.substr(9), tipo: 'video'},
             success:function(response){
                $('#tema-contenido').empty().html(response);
                 }
            })
            .done(function() {
             console.log("success");
                })
              .fail(function() {
                 console.log("error");
               })
            .always(function() {
             console.log("complete");
             $('#loading-image').hide();
               });
            }

            if($(this).hasClass('lectura')){
            var temaid = $(this).parent().attr('id');
            $.ajax({
              async: false,
             type: 'get',
             url: varurl,
              data: { temaid: temaid.substr(9), tipo: 'lectura'},
             success:function(response){
              
                $('#tema-contenido').empty().html(response);
                 }
            })
            .done(function() {
             console.log("success");
                })
              .fail(function() {
                 console.log("error");
               })
            .always(function() {
             console.log("complete");
             $('#loading-image').hide();
               });
            }


            if($(this).hasClass('autoevaluacion')){

            var temaid = $(this).parent().attr('id');
            var autoevaluacionid = $(this).attr('id');
           
            $.ajax({

             type: 'get',

             url: varurl,
              data: { autoevaluacion: autoevaluacionid, tipo: 'autoevaluacion', temaid: temaid.substr(9)},
             success:function(response){
              
                $('#tema-contenido').empty().html(response);
                 }
            })
            .done(function() {
             console.log("success");
                })
              .fail(function() {
                 console.log("error");
               })
            .always(function() {
             console.log("complete");
             $('#loading-image').hide();
               });
            }
           });

$('.sidebar-toggle').click(function(){

  $('#contenedor-materia').slideToggle("fast", function() {
      if($(this).is(':hidden')) { 
        
         $("#tema-contenido").removeClass("col-lg-8");
        $("#tema-contenido").removeClass("col-md-8");
        $("#tema-contenido").removeClass("col-lg-offset-3");
        $("#tema-contenido").removeClass("col-md-offset-3");
        $("#tema-contenido").addClass('col-lg-12');
        $("#tema-contenido").addClass('col-md-12');
        $(".content").removeClass("container-fluid");
        $(".content").addClass("container");
    }
       else {
        $(".content").removeClass("container");
        $(".content").addClass("container-fluid");
         $("#tema-contenido").removeClass('col-lg-12');
         $("#tema-contenido").removeClass('col-md-12');
         $("#tema-contenido").addClass("col-md-8");
         $("#tema-contenido").addClass("col-lg-8");
          $("#tema-contenido").addClass("col-lg-offset-3");
          $("#tema-contenido").addClass("col-md-offset-3");
        }

  });
  
});