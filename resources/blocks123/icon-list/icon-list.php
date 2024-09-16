<?php

/**
 * Block Name: Icon List
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('icon-list-') : $block['anchor']) : wp_unique_id('icon-list-');



$headline = get_field('headline');
$content = get_field('content');
$icons = get_field('icons');
$arrow = '<img src="' . get_template_directory_uri() . '/resources/images/carbon_arrow-right.svg' . '" class="icon-list-block__arrow style-svg">';


?>

<section id="<?php echo $id; ?>" class="icon-list-block  ">
    <div class="icon-list-block__bg">
        <img class="icon-list-block__bg1" src="<?php echo get_template_directory_uri(); ?>/resources/images/bgpattern.png" />
    </div>
    <div class="container-2xl">


        <?php echo $headline  ? '<h2 class="icon-list-block__heading anim-fade1">' . preventWidows($headline) . '</h2>' : ''; ?>

        <?php echo $content  ? '<div class="icon-list-block__content wysiwyg anim-fade1">' . $content . '</div>' : ''; ?>

        <div class="icon-list-block__icons-wrap">


            <?php foreach ($icons as $item_id => $item) :

                $icon_file = $item['icon_file'];
                $icon_headline = $item['headline'];
                $icon_content = $item['content'];
                $icon_link = $item['link'];
                $link_title = $icon_link && $icon_link['title']  ? $icon_link['title'] : '';

            ?>

                <div class="icon-list-block__icon">

                    <?php echo wp_get_attachment_image($icon_file, 'full', false, array('class' => 'style-svg icon-list-block__icon-file')); ?>
                    <?php echo $icon_headline  ? '<h3 class="icon-list-block__icon-headline">' . $icon_headline . '</h3>' : ''; ?>
                    <?php echo $content  ? '<div class="icon-list-block__icon-content wysiwyg">' . $icon_content . '</div>' : ''; ?>
                    <?php echo qntm_acf_link('a', 'icon-list-block__icon-link', $icon_link, null, $link_title . $arrow); ?>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</section>