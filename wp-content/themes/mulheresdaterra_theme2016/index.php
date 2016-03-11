<?php get_header(); ?>


<!-- BEGIN As Mulheres -->
<section class="block_wpr block_as-mulheres">
	<div class="block_cntt">
		<h2 class="page_title col_resp"><?php postTitle($pg_mulh); ?></h2>
		<div class="page_text col_resp col1-2"><?php postContent( $pg_mulh); ?>
			<p></p>
		</div>
		<span class="clear"></span>
	</div>
</section>
<!-- END As Mulheres -->

<!-- BEGIN Mapa -->
<section class="block_wpr block_frase">
	<div class="block_cntt">
		<div class="frase">
			<h3><?php postContent( $pg_mapa); ?></h3>
		</div>
	</div>
</section>
<section class="block_wpr block_map">
	<div class="block_cntt">

<?php	// If Home - As mulheres Mapa
	$args = array( 
		'posts_per_page' => -1,
		'cat'		 => $cat_mapa, $cat_mulh
	);

	$posts_maps = get_posts( $args );
	//$query = new WP_Query($args);   
	$q = array();

	//while ( $query->have_posts() ) :
	foreach ( $posts_maps as $post ) : setup_postdata( $post );  
		$a = '<a href="'. get_permalink() .'">' . get_the_title() .'</a>';
		$categories = get_the_category();
		foreach ( $categories as $key=>$category ) {
			if( $category->cat_ID != $cat_mulh ){
				$b = $category->cat_ID ;    
			}
		}
		$q[$b][] = $a; // Create an array with the category names and post titles
	endforeach;
?>
		<div class="map">
			<ul>

<?php
  wp_reset_postdata();
  foreach ($q as $key=>$values) :
  	$country_name = get_category($key)->slug;
?>
				<li class="map-section country-<?php echo $country_name; ?>">
					<span class="map-bullet btn"></span><!-- click bullet, open map-box -->
					<div class="map-box_wrp">
						<div class="map-box">
							<span class="close btn">&times</span>
							<ul class="women-list">
								<li class="country-name"><a href="<?php echo get_category_link( $key ); ?>"><?php echo get_cat_name( $key ) ?></a></li>
		<?php
			            foreach ($values as $value):
			                echo '<li class="women-item">' . $value . '</li>';
			            endforeach;
		?>
							</ul>
							<!-- <a href="<?php echo get_category_link( $key ); ?>" class="map-more"></a> -->
						</div>
					</li>
<?php endforeach; ?>
				</ul>
			</div>
		</div> <!-- END .map -->
	</div>
</section>
<!-- END Mapa -->

<!-- BEGIN As Mulheres Fotos -->
<section class="block_wpr block_as-mulheres-fotos">
	<div class="block_cntt">
		<div class="mulheres_slider_wpr">
			<ul class="mulheres_slider">
<?php 
	$args = array( 
		'posts_per_page' => -1,
		'cat'		 => $cat_mulh
	);
    $posts_mulh = get_posts( $args );
		$i = 1;
		foreach ( $posts_mulh as $post ) : setup_postdata( $post ); 
			if ($i <= 12):
?>
				<li>
					<div class="slide_cntt">
						<p class="photo"><?php the_post_thumbnail(); ?></p>
						<div class="hover">
							<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="dscpt">
								<?php the_excerpt(); ?>
							</div>
							<a class="more" href="<?php the_permalink(); ?>">saiba mais</a>
						</div>
					</div>
				</li>
	
<?php 
			endif;
		    $i++;
		endforeach; 
		wp_reset_postdata();
?>
			</ul>						
		</div>
	</div>
</section>
<!-- END As Mulheres Fotos -->

<!-- BEGIN Documentário -->
<section class="block_wpr block_documentario">
	<span data-scroll-index="2" class="target" id="documentario"> </span>
	<div class="block_cntt">
		<h2 class="page_title col_resp col1-2"><?php postTitle( $pg_docm); ?></h2>
		<div class="page_text col_resp col1-2">
			<?php postContent( $pg_docm); ?>
		</div>
		<div class="button">
			<!-- 	<a class="more" href="">Saiba mais</a> -->
			<span class="soon">Em breve</span>
		</div>
	</div>
</section>
<!-- END Documentário -->

<!-- BEGIN Quote -->
<section class="block_wpr block_quote">
	<div class="block_cntt">
		<?php postContent( $pg_quot); ?>
	</div>
</section>
<!-- END Quote -->

<!-- BEGIN Galeria -->
<section class="block_wpr block_galeria">
	<span data-scroll-index="3" class="target" id="galeria"> </span>
	<div class="block_cntt">
		<h2 class="page_title">Galeria</h2>
