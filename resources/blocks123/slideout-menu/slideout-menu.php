<?php

/**
 * Block Name: Slideout Menu
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('slideout-') : $block['anchor']) : wp_unique_id('accordion-');


$align_class = $block['align'] ? 'align' . $block['align'] : '';
$blockClass = '';
$blockClass = isset($block['className']) ? $block['className'] : '';

$classList = 'qntm-slideout-menu ' . $blockClass . ' ' . $align_class;

$blockLocation = get_template_directory_uri() . '/resources/blocks/slideout-menu';

$menu_name = get_field('navigation_menu') ?? 'primary-menu';

?>




<button class="slideout-nav__toggle"><img src="<?php echo  $blockLocation ?>/images/slideout-nav.svg" /></button>
<div class="slideout-nav">

    <?php
    wp_nav_menu(
        array(
            'container_id'    => 'slideout-menu',
            'container_class' => 'slideout-nav__menu-wrapper',
            'menu_class'      => 'slideout-nav__menu',
            'theme_location'  => 'slideout',
            'li_class'        => '',
            'fallback_cb'     => false,
        )
    );
    ?>
</div>