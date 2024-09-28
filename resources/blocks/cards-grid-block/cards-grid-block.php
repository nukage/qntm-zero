<div class="cards-grid-block" x-data="{count: 0, newMessage: 'Its very dynamic'}" x-on:click="console.log('hi there')">
    <div class="cards-grid-block__top" x-on:click="count++">
        <?php echo get_field('cards-grid-block__headline') ? '<h3 class="cards-grid-block__headline">' . get_field('cards-grid-block__headline') . '</h3>' : ''; ?>
        <?php echo get_field('cards-grid-block__content') ? '<div class="cards-grid-block__content">' . get_field('cards-grid-block__content') . '</div>' : ''; ?>
        <div class="acf-innerblocks-container" x-text="count"></div>
        <div class="acf-innerblocks-container" x-data="{message: 'Hello World'}" x-text="message"></div>
        <?php echo get_field('') ? '<h4 class="">' . get_field('') . '</h4>' : ''; ?>
    </div>
    <div class="cards-grid-block__grid">
        <?php if (have_rows('cards-grid-block__card')) : while (have_rows('cards-grid-block__card')) : the_row(); ?>
                <div class="cards-grid-block__card">
                    <?php echo nkg_create_image_tag(get_sub_field('cards-grid-block__item-image', 'full'), 'cards-grid-block__item-image'); ?>
                    <?php echo get_sub_field('cards-grid-block__item-headline') ? '<div class="cards-grid-block__item-headline">' . get_sub_field('cards-grid-block__item-headline') . '</div>' : ''; ?>
                    <?php echo get_sub_field('cards-grid-block__item-content') ? '<p class="cards-grid-block__item-content">' . get_sub_field('cards-grid-block__item-content') . '</p>' : ''; ?>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</div>