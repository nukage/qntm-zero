<div class="<?php echo nkg_acf_block_classes($block, 'cards-grid-query'); ?>" id="<?php echo nkg_acf_block_id($block); ?>">
    <div class="cards-grid-query__top">
        <?php echo get_field('cards-grid-query__headline') ? '<h3 class="cards-grid-query__headline">' . get_field('cards-grid-query__headline') . '</h3>' : ''; ?>
        <?php echo get_field('cards-grid-query__content') ? '<div class="cards-grid-query__content">' . get_field('cards-grid-query__content') . '</div>' : ''; ?>
    </div>
    <div class="cards-grid-query__grid">
        <?php
        $args = array(
            'post_type' => 'post',
            'order' => 'ASC'
        );
        $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="cards-grid-query__item">
                    <?php
                    $link = get_permalink(); ?>
                    <a class="cards-grid-query__link" href="<?php echo $link; ?>">
                        <?php $post_id = get_the_ID(); // get the current post ID
                        $featured_image_id = get_post_thumbnail_id($post_id); ?>
                        <?php echo wp_get_attachment_image($featured_image_id, 'full', false, array('class' => 'cards-grid-query__image')); ?>
                        <?php $title = get_the_title();
                        $link = get_permalink(); ?>
                        <?php echo $title ? '<h2 class="cards-grid-query__item-title">' . $title . '</h2>' : ''; ?>
                    </a>
                    <?php echo get_the_excerpt() ? '<p class="cards-grid-query__item-content">' . get_the_excerpt() . '</p>' : ''; ?>
                </div>
                <?php endwhile;
        endif;
        wp_reset_postdata(); ?>'
    </div>
</div>