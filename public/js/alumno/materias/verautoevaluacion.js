function recorrerRadioButtons(){
    var listaDias = '';
    $("input[class=radio-b]").each(function (index) { 
       if($(this).is(':checked')){
        listaDias += $(this).val() + ',';
       }
    });
    listaDias = listaDias.substr(0,listaDias.length-1);
    return listaDias;
  }


$('#btn-terminar').click(function(){
  alert('sad');
 $arrayPreguntasRespuestas = recorrerRadioButtons();
  $.ajax({
      type: 'GET',
      url: $varurlterminar,
      data: {arrayprueba: $arrayPreguntasRespuestas},
      success:function(response){
        alert('asdasd');
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
    });
});