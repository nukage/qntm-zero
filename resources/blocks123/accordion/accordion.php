<?php

/**
 * Block Name: Accordion
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('accordion-') : $block['anchor']) : wp_unique_id('accordion-');


$align_class = $block['align'] ? 'align' . $block['align'] : '';
$blockClass = '';
$blockClass = isset($block['className']) ? $block['className'] : '';

$classList = 'qntm-pathways-accordion ' . $blockClass . ' ' . $align_class;

$blockLocation = get_template_directory_uri() . '/resources/blocks/accordion';

$arrow_svg_file = $blockLocation . '/images/carbon_pan-horizontal.svg';
$arrow_svg = file_get_contents($arrow_svg_file);



?>


<?php

// ACF STRUCTURE
$tabs = get_field('tabs');
$preloadImages = array();
?>
<div id="<?php echo esc_attr($id); ?>" class="qntm-pathways-accordion qntm-block">
	<div class="qntm-pathways-accordion__wrap">

		<?php if ($tabs[0]) : ?>


			<?php foreach ($tabs as $tab_id => $tab) : ?>
				<?php

				$title = $tab['title'];
				$headline = $tab['headline'];
				$content = $tab['content'];
				$link = $tab['link'];
				$background_image = $tab['background_image'];
				$background_image_url = wp_get_attachment_url($background_image);
				array_push($preloadImages, $background_image_url);

				?>
				<div id="accordion-tab-<?php echo $tab_id; ?>" class="qntm-pathways-accordion__tab<?php echo $tab_id < 1 ? ' qntm-pathways-accordion__tab--active' : ''; ?>" style="background-image:url(<?php echo $background_image_url; ?>) ">
					<?php echo $title  ? '<h4 class="qntm-pathways-accordion__title"><a href="#accordion-tab-' . $tab_id . '">' . $title . '</a></h4>' : ''; ?>
					<div class="qntm-pathways-accordion__tab-wrap">
						<?php echo $headline  ? '<h3 class="qntm-pathways-accordion__headline">' . $headline . '</h3>' : ''; ?>
						<?php echo $content  ? '<div class="qntm-pathways-accordion__content wysiwyg">' . $content . '</div>' : ''; ?>
						<?php echo qntm_acf_link('a', 'qntm-pathways-accordion__link', $link, null, null, false); ?>
					</div>
					<div class="qntm-pathways-accordion__arrow"><?php echo $arrow_svg; ?></div>
				</div>

			<?php endforeach; ?>
		<?php else : ?>
			Please add an accordion tab.
		<?php endif; ?>
	</div>
</div>