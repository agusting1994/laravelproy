$(document).ready(function(){
	$('#alert').hide();
	$(".eliminar-usuario").click(function(e){
		var row = $(this).parents('tr');
        var id = $(this).data("id");
        var nombre = $(this).data("nombre");
        var token = $(this).data("token");
        bootbox.confirm({
        message: "¿Estás seguro que deseas eliminar a <strong class='text-danger'>" + nombre + "</strong>?",
         buttons: {
        confirm: {
            label: 'Eliminar',
            className: 'btn btn-danger'
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
            url: "user/delete/"+id,
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function (data)
            {
                row.fadeOut();
                $('#alert').show();
                $('#alert').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 'El usuario <strong>'+ data.nombre + ' ' + data.apellido + '</strong> ha sido eliminado.</div>');
            }
        });
        }
    }
});
    });
});