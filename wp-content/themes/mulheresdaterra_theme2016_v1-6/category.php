<?php
/*
Template Name: Category
*/
?>

<?php get_header(); ?>

<!-- BEGINS Blog Archive -->
<section class="block_wpr block_as-historias">
	<span data-scroll-index="4" class="target" id="historias"> </span>
	<div class="block_cntt">
		<h2 class="page_title"><?php single_cat_title(); ?></h2>
		<div class="blog_wpr">
			<!-- BEGIN post-list -->
			<div class="post-list">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post();  ?>
				<!-- BEGIN post ex -->
				<article class="post-item post-<?php the_ID(); ?> post-order_<?php echo $n; ?> col_resp col1-3">
					<h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php echo get_the_category_list(); ?>
					<p class="post_img"><a href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image(); ?>"/></a></p>
					<div class="post_text">
						<p>
						<?php 
							$the_excerpt = get_special_excerpt(220);
							$the_excerpt = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $the_excerpt);
							echo $the_excerpt. '...';
							$the_excerpt = string_limit_words($the_excerpt, $atts['excerpt_words']);
						?>

						</p>
					</div>
					<a href="<?php the_permalink(); ?>" class="readmore">Leia Mais</a>
				</article>
				<!-- END post ex -->
							

<?php endwhile; ?>

<?php $pagination_args = array(
	'prev_text'          => __('<'),
	'next_text'          => __('>')
); ?>

				<div class="pagination">
					<?php echo paginate_links( $pagination_args ); ?>
				</div>

<?php wp_reset_postdata(); ?>

<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
		

				<span class="clear"></span>
			</div>
			<!-- END post-list -->

		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<!-- ENDS Blog Category -->

<?php get_footer("contact"); ?>

<?php get_footer(); ?>
