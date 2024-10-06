<div class="text-image">
    <div class="acf-innerblocks-container">
        <?php echo  get_field('text-image__image'); ?>
        <?php echo nkg_create_image_tag(get_field('text-image__image'), 'text-image__image'); ?>

    </div>
    <div class="acf-innerblocks-container">
        <?php echo get_field('text-image__title') ? '<h2 class="text-image__title">' . get_field('text-image__title') . '</h2>' : ''; ?>
        <?php echo get_field('text-image__content') ? '<div class="text-image__content">' . get_field('text-image__content') . '</div>' : ''; ?>
        <?php $link = get_field('text-image__link'); ?>
        <?php $link_target = $link && $link['target'] ? $link['target'] : '_self'; ?>
        <?php $link_url = $link && $link['url'] ? $link['url'] : ''; ?>
        <?php $link_title = $link && $link['title'] ? $link['title'] : ''; ?>
        <?php echo '<a href="' . $link_url . '" target="' . $link_target . '" class="text-image__link ">' . $link_title . '</a>'; ?>

    </div>
</div>