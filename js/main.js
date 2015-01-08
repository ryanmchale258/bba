(function(){

	var theHeader = document.querySelector('header'),
		theLogo = document.querySelector('#logo'),
		navWrap = document.querySelector('#navcontainer'),
		ocMain = document.querySelector('main'),
		mobNav = document.querySelector('#mobile-nav ul.off-canvas-list');

	var logoHeight = theLogo.offsetHeight;
	
	theHeader.style.height = logoHeight;

	var	topPad = theHeader.offsetHeight,
		logoHeight = theLogo.offsetHeight,
		clHeight = window.innerHeight;

	navWrap.style.height = logoHeight + "px";

	ocMain.style.paddingTop = topPad + "px";
	ocMain.style.minHeight = clHeight + "px";

	window.addEventListener('resize', function(){
		var logoHeight = theLogo.offsetHeight;
		
		theHeader.style.height = logoHeight;

		var	topPad = theHeader.offsetHeight,
			logoHeight = theLogo.offsetHeight,
			clHeight = window.innerHeight;

		navWrap.style.height = logoHeight + "px";

		ocMain.style.paddingTop = topPad + "px";
		ocMain.style.minHeight = clHeight + "px";
	}, false);

	window.addEventListener('scroll', function(){
		mobNav.style.marginTop = window.pageYOffset + "px";
	}, false);


})();