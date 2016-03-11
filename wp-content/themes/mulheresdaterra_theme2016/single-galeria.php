<?php
/**
 *  WP Post Template: Galeria
 */
?>

<?php get_header(); ?>

<section class="map_bg_wpr">
	<div class="map_bg">
		<div class="map_bg_cntt"></div>
	</div>
</section>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<!-- BEGIN menu -->
<div class="galeria-header_wpr">
	<section class="block_wpr galeria-header">
		<header class="block_cntt">

			<ul class="next-prev-post">
				<li class="prev">


			<?php if (get_previous_post_link()){ ?>
				<?php previous_post_link('%link', '', TRUE); ?>  
			<?php } ?>
				</li>
				<li class="next">
			<?php if (get_next_post_link()){ ?>
				<?php next_post_link('%link', '', TRUE); ?>  
			<?php } ?>
				</li>
			</ul>
	
			<nav class="cat-list" role="navigation">

<?php
	$args = array( 
		'posts_per_page' => 10,
		'cat'		 => $cat_gale,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$posts_gale = get_posts( $args );
	foreach ( $posts_gale as $post ) : setup_postdata( $post );
?>
				<a class="cat-item" href="<?php the_permalink();?>"><?php the_title(); ?></a>
<?php 
	endforeach;
	wp_reset_postdata();
?>
			</nav>
			<a href="<?php echo home_url(); ?>/#galeria" class="home"></a>
			<div class="multilangue_menu">
				<?php if ( function_exists( 'mltlngg_display_switcher' ) ) mltlngg_display_switcher(); ?>
			</div>
		</header>
	</section>
</div>
<!-- END menu -->

<!-- BEGIN Galeria Article -->
<section class="block_wpr block_article block_photos">
	<span data-scroll-index="4" class="target" id="historias"> </span>
	<div class="block_cntt">
	
		<article class="post-item" role="main">
			<h2 class="page_title"><?php the_title(); ?></h2>
			<div class="post_cntt">
				<?php the_content(); ?>
			</div>
		</article>

		</section>
		<span class="clear"></span>
	</div><!-- .block_cntt -->
</section>
<!-- END Galeria Article -->

<?php endwhile; ?>
<?php else: ?>
	<!-- article -->
	<article>
		<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
	</article>
	<!-- /article -->
<?php endif; ?>	

<?php get_footer("contact"); ?>

<?php get_footer(); ?>

