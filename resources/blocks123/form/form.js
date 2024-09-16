/*
 *   This code was adapted from the following sources:
 *   https://www.w3.org/WAI/ARIA/apg/patterns/accordion/examples/accordion/
 *
 *   Desc:   Simple accordion pattern example
 */

jQuery(document).ready(function ($) {

     /***********************************************************************
    ADD ANIMATION TO FORMS
    ************************************************************************/

    //FOR GRAVITY FORM INPUTS
    const input = $('.ginput_container input[type="text"],.ginput_container input[type="tel"], .ginput_container input[type="email"], .ginput_container select, .ginput_container textarea, .mainHeader .searchBox input[type="search"]');

    //First check to see if each input on the page has a value yet or not. If it does add the 'focused' class to its parent element.
    input.each(function(i,v){
        if ($(this).val() !== '') {
            $(this).parent().parent().addClass('focused');
        }
    });

    //When clicking into an input add the class of 'focused' to it inputs parent element.
    input.focus(function(){
        $(this).parent().parent().addClass('focused');
    });

    //When clicking out of the input check to see if it has a value or not. If it doesn't have a value remove the 'focused' class from the parent element.
    input.blur(function(){
        console.log('blur');
        const inputValue = $(this).val();

        if (inputValue == "") {
            $(this).parent().parent().removeClass('focused')
        }
    });

    const clear = "<button class='gform-clear'>Clear</button>"
    $('.form-block [type="submit"]').before(clear);

    $('.gform-clear').on('click', function($event) {
        $event.preventDefault();

        $(this).parent().parent().find('input[type="text"], input[type="tel"], input[type="email"], select, textarea').val('').parent().parent().removeClass('focused');
    });


})