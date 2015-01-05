(function(){

	var theHeader = document.querySelector('header'),
		theLogo = document.querySelector('#logoarea img'),
		navWrap = document.querySelector('#navcontainer'),
		clHeight = window.innerHeight,
		theContent = document.querySelector('.content-wrap'),
		theFooter = document.querySelector('footer');

	var logoHeight = theLogo.offsetHeight;
	
	theHeader.style.height = logoHeight;

	var	topPad = theHeader.offsetHeight,
		logoHeight = theLogo.offsetHeight,
		bottomPad = theFooter.offsetHeight;

	navWrap.style.height = logoHeight + "px";
	theContent.style.paddingTop = topPad + "px";
	theContent.style.height = clHeight + "px";
	theContent.style.paddingBottom = bottomPad + "px";

	window.addEventListener('resize', function(){
		var logoHeight = theLogo.offsetHeight;
	
		theHeader.style.height = logoHeight;

		var	topPad = theHeader.offsetHeight,
			logoHeight = theLogo.offsetHeight,
			bottomPad = theFooter.offsetHeight;

		navWrap.style.height = logoHeight + "px";
		theContent.style.paddingTop = topPad + "px";
		theContent.style.paddingBottom = bottomPad + "px";
	});


})();