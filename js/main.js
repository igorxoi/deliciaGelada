$(document).ready(function(){
	var imgItems = $('#slider li').length; // Numero de Slides
	var imgPos = 1;

	// Agregando paginacion --
	for(i = 1; i <= imgItems; i++){
		$('#navegacao').append('<li><span class="circulos"></span></li>');//MUDAR ISSO
	} 
	//------------------------

	$('#slider li').hide(); // Ocultanos todos los slides
	$('#slider li:first').show(); // Mostramos el primer slide
	$('#navegacao li:first').css({'color': '#CD6E2E'}); // Damos estilos al primer item de la paginacion

	// Ejecutamos todas las funciones
	$('#navegacao li').click(navegacao);
	$('#direita img').click(proximoSlider);
	$('#esquerda img').click(anteriorSlider);


	setInterval(function(){
		proximoSlider();
	}, 4000);

	// FUNCIONES =========================================================

	function navegacao(){
		var navegacaoPos = $(this).index() + 1; // Posicion de la paginacion seleccionada

		$('#slider li').hide(); // Ocultamos todos los slides
		$('#slider li:nth-child('+ navegacaoPos +')').fadeIn(); // Mostramos el Slide seleccionado

		imgPos = navegacaoPos;

	}

	function proximoSlider(){
		if( imgPos >= imgItems){imgPos = 1;} 
		else {imgPos++;}

		$('#navegacao li:nth-child(' + imgPos +')').css({'color': '#CD6E2E'});

		$('#slider li').hide(); // Ocultamos todos los slides
		$('#slider li:nth-child('+ imgPos +')').fadeIn(); // Mostramos el Slide seleccionado

	}

	function anteriorSlider(){
		if( imgPos <= 1){imgPos = imgItems;} 
		else {imgPos--;}

		$('#navegacao li:nth-child(' + imgPos +')').css({'color': '#CD6E2E'});

		$('#slider li').hide(); // Ocultamos todos los slides
		$('#slider li:nth-child('+ imgPos +')').fadeIn(); // Mostramos el Slide seleccionado
	}

});