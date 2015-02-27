$(document).ready(function(){

	function setHeights(){
		var logoHeight = $('#logo').outerHeight();
		
		$('header').css('height', logoHeight);

		var	topPad = $('header').outerHeight(),
			logoHeight = $('#logo').outerHeight(),
			clHeight = $(window).height(),
			bottomPad = $('footer').outerHeight();

		$('#navcontainer').css('height', logoHeight);

		$('main').css({
			'padding-top' : topPad,
			'min-height' : clHeight,
			'padding-bottom' : bottomPad
		});
	}

	$('#logo').on('load', setHeights());

	window.addEventListener('resize', setHeights, false);

	$('#mobile-nav ul.off-canvas-list').css('margin-top', window.pageYOffset + "px");
	$('.right-submenu').css('margin-top', window.pageYOffset + 'px');

	window.addEventListener('scroll', function(){
		$('#mobile-nav ul.off-canvas-list').css('margin-top', window.pageYOffset + "px");
		$('.right-submenu').css('margin-top', window.pageYOffset + "px");
	}, false);

	$('#metadesc').keyup(function(){
		$('#wordcount').html(150 - $(this).val().length);
	});

	$('.product').each(function(){
		$(this).find('input').keyup(function(){
			totalPrice = 0;
			var arrPrice = jQuery.makeArray();
			inputFields = $(this).parent().find('input');
			priceModifiers = $(this).parent().find('.mod');
			//console.log(priceModifiers);
			for(i=0; i<inputFields.length; i++){
				arrPrice.push( ($(inputFields[i]).val() * parseInt($(priceModifiers[i]).html())) );
				//console.log(arrPrice[i]);
				totalPrice = totalPrice + arrPrice[i];
				console.log($(this).val());
				if( totalPrice.toFixed(2) == "NaN" || $(inputFields[i]).val() % 1){
					$(this).parent().find('.total').html("Please enter a whole number.");
				}else{
					$(this).parent().find('.total').html('$' + (totalPrice).toFixed(2));
				}
				/*$(this).parent().find('.total').html('$' + ($(this).val() * parseInt($(this).parent().find('.mod').html())).toFixed(2));*/
			}
		});
	});

	$(window).bind('load', function(){
		setHeights();
	});

});