<?php
	$args = array( 
    'posts_per_page' => -1,
		'cat'		 => $cat_gale
  );

  $posts_galeria = get_posts( $args );
	foreach ( $posts_galeria as $post ) : setup_postdata( $post );
		$n = 1; 
?>
		<!-- BEGIN Galeria 01 -->
		<div class="galeria_slider_wpr galeria_slider-<?php echo $n; ?>_wpr">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
<!-- 			
			<ul class="galeria_slider-01">
				<li><img src="img/wp_upload/galeria_br_01.jpg" /></li>
				<li><img src="img/wp_upload/galeria_br_02.jpg" /></li>
				<li><img src="img/wp_upload/galeria_br_03.jpg" /></li>
				<li><img src="img/wp_upload/galeria_br_04.jpg" /></li>
				<li><img src="img/wp_upload/galeria_br_01.jpg" /></li>
				<li><img src="img/wp_upload/galeria_br_02.jpg" /></li>
			</ul>						
 -->			
			<div class="hover">
				<h3 class="title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
				<a class="more" href="<?php the_permalink(); ?>">mais fotos</a>
			</div>
		</div>
		<!-- END Galeria 01 -->
	
<?php 
			$n ++;
		endforeach; 
		wp_reset_postdata();
?>
	</div>
</section>
<!-- END Galeria -->

<!-- BEGIN Historias -->
<section class="block_wpr block_as-historias">
	<span data-scroll-index="4" class="target" id="historias"> </span>
	<div class="block_cntt">
		<h2 class="page_title"><?php postTitle($pg_hist); ?></h2>
		<h3 class="subtitle"><?php postContent($pg_hist); ?></h3>
		<div class="blog_wpr">


<?php
	$args = array( 
		'posts_per_page' => 3,
		'cat'		 => $cat_hist
	);

	$posts_hist = get_posts( $args );
	$q = array();

	$category_id = $cat_mapa;	
	$cat_link = get_category_link( $category_id );

?>
			<a href="<?php echo $cat_link; ?>" class="more_blog">Mais histórias</a>
			<!-- BEGIN post-list -->
			<div class="post-list">
<?php
	foreach ( $posts_hist as $post ) : setup_postdata( $post );
	//while($recent_posts->have_posts()) : $recent_posts->the_post();
		$n = 1;
?>
				<article class="post-item post-<?php the_ID(); ?> post-order_<?php echo $n; ?> col_resp col1-3">
					<h2 class="post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php echo get_the_category_list(); ?>
					<p class="post_img"><a href="<?php the_permalink(); ?>">
<?php if (catch_that_image()): ?>
						<img src="<?php echo catch_that_image(); ?>"/>
<?php endif; ?>
					</a></p>
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
<?
		$n ++;
	endforeach;
	//endwhile; 
	wp_reset_postdata();
?>
				<span class="clear"></span>
			</div>
			<!-- END post-list -->

		</div>
	</div>
</section>
<!-- END Historias -->

<!-- BEGIN Madrinhas -->
<section class="block_wpr block_madrinhas">
	<span data-scroll-index="5" class="target" id="madrinhas"> </span>
	<div class="block_cntt">
		<h2 class="page_title">Madrinhas</h2>
		<div class="madrinhas_slide_wpr">
			<ul class="madrinhas_slide">
<?php 
	$args = array(
		'role'         => 'subscriber',
		'orderby' => 'user_url',
		'order' => 'ASC'
	); 
	$blogusers = get_users( $args  );
	foreach ( $blogusers as $user ) :
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $user->user_email ) ) ). '?s=290';
?>
				<li class="nome-<?php echo $user->user_login; ?>">
					<div class="slide_cntt">
						<p class="photo"><img src="<?php echo $gravatar_url; ?>" /></p>
						<div class="hover">
							<h3 class="title"><?php echo $user->first_name; ?></h3>
							<p class="role"><?php echo $user->last_name ; ?></p>
						</div>
					</div>
				</li>
<?php
	endforeach;
?>
		</ul>
	</div>

	<div class="box-list box-list-madrinhas">
<?php
	foreach ( $blogusers as $user ) :
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $user->user_email ) ) ). '?s=290';
?>
		<h3 class="accordeon-title"><?php echo $user->first_name; ?></h3>
		<div class="box-item nome-<?php echo $user->user_login; ?>-box">
			<a class="close"></a>
			<div class="photo">
				<img src="<?php echo $gravatar_url; ?>" />
			</div>
			<div class="text">
				<p><strong><?php echo $user->first_name; ?></strong><?php echo $user->description; ?></p>
			</div>
			<span class="clear"></span>
		</div>
<?php
	endforeach;
	wp_reset_postdata();
?>
	</div>
</section>
<!-- END Madrinhas -->

<!-- BEGIN Nós -->
<section class="block_wpr block_nos">
	<div class="block_cntt">
		<h2 class="page_title">Nós</h2>

		<div class="nos_slide_wpr">
			<ul class="nos_slide">
