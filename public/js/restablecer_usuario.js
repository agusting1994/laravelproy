$(document).ready(function(){
	$('#alert').hide();
	$(".restablecer-usuario").click(function(e){
		var row = $(this).parents('tr');
        var id = $(this).data("id");
        var nombre = $(this).data("nombre");
        var token = $(this).data("token"); bootbox.confirm({
        message: "¿Estás seguro que deseas recuperar la cuenta de <strong class='text-sucess'>" + nombre + "</strong>?",
    buttons: {
        confirm: {
            label: 'Recuperar',
            className: 'btn btn-success'
        },
        cancel: {
            label: 'Cancelar',
            className: 'btn btn-default'
        }
    },
    callback: function (result) {
        if(result==true){
$.ajax(
        {
            url: "reactivareliminado/"+id,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'GET',
                "_token": token,
            },
            success: function (data)
            {
            	row.fadeOut();
            	$('#alert').show();
                $('#alert').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 'La cuenta del usuario <strong>'+ data.nombre + ' ' + data.apellido + '</strong> ha sido recuperada. Email de acceso: <strong>' + data.email+ '</strong></div>');
            }
            });
        }
    }
});
    });
});