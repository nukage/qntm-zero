<?php
/*
Template Name: Team Members Archive
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wp-site-blocks">

		<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

		<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<main
			class="wp-block-group"
			style="
		margin-top: 0;
		padding-top: var(--wp--preset--spacing--40);
		padding-bottom: var(--wp--preset--spacing--40);
	">
			<!-- wp:group {"tagName":"article","layout":{"type":"default"}} -->
			<article class="wp-block-group">
				<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

				<!-- wp:group {"metadata":{"name":"Posts","categories":["posts"],"patternName":"powder-zero/posts"},"align":"full","className":"is-style-section-1","layout":{"type":"constrained"}} -->
				<div class="wp-block-group alignfull is-style-section-1">
					<!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"team-member","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":10,"parents":[]},"enhancedPagination":true,"layout":{"type":"constrained"}} -->
					<div class="wp-block-query">
						<!-- wp:post-template -->
						<!-- wp:group {"tagName":"article","layout":{"type":"default"}} -->
						<article class="wp-block-group">
							<!-- wp:group {"tagName":"header","className":"entry-header","style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
							<header class="wp-block-group entry-header">
								<!-- wp:post-title {"level":1,"isLink":true} /-->

								<!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"fontSize":"small","layout":{"type":"flex"}} -->
								<div class="wp-block-group has-small-font-size">
									<!-- wp:post-date /-->

									<!-- wp:paragraph -->
									<p>·</p>
									<!-- /wp:paragraph -->

									<!-- wp:post-author-name {"isLink":true} /-->
								</div>
								<!-- /wp:group -->
							</header>
							<!-- /wp:group -->
							zzzzz
							<?= 'hello'; ?>

							<!-- wp:post-featured-image /-->

							<!-- wp:post-excerpt {"moreText":"Read More"} /-->
						</article>
						<!-- /wp:group -->
						<!-- /wp:post-template -->

						<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group" style="margin-top: 0">
							<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
							<!-- wp:query-pagination-previous /-->

							<!-- wp:query-pagination-next /-->
							<!-- /wp:query-pagination -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:query -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->
		</main>
		<!-- /wp:group -->

		<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
	</div>
	<?php wp_footer(); ?>

</body>

</html>