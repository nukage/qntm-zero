<?php

/**
 * Block Name: Events
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('events-') : $block['anchor']) : wp_unique_id('events-');

$headline = get_field('headline');
$content = get_field('content');
$link = get_field('link');

$placeholder = get_field('event_placeholder_image', 'option');

?>

<section id="<?php echo $id; ?>" class="events-block  ">
    <div class="events-block__bg">
        <img class="events-block__bg1" src="<?php echo get_template_directory_uri(); ?>/resources/images/bgpattern.png" />
    </div>
    <div class="container-2xl">
        <div class="events-block__col-one">
            <?php echo $headline  ? '<h2 class="events-block__headline anim-fade1" data-offset="110">' . $headline . '</h2>' : ''; ?>
            <?php echo $content  ? '<div class="events-block__content wysiwyg anim-fade1">' . $content . '</div>' : ''; ?>
            <div class="events-block__link-wrap anim-fade1">
                <?php echo qntm_acf_link('a', 'events-block__link', $link, null, null, false); ?>
            </div>
        </div>
        <div class="events-block__col-two anim-fade1" data-offset="90">

            <?php
            $today = date('Ymd');
            $args = array(
                'post_type' => 'event',
                'orderby' => 'meta_value',
                'meta_key' => 'start_date', // Replace 'start_date' with your actual ACF field name
                'meta_type' => 'DATE', // Specify the meta type if needed
                'order' => 'ASC', // Set to 'DESC' for descending order

            );

            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $id = get_the_ID();
                    $thumbnail_id = get_post_thumbnail_id($id);
                    $thumb = wp_get_attachment_image($thumbnail_id, 'blog-lg', false, array('class' => 'event-item__image'));
                    $link = get_field('link', $id);

                    $start_date = get_field('start_date', $id);
                    $start_date_formatted = date_i18n('M d', strtotime($start_date));
                    $end_date = get_field('end_date', $id);
                    $end_date_formatted = date_i18n('M d', strtotime($end_date));

                    // Your event loop here
                    if ($start_date >= $today) {


            ?>
                        <div class="event-item" data-offset="90" id="event-<?php echo get_the_ID(); ?>">
                            <div class="event-item__top">
                                <div class="event-item__start-date">
                                    <?php echo $start_date_formatted; ?>
                                </div>
                                <div class="event-item__title">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                                <div class="carbon">
                                    <img class="img_carbon_upDown style-svg" src="<?php echo get_template_directory_uri(); ?>/resources/images/upDown.svg" alt="">
                                    <img class="img_carbon_close style-svg" src="<?php echo get_template_directory_uri(); ?>/resources/images/close.svg" alt="">
                                </div>
                            </div>
                            <div class="event-item__main">
                                <?php if ($thumb) {
                                    echo $thumb;
                                } else {
                                    echo wp_get_attachment_image($placeholder, 'blog-lg', false, array('class' => 'event-item__image'));
                                } ?>
                                <div class="event-item__description"><strong><?php echo $start_date_formatted; ?> <?php echo $end_date_formatted ? ' - ' . $end_date_formatted : ''; ?>: </strong><?php echo get_field('description', $id); ?></div>
                                <?php echo qntm_acf_link('a', 'event-item__link', $link,   '<img class="style-svg" src="' . get_template_directory_uri() . '/resources/images/carbon_arrow-right.svg' . '" />', false); ?>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
                // No events found
            }

            wp_reset_postdata();
            ?>


        </div>
    </div>
</section>