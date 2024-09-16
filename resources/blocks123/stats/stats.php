<?php

/**
 * Block Name: Stats
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('stats-') : $block['anchor']) : wp_unique_id('stats-');


$headline = get_field('headline');
$content = get_field('content');
$link = get_field('link');

$stats = get_field('stats'); ?>

<section id="<?php echo $id; ?>" class="stat-block">
    <div class="container-2xl">
        <div class="stat-block__col-one">

            <?php echo $headline  ? '<h2 class="stat-block__headline anim-fade1">' . $headline . '</h2>' : ''; ?>
            <?php echo $content  ? '<div class="stat-block__content wysiwyg anim-fade1">' . $content . '</div>' : ''; ?>
            <?php echo qntm_acf_link('a', 'stat-block__link', $link, null, null, false); ?>
        </div>

        <div class="stat-block__col-two">

            <?php foreach ($stats as $stat_id => $stat) :
                $number = $stat['number'];
                $stat_content = $stat['content'];
            ?>

                <div class="stat-block__item anim-fade1">

                    <?php echo $number ? '<div class="stat-block__number">' . $number . '</div>' : ''; ?>
                    <?php echo $stat_content ? '<div class="stat-block__stat-content">' . $stat_content . '</div>' : ''; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php echo qntm_acf_link('a', 'stat-block__mobile-link', $link, null, null, false); ?>
    </div>
</section>