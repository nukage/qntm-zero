<?php

/********************************
        USEFUL UTILITIES
 ********************************/


/************* SIMPLE RENDER ACF LINKS *************/

/**
 * Generates an HTML link element based on the provided Advanced Custom Fields (ACF) link data.
 *
 * @param string $elem The HTML element to use for the link (defaults to 'a' if not provided).
 * @param string $class The CSS class to apply to the link element.
 * @param array $link The ACF link data, containing 'url', 'title', and 'target' keys.
 * @param string $icon The CSS class for the icon to display after the link text (optional).
 * @param string $content The link text content (optional, defaults to the link title if not provided).
 *
 * @return string The generated HTML link element.
 */
function qntm_acf_link($elem, $class, $link, $icon, $content)
{

    // var_dump($link);
    if (!$link) {
        return;
    }

    if (!$content) {

        if ($icon) {
            $iconHtml =  $icon;
        } else {
            $iconHtml = '';
        }

        $content =  $link['title'] . $iconHtml;
    }
    // $screenreader = '<span class="screen-reader-text">' . $link['title'] . '</span>';
    $screenreader = '';

    $elem = $elem ? $elem : 'a';
    $link_target = $link['target'] ? $link['target'] : '_self';
    $html = '<' . $elem . ' class="' . $class . '" href="' . $link['url'] . '" target="' . esc_attr($link_target) . '">' . $content . $screenreader . '</' . $elem . '>';

    return $html;
}



/**
 * Create an ACF field for selecting a menu
 */
function namespace_populate_menus_field(array $field): array
{

    // Reset choices
    $field['choices'] = [];

    // Get all registered menus and add them to the field with slug as value and name as label
    foreach (wp_get_nav_menus() as $menu) {
        $field['choices'][$menu->slug] = $menu->name;
    }

    // Sort choices alphabetically
    ksort($field['choices']);

    return $field;
}
add_filter('acf/load_field/name=navigation_menu', 'namespace_populate_menus_field', 10, 1);
