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
			for(i=0; i<inputFields.length; i++){
				arrPrice.push( ($(inputFields[i]).val() * parseInt($(priceModifiers[i]).html())) );
				totalPrice = totalPrice + arrPrice[i];
				console.log($(this).val());
				if( totalPrice.toFixed(2) == "NaN" || $(inputFields[i]).val() % 1){
					$(this).parent().find('.total').html("Please enter a whole number.");
				}else{
					$(this).parent().find('.total').html('$' + (totalPrice).toFixed(2));
				}
			}
		});
	});

	var newPrice,
		discountCount,
		discount = 0,
		totalPrice;

	$('.product').each(function(){
		$(this).find('input:checkbox').click(function(){
			var n = $(this).parent().parent().find( "input:checked" ).length;
			
			if(n >= 3){
				if(n % 3 == 0){
					discountCount = n / 3;
					discount = discountCount * 5;
					totalPrice = (totalPrice - discount);
				}
				totalPrice = (7.50 * n) - discount;
				$(this).parent().parent().find('.total').html('$' + (totalPrice).toFixed(2));
			}else{
				totalPrice = (7.50 * n);
				$(this).parent().parent().find('.total').html('$' + (totalPrice).toFixed(2));
			}
			console.log(discount);
		});
	});

	$(window).bind('load', function(){
		setHeights();
	});

});