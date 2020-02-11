$(document).ready(function(){
	var imgItems = $('.slider li').length; // Numero de Slides
	var imgPos = 1;

	// Agregando paginacion --
	for(i = 1; i <= imgItems; i++){
		$('#navegacao').append('<li><span class="fa fa-circle"></span></li>');
	} 
	//------------------------

	$('.slider li').hide(); //  Ocultando todas as imagens
	$('.slider li:first').show(); // Mostrando a imagem selecionada
	$('#navegacao li:first').css({'color': '#CD6E2E'}); // Dado estilo a primeira imagem do slide

	// Ejecutamos todas las funciones
	$('#navegacao li').click(navegacao);
	$('#direita img').click(nextSlider);
	$('#esquerda img').click(prevSlider);


	setInterval(function(){
		nextSlider();
	}, 4000);

	// FUNCIONES =========================================================

	function navegacao(){
		var navegacaoPos = $(this).index() + 1; // Posição da proxima pagina

		$('.slider li').hide(); // Ocultando todas as imagens
		$('.slider li:nth-child('+ navegacaoPos +')').fadeIn(); // Mostrando a imagem selecionada
		// Mudando as cores, deixando a imagem selecionada em destaque
		$('#navegacao li').css({'color': '#858585'});
		$(this).css({'color': '#CD6E2E'});

		imgPos = navegacaoPos;

	}

	function nextSlider(){
		if( imgPos >= imgItems){imgPos = 1;} 
		else {imgPos++;}

		$('#navegacao li').css({'color': '#858585'});
		$('#navegacao li:nth-child(' + imgPos +')').css({'color': '#CD6E2E'});

		$('#slider li').hide(); // Ocultando todas as imagens
		$('#slider li:nth-child('+ imgPos +')').fadeIn(); // Mostrando a imagem selecionada

	}

	function prevSlider(){
		if( imgPos <= 1){imgPos = imgItems;} 
		else {imgPos--;}

		$('#navegacao li').css({'color': '#858585'});
		$('#navegacao li:nth-child(' + imgPos +')').css({'color': '#CD6E2E'});

		$('.slider li').hide(); // Ocultando todas as imagens
		$('.slider li:nth-child('+ imgPos +')').fadeIn(); // Mostrando a imagem selecionada
	}

});