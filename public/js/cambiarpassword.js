$(document).ready(function(){
    var id = $('#iduser').data("id");
    $('#actualpass').focus();
    $('#actualpass').focus();
    $('#nuevapassword').val("");
    $('#confirmarnuevapassword').val("");
    $("#guardar-password").click(function(e){
        cambiarPassword();
    });
    $('#guardar-password').keypress(function(e) {
    if(e.which == 13) {
        cambiarPassword();
    }
    });
    $('#actualpass').keypress(function(e) {
    if(e.which == 13) {
        cambiarPassword();
    }
    });

    $('#nuevapassword').keypress(function(e) {
    if(e.which == 13) {
        cambiarPassword();
    }
    });

    $('#confirmarnuevapassword').keypress(function(e) {
    if(e.which == 13) {
        cambiarPassword();
    }
    });




    function cambiarPassword(){

    var token = $('#guardar-password').data("token");
    var actualPass = $('#actualpass').val();
    var nuevaPass = $('#nuevapassword').val();
    var confirmarNuevaPassword = $('#confirmarnuevapassword').val();
    if(actualPass==""){
        $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Debe ingresar la contraseña actual</div>');
        $('#actualpass').focus();
    }else{
        if(nuevaPass==""){
             $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Debe ingresar la nueva contraseña</div>');
             $('#nuevapassword').focus();
             alert('qq' + nuevaPass.length);
        }else{
            if(nuevaPass.length<6 || nuevaPass.length>15){
                $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La nueva contraseña debe contener entre 6 y 15 caracteres</div>');
                $('#nuevapassword').focus();
                }else{
                    if(confirmarNuevaPassword!=nuevaPass){
                          $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La nueva contraseña no coincide con el campo "Repetir nueva contraseña"</div>');
                          $('#nuevapassword').focus();
                    }else{
                         $.ajax(
        {
            url: "/admin/cambiarpassword/"+id+"/"+nuevaPass+"/"+actualPass,
            type: 'PUT',
            dataType: "JSON",
            data: {
                "id": id,
                "nuevapass": nuevaPass,
                "actualpass": actualPass,
                "_method": 'PUT',
                "_token": token,
            },
            success: function (data)
            {
                if(data.message=="Se ha modificado correctamente tu contraseña"){
                    $('#alert').show();
                $('#alert').html('<div class="alert alert-info alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Se ha modificado correctamente tu contraseña</div>');
                $('#actualpass').val("");
                $('#actualpass').focus();
                $('#nuevapassword').val("");
                $('#confirmarnuevapassword').val("");
                }else{
                    if(data.message=="La nueva contraseña debe ser diferente a la actual"){
                        $('#alert').show();
                        $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data.message+'</div>');
                        $('#nuevapassword').val("");
                        $('#confirmarnuevapassword').val("");
                        $('#nuevapassword').focus();
                    }else{
                        $('#alert').show();
                        $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data.message+'</div>');
                        $('#actualpass').val("");
                        $('#actualpass').focus();
                    }
                    
   
                }
            }
        });
                    }
            }
        }
       
    }
    };


});
