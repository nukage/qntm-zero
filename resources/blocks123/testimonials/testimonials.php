<?php

/**
 * Block Name: Testimonials
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('testimonials-') : $block['anchor']) : wp_unique_id('testimonials-');


$headline = get_field('headline');
$content = get_field('content');


$testimonials = get_field('testimonials'); ?>
<section id="<?php echo $id; ?>" class="testimonials-block qntm-block">
    <div class="container-2xl">
        <?php echo $headline  ? '<h2 class="testimonials-block__headline ">' . preventWidows($headline) . '</h2>' : ''; ?>
        <?php echo $content  ? '<div class="testimonials-block__content wysiwyg ">' . $content . '</div>' : ''; ?>

        <div class="testimonials-block__wrap">
            <?php foreach ($testimonials as $tst_id => $tst) : ?>
                <div class="testimonials-block__item">
                    <?php
                    $quote = $tst['quote'];
                    $name = $tst['name'];
                    $title = $tst['title'];  ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/quote.svg" class="testimonials-block__quote-svg" data-offset="100">
                    <?php echo $quote  ? '<p class="testimonials-block__quote" data-offset="100">' . $quote . '</p>' : ''; ?>
                    <?php echo $name  ? '<p class="testimonials-block__name">- ' . $name . '</p>' : ''; ?>
                    <?php echo $title  ? '<p class="testimonials-block__title">' . $title . '</p>' : ''; ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>