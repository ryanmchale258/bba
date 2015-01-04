(function(){

	var theHeader = document.querySelector('header'),
		theLogo = document.querySelector('#logoarea img'),
		theFooter = document.querySelector('footer'),
		theContent = document.querySelector('.content-wrap'),

	var logoHeight = theLogo.offsetHeight,
		theHeader.style.height = logoHeight;

	var	topPad = theHeader.offsetHeight,
		logoHeight = theLogo.offsetHeight,
		bottomPad = theFooter.offsetHeight;

		theHeader.style.height = logoHeight;
		theContent.style.paddingTop = topPad + "px";
		theContent.style.paddingBottom = bottomPad + "px";

	window.addEventListener('resize', function(){
		var logoHeight = theLogo.offsetHeight,
			theHeader.style.height = logoHeight;

		var	topPad = theHeader.offsetHeight,
			logoHeight = theLogo.offsetHeight,
			bottomPad = theFooter.offsetHeight;

			theContent.style.paddingTop = topPad + "px";
			theContent.style.paddingBottom = bottomPad + "px";
	});


})();