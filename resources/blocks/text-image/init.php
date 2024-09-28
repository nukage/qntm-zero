<?php


add_action('init', function () use ($block) {
    wp_register_style('qntm-' . $block, get_template_directory_uri() . '/resources/blocks/' . $block . '/' . $block . '.dist.css');
});
