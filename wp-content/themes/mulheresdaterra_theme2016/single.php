<?php
/**
 * Template Name: Single
 */
?>

<?php get_header(); ?>

<!-- BEGIN Histórias/Blog Article -->
<section class="block_wpr block_article">
	<div class="block_cntt">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div class="post-item">
			<article role="main" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="page_title"><?php the_title(); ?></h2>
				<div class="post_info">
					<div class="author">por <a data-scroll-nav="10"><?php the_author(); ?></a></div>
					<div class="date"><?php the_time('j F Y'); ?></div>
					<span class="clear"></span>
				</div>
				<div class="post_cntt">
					<?php the_content(); ?>
				</div>
			</article>
		</div>
	<?php endwhile; ?>
	<?php else: ?>
		<!-- article -->
		<article>
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		</article>
		<!-- /article -->
	<?php endif; ?>			
		
		<span data-scroll-index="10" class="target" id="author"> </span>
		<div class="author_wpr">
			<p class="photo_wpr">
	<?php
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( get_the_author_meta('user_email') ) ) ). '?s=100';
	?>
				<img src="<?php echo $gravatar_url; ?>" /> 
			</p>
			<div class="dscpt">
				<strong><?php the_author(); ?></strong>  <?php the_author_meta('description'); ?>
			</div>
		</div>

		<section class="single_footer">
			<div class="newsletter_form">
				<form>
					<div class="col_resp col1-2 label">
						<label>Conheça mais histórias. Assine nossa newsletter.</label>
					</div>
					<div class="col_resp col1-2 form">
						<input type="text" class="txt" placeholder="seu email" />
						<input type="submit" class="btn" value="assinar" />
					</div>
				</form>
				<span class="clear"></span>
			</div>
			<div class="face_comments col_resp col2-3">
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="auto" data-numposts="10"></div>
			</div>
			<div class="next_post col_resp col1-3">

<?php
	$args = array( 
		'posts_per_page' => 1,
		'cat'		 => $cat_hist
	);

	$posts_hist = get_posts( $args );

	foreach ( $posts_hist as $post ) : setup_postdata( $post );
	//while($recent_posts->have_posts()) : $recent_posts->the_post();

?>
				<article class="post-item">
					<h2 class="post_title"><a href="<?php echo $post_link; ?>"><?php the_title(); ?></a></h2>
					<?php echo get_the_category_list(); ?>
					<p class="post_img"><a href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image(); ?>"/></a></p>
					<div class="post_text">
						<p>
						<?php 
							$the_excerpt = get_special_excerpt(225);
							$the_excerpt = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $the_excerpt);
							echo $the_excerpt. '...';
						?>
					</div>
					<a href="<?php echo the_permalink(); ?>" class="readmore">Leia Mais</a>
				</article>
	<?php endforeach; ?>
				<a href="<?php echo get_category_link( $cat_hist ); ?>" class="more">veja mais histórias</a>
			</div>
		
		</section>


		<?php get_sidebar(); ?>
		
		<span class="clear"></span>
	</div><!-- .block_cntt -->
</section>
<!-- END Histórias/Blog Article -->


<?php get_footer("contact"); ?>

<?php get_footer(); ?>

