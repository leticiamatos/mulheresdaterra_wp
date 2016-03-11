<?php
/**
 * Template Name: Page
 */
?>

<?php get_header(); ?>

<!-- BEGINS About Us -->
<section class="block_wpr block_04 block_about">
	<div class="block_cntt">
		<h2><?php the_title(); ?></h2>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

	</div>
</section>
<!-- ENDS About Us -->

<!-- BEGINS Contact -->
<?php get_footer("contact"); ?>
<!-- ENDS Contact -->

<?php get_footer(); ?>