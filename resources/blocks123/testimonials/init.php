<?php

/**
 * Register block script
 */
function qntm_register_flickity_script()
{
    wp_register_script('qntm-flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', ['jquery']);
}
add_action('init', 'qntm_register_flickity_script');
