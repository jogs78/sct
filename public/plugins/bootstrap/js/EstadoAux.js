$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	
	$('#entregado').click(function() {
		
		var pedido_id=$("#pedido_id").text();
		$.ajax({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
		    type: 'PUT',
			url: 'estados/'+pedido_id,

			success: function(data){
				alert(data.msg);
				location.reload();
			},
           error: function (vjqXHR, vtextStatus, verrorThrown){
               alert(""+verrorThrown);
           }
		});

		//$('.btnsurtir').attr("disabled",true);

		$('input[type="submit"]').attr('disabled','disabled');
     	$('input[type="text"]').keypress(function(){
            if($(this).val() != ''){
               $('input[type="submit"]').removeAttr('disabled');
            }
        });
	});
});

/*
$('#boton .btn').click(function (e) {
    // Si deseas seguir haciendo el submit, ignora la siguiente línea
    e.preventDefault();

   $('.greenPanel button').prop('disabled', true);
});*/

