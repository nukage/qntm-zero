<?php

/**
 * Block Name: Checkerboard
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('checkerboard-block-') : $block['anchor']) : wp_unique_id('checkerboard-block-');

$blockClass = '';
$blockClass = isset($block['className']) ? $block['className'] : '';


$headline = get_field('headline');
$content = get_field('content');

$items = get_field('items');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo $blockClass; ?>  checkerboard-block">
	<div class="checkerboard-block__bg">
		<img class="checkerboard-block__bg1" src="<?php echo get_template_directory_uri(); ?>/resources/images/bgpattern.png" />
	</div>
	<div class="container-2xl">
		<?php echo $headline  ? '<h2 class="checkerboard-block__headline anim-fade1">' . preventWidows($headline) . '</h2>' : ''; ?>
		<?php echo $content  ? '<div class="checkerboard-block__content wysiwyg anim-fade1">' . $content . '</div>' : ''; ?>

		<div class="checkerboard-block__wrap">
			<?php if ($items && $items[0]) : ?>
				<?php foreach ($items as $item) : ?>
					<?php
					$title = $item['headline'];
					$image = $item['image'];
					// $buttons = $item['buttons'];
					$link = $item['link'];
					$content = $item['content'];
					// $image_first = false;
					// if ($count % 2 == 0) {
					// 	$image_first = true;
					// }
					?>
					<div class="checkerboard-block-item__wrap">
						<div class="checkerboard-block-item__content ">
							<?php echo $title  ? '<h2 class="checkerboard-block-item__heading">' . $title . '</h2>' : ''; ?>
							<?php echo $content ? '<div class="checkerboard-block-item__text wysiwyg">' . $content . '</div>' : ''; ?>
							<?php if ($link) : ?>
								<div class="checkerboard-block-item__link-wrap">
									<?php echo qntm_acf_link('a', 'checkerboard-block-item__link ', $link,    null, false); ?>

								</div>
							<?php endif; ?>
						</div>
						<div class="checkerboard-block-item__image">
							<?php echo $image ? wp_get_attachment_image($image, 'checkerboard', false, array('class' => '')) : ''; ?>
						</div>
					</div>
			<?php

				endforeach;
			endif; ?>
		</div>
</section>