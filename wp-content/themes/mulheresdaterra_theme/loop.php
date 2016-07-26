<!-- if is Home -->
<?php if ( is_home() ) { ?>

	<!-- article -->
	<div class="post_wpr col1-3 <?php echo $post_order; ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<span class="cat"> <?php the_category(); ?></span>
			<!-- post title -->
			<h4>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h4>
			<!-- /post title -->
			<div class="excerpt">
				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
				<?php //the_excerpt("leia mais" , 40 ); ?> 
			</div>
		</article>
	</div>
	<!-- /article -->


<!-- if is Search -->
<?php } else if ( is_search() ) { ?>

	<?php
		$post_type = get_post_type();
		if ($post_type == "post") { 
	?>

		<div class="post">
			<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
			<div class="info">
				<span class="date"><?php the_time('d/m/Y') ?> |</span>
				<span class="author">por <?php the_author_posts_link(); ?></span>
			</div>
			<div class="text">
				<?php the_excerpt(); ?>
			</div>

		</div>
	<?php } ?>

<!-- if is Archive -->
<?php } else if ( is_archive() ) { ?>

	<div class="post">
		<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		<div class="info">
			<span class="date"><?php the_time('d/m/Y') ?> |</span>
			<span class="author">por <?php the_author_posts_link(); ?></span>
		</div>
		<div class="text">
			<?php the_excerpt(); ?>
		</div>

	</div>

<!-- if is any other page -->
<?php } else { ?>

	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
	  'posts_per_page' => 5,
	  'paged' => $paged
	);

	query_posts($args); 
	?>

	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post();  ?>

			<article class="post">
				<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
				<div class="info">
					<span class="date"><?php the_time('d/m/Y') ?> |</span>
					<span class="author">por <?php the_author_posts_link(); ?></span>

				</div>
				<!--div class="share_bar">
					<span class="bar_title">Compartilhe</span>
					<div class="share_buttons">
						<?php// echo do_shortcode("[huge_it_share]"); ?>
					</div>
				</div-->
				<div class="text">
					<?php the_excerpt(); ?>
				</div>

			</article>


		<?php endwhile; ?>
		<!-- end of the loop -->

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


<?php } ?>

