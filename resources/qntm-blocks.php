<?php

/**
 * Load Blocks
 */

$styles = array();
// function qntm_load_blocks()
// {
//     $theme  = wp_get_theme();
//     $blocks = qntm_get_blocks();
//     foreach ($blocks as $block) {

//         if (file_exists(get_template_directory() . '/resources/blocks/' . $block . '/block.json')) {
//             register_block_type(get_template_directory() . '/resources/blocks/' . $block . '/block.json');
//             if (file_exists(get_template_directory()  .  '/resources/blocks/' . $block . '/style.css')) {
//                 echo '3245345345';
//                 echo $block;
//                 wp_register_style('block-' . $block, get_template_directory()  . '/resources/blocks/' . $block . '/style.css');
//                 array_push($styles, 'block-' . $block);
//             }

//             if (file_exists(get_template_directory() . '/resources/blocks/' . $block . '/init.php')) {
//                 include_once get_template_directory() . '/resources/blocks/' . $block . '/init.php';
//             }
//         }
//     }
// }
add_action('init', function () use ($styles) {
    $theme  = wp_get_theme();
    $blocks = qntm_get_blocks();
    foreach ($blocks as $block) {

        if (file_exists(get_template_directory() . '/resources/blocks/' . $block . '/block.json')) {
            register_block_type(get_template_directory() . '/resources/blocks/' . $block . '/block.json');
            if (file_exists(get_template_directory()  .  '/resources/blocks/' . $block . '/style.css')) {
                // wp_register_style('qntm-' . $block, get_template_directory()  . '/resources/blocks/' . $block . '/style.css');
            }
            include get_template_directory() . '/resources/blocks/qntm-block-init.php';
        }
    }
}, 5);

// var_dump($styles);

/**
 * Load ACF field groups for blocks
 */
function qntm_load_acf_field_group($paths)
{
    $blocks = qntm_get_blocks();
    foreach ($blocks as $block) {
        $paths[] = get_template_directory() . '/resources/blocks/' . $block;
    }
    return $paths;
}
add_filter('acf/settings/load_json', 'qntm_load_acf_field_group');

/**
 * Get Blocks
 */
function qntm_get_blocks()
{
    $theme   = wp_get_theme();
    $blocks  = get_option('qntm_blocks');
    $version = get_option('qntm_blocks_version');
    if (empty($blocks) || version_compare($theme->get('Version'), $version) || (function_exists('wp_get_environment_type') && 'production' !== wp_get_environment_type())) {
        $blocks = scandir(get_template_directory() . '/resources/blocks/');
        $blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_base-block')));

        update_option('qntm_blocks', $blocks);
        update_option('qntm_blocks_version', $theme->get('Version'));
    }
    return $blocks;
}
function qntm_remove_blocks()
{
    $current_user = wp_get_current_user();
    $block_visibility = get_user_meta($current_user->ID, 'user_block_visibility', true);
    if ($block_visibility == 'limited') {
        // If user is not named admin, remove blocks - admin can have access to all blocks
        add_filter('allowed_block_types_all', 'qntm_allowed_block_types', 10, 2);
    }
}
qntm_remove_blocks();

function qntm_block_categories($categories)
{

    return array_merge(
        [
            [
                'slug' => 'qntm-blocks',
                'title' => __('QNTM Blocks', 'qntm'),
            ],
            [
                'slug' => 'qntm-page-blocks',
                'title' => 'QNTM Page Blocks',
                'qntm'
            ],
            [
                'slug' => 'qntm-global-blocks',
                'title' => __('QNTM Global Blocks', 'qntm'),
            ],

        ],
        $categories
    );
}
add_action('block_categories_all', 'qntm_block_categories', 10, 2);

function qntm_allowed_block_types($allowed_blocks, $editor_context)
{

    echo '----';
    var_dump($editor_context);
    if (is_object($editor_context) && $editor_context->name == 'core/edit-site') {
        return;
    }

    if (is_object($editor_context) && $editor_context->post->post_type == 'page') {
        echo 'You are edting a page right now.';
        return array(
            'acf/accordion',
            'acf/checkerboard',
            'acf/events',
            'acf/form',
            'acf/icon-list',
            'acf/standard',
            'acf/stats',
            'acf/testimonials',

        );
    } else {
        echo 'You are edting a post  right now.';
        return array(
            'core/heading',
            'core/paragraph',
            'core/list',
            'core/list-item',
            'core/image'
        );
    }
}
