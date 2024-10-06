<div class="<?php echo nkg_acf_block_classes($block, 'standard-accordion-block '); ?>" x-data="{ openSection: null, toggle(section) { this.openSection = this.openSection === section ? null : section; }, isOpen(section) { return this.openSection === section; } }" id="<?php echo nkg_acf_block_id($block); ?>">
    <?php if (have_rows('standard-accordion-block__sections')) : while (have_rows('standard-accordion-block__sections')) : the_row(); ?>
            <div class="standard-accordion-block__sections">
                <div class="standard-accordion-block__section-header" data-collapse="next">
                    <?php echo get_sub_field('standard-accordion-block__section-title') ? '<div class="standard-accordion-block__section-title">' . get_sub_field('standard-accordion-block__section-title') . '</div>' : ''; ?>
                    <div class="standard-accordion-block__icon" data-acc-icon="1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"></path></svg>
                    </div>
                </div>
                <div class="acf-innerblocks-container">
                    <?php echo get_sub_field('standard-accordion-block__section-content') ? '<div class="standard-accordion-block__section-content">' . get_sub_field('standard-accordion-block__section-content') . '</div>' : ''; ?>
                </div>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>
</div>