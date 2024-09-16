<?php

/**
 * Register block script
 */
function qntm_register_form_script()
{
    wp_register_script('qntm-form', get_template_directory_uri() . '/resources/blocks/form/form.js', ['jquery']);
}
add_action('init', 'qntm_register_form_script');
