<?php

/**
 * Block Name: Standard Content
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('standard-') : $block['anchor']) : wp_unique_id('standard-');

$full_width = get_field('full_width');



$headline = get_field('headline');
$content = get_field('content');

$content_class = 'standard-block__content wysiwyg anim-fade1';
if (!$headline) {
    $content_class .= ' standard-block__content--no-headline';
}
// if ($full_width) {
//     $content_class .= ' blog-content';
// }


?>

<section id="<?php echo $id; ?>" class="standard-block <?php echo $full_width ? 'standard-block--full-width' : ''; ?>  ">
    <div class="container-2xl">

        <div class="standard-block__wrap">
            <?php echo $headline  ? '<h2 class="standard-block__headline anim-fade1">' . preventWidows($headline) . '</h2>' : ''; ?>


            <?php echo $content  ? '<div class="' . $content_class . '">' . $content . '</div>' : ''; ?>
        </div>
    </div>
</section>