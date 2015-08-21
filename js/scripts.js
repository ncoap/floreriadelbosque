var inicio=function () {
	
	$("#formulario").submit(function(evento){
		//alert("se omitio el evento");
		$.get('../controlador/grabapedido.php',function(e){
			
		}).fail(function (){
			evento.preventDefault();	
		});
	});
        
}	
$(document).on('ready',inicio);