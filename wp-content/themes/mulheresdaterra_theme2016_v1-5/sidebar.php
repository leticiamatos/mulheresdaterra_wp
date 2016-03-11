<!-- BEGIN blog menu -->
<nav class="menu_blog">
	<div class="search_wpr hover_effect">

		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="form_div">
				<input type="text" class="txt" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="digite sua busca" />
				<input type="submit" class="btn" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
			</div>
		</form>
		<!-- <a href="#" class="toggle_btn"></a> -->
	</div>
	<div class="cat_list_wpr hover_effect">
		<a href="#" class="toggle_btn"></a>
		<h4 class="cat_list_title">Categorias</h4>
		<ul class="cat_list">
<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 3
) );
 
foreach ( $categories as $category ) {
    printf( '<li class="cat_item"><a href="%1$s">%2$s</a></li>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    );
}
?>
		</ul>
	</div>
</nav>
<!-- END blog menu -->