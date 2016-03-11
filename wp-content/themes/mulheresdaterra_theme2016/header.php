<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,400italic|PT+Serif:400,700,400italic' rel='stylesheet' type='text/css'> <!-- Google Fonts -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<!-- ReCaptcha Google -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

    <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>



	</head>

<?php if ( is_single() && in_category('galeria') ) : ?>
	<body <?php body_class('galeria'); ?>>
<?php else: ?>
	<body <?php body_class(); ?>>
<?php endif; ?>

		<!-- Facebook Script -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=252945901438792";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<section class="general">
			<section id="bgsection"></section>
			<span data-scroll-index="1" class="target" id="projeto"> </span>

<?php if ( is_home() ) : ?>
		<!-- BEGIN video -->
		<section class="block_wpr home_cntt">

<!-- <div class="video_wpr"
			  data-vide-bg="mp4: http://mulheresdaterra.com.br/wp/wp-content/uploads/2016/03/mulheresdaterra_02.mp4, webm: http://mulheresdaterra.com.br/wp/wp-content/uploads/2016/03/mulheresdaterra_03.webm"
			   data-vide-options="loop: true, muted: true, position: 0% 0%">
			</div> -->

<!-- 			<div style="width: auto; height: 100%;" data-vide-bg="mp4: http://mulheresdaterra.com.br/wp/wp-content/uploads/2016/03/mulheresdaterra_02.mp4, webm: http://mulheresdaterra.com.br/wp/wp-content/uploads/2016/03/mulheresdaterra_01.webm" data-vide-options="loop: true, muted: true, position: 0% 0%"></div>
 -->
			<div class="video_wpr"> 
			  <video class="home_video" id="video1" autoplay muted loop>
			    <source src="http://mulheresdaterra.com.br/wp/wp-content/uploads/2016/03/mulheresdaterra_02.mp4" type="video/mp4">
			    <source src="http://mulheresdaterra.com.br/wp/wp-content/uploads/2016/03/mulheresdaterra_01.webm" type="video/webm">
			  </video>
				<button class="playPause btn"></button> 
			</div> 


			<div class="text"><?php postContent(7); ?></div>


		</section>
		<!-- END video -->
<?php endif; ?>


	<!-- BEGIN menu -->
	<div class="header_wpr">
		<section class="block_wpr header">
			<header class="block_cntt">
				<div class="menu_drop">
					<a class="menu_link"></a>
				</div>
				<h1>
					<?php getLogoLink(); ?>
				</h1>
				<div class="multilangue_menu">
					<?php if ( function_exists( 'mltlngg_display_switcher' ) ) mltlngg_display_switcher(); ?>
				</div>
				<nav class="menu_wpr" role="navigation">
					<?php getMenu(3); ?>
				</nav>
			</header>
		</section>
	</div>
	<!-- END menu -->
