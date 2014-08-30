var inicio=function () {
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('./js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
						$("#total").text('Total: '+e);
				});
			}
		}
	});
	$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.producto').remove();
		$.post('./js/eliminar.php',{
			Id:id
		},function(a){
			
			if(a=='0'){
				location.href="./carritocompras.php";
			}
		});

	});
	$("#formulario").submit(function(evento){
		//alert("se omitio el evento");
		$.get('./compra/compras.php',function(e){
			alert("");
		}).fail(function (){
			evento.preventDefault();	
		});
	});
}	

function recargar(){	
	var variable_post="Mi texto recargado";
	$.post("miscript.php", { variable: variable_post }, function(data){
	$("#recargado").html(data);
	});			
}

$(document).on('ready',inicio);