<?php 
	// Slide - Get users type Author
	$args = array(
		'role'         => 'author',
		'orderby' => 'user_url',
		'order' => 'ASC'
	); 
	$blogusers = get_users( $args  );
	foreach ( $blogusers as $user ) :
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $user->user_email ) ) ). '?s=235';
		$current_userrole;
		foreach( $user->roles as $role ) {
			$current_userrole = $role . '';
		}
?>
				<li class="<?php echo $current_userrole; ?>">
					<section class="nome-<?php echo $user->user_login; ?>">
						<div class="slide_cntt">
							<p class="photo"><img src="<?php echo $gravatar_url; ?>" /></p>
							<div class="hover">
								<h3 class="title"><?php echo $user->first_name; ?></h3>
								<p class="role"><?php echo $user->last_name ; ?></p>
							</div>
						</div>
					</section>
				</li>
<?php
	endforeach;

	// Slide - Get users type contributor
	wp_reset_postdata();
	$args = array(
		'role'         => 'contributor',
		'orderby' => 'user_url',
		'order' => 'ASC'
	); 
	$blogusers = get_users( $args  );
	foreach ( $blogusers as $user ) :
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $user->user_email ) ) ). '?s=235';
		$current_userrole;
		foreach( $user->roles as $role ) {
			$current_userrole = $role . '';
		}
?>
				<li class="<?php echo $current_userrole; ?>">
					<section class="nome-<?php echo $user->user_login; ?>">
						<div class="slide_cntt">
							<p class="photo"><img src="<?php echo $gravatar_url; ?>" /></p>
							<div class="hover">
								<h3 class="title"><?php echo $user->first_name; ?></h3>
								<p class="role"><?php echo $user->last_name ; ?></p>
							</div>
						</div>
					</section>
				</li>
<?php
	endforeach;
?>
		</ul>
	</div>
	<div class="box-list box-list-nos">
<?php 
	// User Info box - Get users type Contributor
	wp_reset_postdata();
	$args = array(
		'role'         => 'contributor',
		'orderby' => 'user_url',
		'order' => 'ASC'
	); 
	$blogusers = get_users( $args  );
	foreach ( $blogusers as $user ) :
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $user->user_email ) ) ). '?s=235';
?>
		<h3 class="accordeon-title accordeon-title-contributor"><?php echo $user->first_name; ?></h3>
		<div class="box-item box-item-contributor nome-<?php echo $user->user_login; ?>-box">
			<a class="close"></a>
			<div class="photo">
				<img src="<?php echo $gravatar_url; ?>" />
			</div>
			<div class="text">
				<p><strong><?php echo $user->first_name; ?></strong><?php echo $user->description; ?></p>
			</div>
			<span class="clear"></span>
		</div>
<?php
	endforeach;

	// User Info box - Get users type Author
	wp_reset_postdata();
	$args = array(
		'role'         => 'author',
		'orderby' => 'user_url',
		'order' => 'ASC'
	); 
	$blogusers = get_users( $args  );
	foreach ( $blogusers as $user ) :
		$gravatar_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $user->user_email ) ) ). '?s=235';
?>
		<h3 class="accordeon-title accordeon-title-author"><?php echo $user->first_name; ?></h3>
		<div class="box-item box-item-author nome-<?php echo $user->user_login; ?>-box">
			<a class="close"></a>
			<div class="photo">
				<img src="<?php echo $gravatar_url; ?>" />
			</div>
			<div class="text">
				<p><strong><?php echo $user->first_name; ?></strong><?php echo $user->description; ?></p>
			</div>
			<span class="clear"></span>
		</div>
<?php
	endforeach;
	wp_reset_postdata();
?>
	</div>
</section>
<!-- END Nós -->

<!-- BEGIN Colabore -->
<section class="block_wpr block_colabore">
	<div class="block_cntt">
		<h2 class="page_title col_resp col1-3"><?php postTitle($pg_colb); ?></h2>
		<div class="page_text col_resp col1-3"><?php postContent($pg_colb); ?></div>
		<div class="button">
			<a data-scroll-nav="6" class="more">Fale Conosco</a>
		</div>
	</div>
</section>
<!-- END Colabore -->

<!-- BEGIN Parceiros -->
<section class="block_wpr block_parceiros">
	<div class="block_cntt">
		<h2 class="page_title">Parceiros</h2>
		<ul class="parceiros-list">
			<li class="parceiros-item"></li>
			<li class="parceiros-item"></li>
			<li class="parceiros-item"></li>
			<li class="parceiros-item"></li>
		</ul>
	</div>
</section>
<!-- END Parceiros -->

<!-- BEGINS Contact -->
<?php get_footer("contact"); ?>
<!-- ENDS Contact -->

<?php get_footer(); ?>
