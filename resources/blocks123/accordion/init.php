<?php

/**
 * Register block script
 */
function qntm_register_accordion_script()
{
	wp_register_script('qntm-accordion', get_template_directory_uri() . '/resources/blocks/accordion/accordion.js', ['jquery']);
}
add_action('init', 'qntm_register_accordion_script');

function qntm_register_accordion_style()
{
	wp_register_style('qntm-accordion', get_template_directory_uri() . '/resources/blocks/accordion/accordion.compiled.css');
}
add_action('init', 'qntm_register_accordion_style');
