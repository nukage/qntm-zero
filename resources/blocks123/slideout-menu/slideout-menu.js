jQuery(document).ready(function ($) {




	$(".slideout-nav__toggle").on("click", function () {
		$(this).toggleClass("active");
		$(".slideout-nav").toggleClass("active");
	});
	
 

	$(".slideout-nav__menu > li.menu-item-has-children > ul").slideToggle();

	$(".slideout-nav__menu > li.menu-item-has-children > a").on(
		"click",
		function ($event) {
			$event.preventDefault();
			console.log("CLIICK");
			let active = false;

			// Did you just click an active tab?
			if ($(this).parent().hasClass("active")) {
				active = true;
			}

			// Each click, these always happen
			$(".slideout-nav__menu > li").removeClass("active");
			$(".slideout-nav__menu > li > .sub-menu ").slideUp();

			// If you did not click the active tab, open this tab
			if (!active) {
				$(this).parent().addClass("active");
				$(this).next().slideDown();
			}
			$;
		}
	);

});