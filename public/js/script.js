$('#registro').click(function(){
	var route = "/usuario"
	var dato = $('#email').val();
	alert('adsad');
	$.ajax({
		url: route;
		type: 'POST',
		dataType: 'json',
		data:{email: dato}
	});
});