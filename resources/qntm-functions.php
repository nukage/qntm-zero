<?php

/**
 * Requires
 */
require_once 'qntm-blocks.php'; // ACF Gutenberg Blocks
require_once 'qntm-utilities.php'; // Utility Functions that are used in multiple blocks

// function qntm_setup()
// {

//     register_nav_menus(
//         array(
//             'primary' => __('Primary Menu', 'qntm'),
//             'footer' => __('Footer Utility Menu', 'qntm'),
//         )
//     );
// }
// add_action('after_setup_theme', 'qntm_setup');



// function my_theme_add_user_meta()
// {
//     add_user_meta(1, 'user_block_visibility', 'full', true); // Set default to full visibility
// }
// add_action('user_register', 'my_theme_add_user_meta');

// function my_theme_user_profile_update_actions($actions)
// {
//     $actions['user_block_visibility'] = __('Block Visibility', 'my-theme');
//     return $actions;
// }
// add_filter('user_profile_update_actions', 'my_theme_user_profile_update_actions', 10, 1);


function qntm_user_profile_fields($user)
{
    if (current_user_can('administrator')) {
?>
        <h3>Block Visibility</h3>
        <table class="form-table">
            <tr>
                <th><label for="user_block_visibility"><?php _e('Block Visibility', 'my-theme'); ?></label></th>
                <td>
                    <input type="radio" name="user_block_visibility" id="user_block_visibility_full" value="full" <?php checked('full', get_user_meta($user->ID, 'user_block_visibility', true)); ?>>
                    <label for="user_block_visibility_full"><?php _e('Full List', 'my-theme'); ?></label>
                    <br>
                    <input type="radio" name="user_block_visibility" id="user_block_visibility_limited" value="limited" <?php checked('limited', get_user_meta($user->ID, 'user_block_visibility', true)); ?>>
                    <label for="user_block_visibility_limited"><?php _e('Limited Set', 'my-theme'); ?></label>
                </td>
            </tr>
        </table>
    <?php
    }
}
add_action('show_user_profile', 'qntm_user_profile_fields');
add_action('edit_user_profile', 'qntm_user_profile_fields');

function qntm_update_user_profile($user_id)
{
    if (current_user_can('administrator')) {
        if (isset($_POST['user_block_visibility'])) {
            update_user_meta($user_id, 'user_block_visibility', sanitize_text_field($_POST['user_block_visibility']));
        }
    }
}
add_action('personal_options_update', 'qntm_update_user_profile');
add_action('edit_user_profile_update', 'qntm_update_user_profile');




function my_theme_add_user_meta()
{
    add_user_meta(1, 'disable_site_edit', false, true); // Set default to false (allow Site Edit)
}
add_action('user_register', 'my_theme_add_user_meta');

function my_theme_user_profile_update_actions($actions)
{
    $actions['disable_site_edit'] = __('Disable Site Edit', 'my-theme');
    return $actions;
}
add_filter('user_profile_update_actions', 'my_theme_user_profile_update_actions', 10, 1);

function my_theme_user_profile_fields($user)
{
    if (current_user_can('administrator')) {
    ?>
        <h3>Site Edit Mode</h3>
        <table class="form-table">
            <tr>
                <th><label for="disable_site_edit"><?php _e('Disable Site Edit', 'my-theme'); ?></label></th>
                <td>
                    <input type="checkbox" name="disable_site_edit" id="disable_site_edit" value="1" <?php checked(get_user_meta($user->ID, 'disable_site_edit', true), 1); ?>>
                </td>
            </tr>
        </table>
<?php
    }
}
add_action('show_user_profile', 'my_theme_user_profile_fields');
add_action('edit_user_profile', 'my_theme_user_profile_fields');

function my_theme_update_user_profile($user_id)
{
    if (current_user_can('administrator')) {
        if (isset($_POST['disable_site_edit'])) {
            update_user_meta($user_id, 'disable_site_edit', sanitize_text_field($_POST['disable_site_edit']));
        }
    }
}
add_action('personal_options_update', 'my_theme_update_user_profile');
add_action('edit_user_profile_update', 'my_theme_update_user_profile');

function my_theme_hide_site_edit_button($toolbar, $block)
{
    $current_user = wp_get_current_user();
    if (get_user_meta($current_user->ID, 'disable_site_edit', true)) {
        // Remove the "Site Edit" button
        $toolbar = array_filter($toolbar, function ($item) {
            return $item['name'] !== 'site-edit';
        });
    }
    return $toolbar;
}
add_filter('edit_block_toolbar', 'my_theme_hide_site_edit_button', 10, 2);




/**
 * Limit MCE WYSIWYG Colors
 *
 * Override TinyMCE's default colors. Created specifically for Classic Editor Block or ACF WYSIWYG in WordPress.
 *
 * @category   WordPress
 * @author     Knol Aust <k@knolaust.com>
 * @version    1.0.0
 */

function ka_override_MCE_options($init)
{

    $custom_colors = '
            "00856A", "Primary",
            "25464A", "Dark",
            "007CAD", "Secondary",
            "D10057", "Red",
            "FFAA00", "Yellow",
            "F9FAFB", "Light",
             "25464A","Muted Green",
            "34CCFC", "Border Blue",
        ';
    // build color grid palette
    $init['textcolor_map'] = '[' . $custom_colors . ']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'ka_override_MCE_options');





/****************************
Add Formats Dropdown Menu To MCE
 ****************************/
if (!function_exists('wpex_style_select')) {
    function wpex_style_select($buttons)
    {
        array_push($buttons, 'styleselect');
        return $buttons;
    }
}
add_filter('mce_buttons', 'wpex_style_select');


/*****************************************************
Add new styles to the TinyMCE "formats" menu dropdown
 ******************************************************/
//
if (!function_exists('wpex_styles_dropdown')) {
    function wpex_styles_dropdown($settings)
    {

        // Create array of new styles
        $new_styles = array(

            array(
                'title'        => __('Button Style Link', 'wpex'),
                'selector'    => 'a',
                'classes'    => 'btn-style btn-style--link'
            ),
            array(
                'title'        => __('Small Paragraph', 'wpex'),
                'selector'    => 'p',
                'classes'    => 'p__sm'
            ),
            array(
                'title'        => __('Large Paragraph', 'wpex'),
                'selector'    => 'p',
                'classes'    => 'p__lg'
            ),

        );
        // Merge old & new styles
        $settings['style_formats_merge'] = false;
        // Add new styles
        $settings['style_formats'] = json_encode($new_styles);
        // Return New Settings
        return $settings;
    }
}
add_filter('tiny_mce_before_init', 'wpex_styles_dropdown');
