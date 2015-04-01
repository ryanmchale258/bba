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
					$(this).parent().find('.total').html((totalPrice).toFixed(2));
				}
			}
			updateTotal();
		});
	});

	var newPrice,
		discountCount,
		discount = 0,
		totalPrice;

	$('.product').each(function(){
		$(this).find('input:checkbox').click(function(){
			var n = $(this).parent().parent().find( "input:checked" ).length;
			var p = $(this).parent().parent().find('.individualPrice').html();
			var d = $(this).parent().parent().find('.discount').html();
			var r = $(this).parent().parent().find('.discountReq').html();
			
			if(n >= r){
				if(n % r == 0){
					discountCount = n / r;
					discount = discountCount * d;
					totalPrice = (totalPrice - discount);
				}
				totalPrice = (p * n) - discount;
				$(this).parent().parent().find('.total').html((totalPrice).toFixed(2));
			}else{
				totalPrice = (p * n);
				$(this).parent().parent().find('.total').html((totalPrice).toFixed(2));
			}
			//console.log(discount);
			updateTotal();
		});
	});

	function updateTotal(){
		var t = document.querySelectorAll('.total');
		var st = 0;
		for(i=0; i<t.length; i++){
			console.log(t[i].innerHTML);
			var nt = parseFloat(t[i].innerHTML);
			st = nt + st;
		}
		$('.subtotal').html('$' + st.toFixed(2));
	}

	$(window).bind('load', function(){
		setHeights();
	});

});