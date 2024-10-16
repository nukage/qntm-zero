<?php

/**
 * Register block script
 */
function qntm_register_slideout_menu_script()
{
	wp_register_script('qntm-slideout-menu', get_template_directory_uri() . '/resources/blocks/slideout-menu/slideout-menu.js', ['jquery']);
}
add_action('init', 'qntm_register_slideout_menu_script');

function qntm_register_slideout_menu_style()
{
	wp_register_style('qntm-slideout-menu', get_template_directory_uri() . '/resources/blocks/slideout-menu/slideout-menu.compiled.css');
}
add_action('init', 'qntm_register_slideout_menu_style');


function qntm_slideout_menu_setup()
{
	register_nav_menus(
		array(
			'slideout' => __('Slideout Menu', 'qntm'),

		)
	);
}
add_action('init', 'qntm_slideout_menu_setup');
