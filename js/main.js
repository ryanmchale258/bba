(function(){

	var theHeader = document.querySelector('header'),
		theLogo = document.querySelector('#logo'),
		navWrap = document.querySelector('#navcontainer'),
		ocMain = document.querySelector('main'),
		mobNav = document.querySelector('#mobile-nav ul.off-canvas-list'),
		subNav = $('.right-submenu'),
		theFooter = document.querySelector('footer');

	var logoHeight = theLogo.offsetHeight;
	
	theHeader.style.height = logoHeight;

	var	topPad = theHeader.offsetHeight,
		logoHeight = theLogo.offsetHeight,
		clHeight = window.innerHeight,
		bottomPad = theFooter.offsetHeight;

	navWrap.style.height = logoHeight + "px";

	ocMain.style.paddingTop = topPad + "px";
	ocMain.style.minHeight = clHeight + "px";
	ocMain.style.paddingBottom = bottomPad + "px";

	window.addEventListener('resize', function(){
		var logoHeight = theLogo.offsetHeight;
		
		theHeader.style.height = logoHeight;

		var	topPad = theHeader.offsetHeight,
			logoHeight = theLogo.offsetHeight,
			clHeight = window.innerHeight,
			bottomPad = theFooter.offsetHeight;

		navWrap.style.height = logoHeight + "px";

		ocMain.style.paddingTop = topPad + "px";
		ocMain.style.minHeight = clHeight + "px";
		ocMain.style.paddingBottom = bottomPad + "px";
	}, false);

	mobNav.style.marginTop = window.pageYOffset + "px";
	subNav.css('margin-top', window.pageYOffset + 'px');

	window.addEventListener('scroll', function(){
		mobNav.style.marginTop = window.pageYOffset + "px";
		subNav.css('margin-top', window.pageYOffset + 'px');
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
			console.log(priceModifiers);
			for(i=0; i<inputFields.length; i++){
				arrPrice.push( ($(inputFields[i]).val() * parseInt($(priceModifiers[i]).html())) );
				//console.log(arrPrice[i]);
				totalPrice = totalPrice + arrPrice[i];
				//console.log(totalPrice);
				$(this).parent().find('.total').html('$' + (totalPrice).toFixed(2));
				/*$(this).parent().find('.total').html('$' + ($(this).val() * parseInt($(this).parent().find('.mod').html())).toFixed(2));*/
			}
		});
	});

})();