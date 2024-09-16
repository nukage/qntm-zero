 
jQuery(document).ready(function ($) {

	$(".qntm-pathways-accordion__tab").on("click", function (event) {
	   if ($(this).hasClass("qntm-pathways-accordion__tab--active")) {
		   return;
	   }
	   var $ancestor = $(this).closest('.qntm-pathways-accordion');
	   console.log('CLICK')
	   event.preventDefault();
	   var accClass = "qntm-pathways-accordion__tab--active";
	   $ancestor.find(".qntm-pathways-accordion__tab").removeClass(accClass);
	   $(this).addClass(accClass);
   });


}) 