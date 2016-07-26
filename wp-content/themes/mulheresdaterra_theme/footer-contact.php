<?php 
/* Prefooter - contact form */
?>

</section><!-- .general -->


<!-- BEGIN Prefooter Contact -->
<section class="block_wpr prefooter block_contato">
	<span data-scroll-index="6" class="target" id="contato"> </span>	
	<div class="block_cntt">

<?php
	if ( is_single() && in_category('galeria') ) :
?>
		<h2 class="form_title">Imagens disponíveis para venda através do canal de contato:</h2>
		<div class="page_cntt">

			<div class="form_wpr col_resp col2-3">
				<?php echo do_shortcode('[contact-form-7 id="76" title="compra_imagem"]'); ?>
			</div>
		</div>
<?php
	else :
?>
		<h2 class="page_title">Contato</h2>
		<div class="page_cntt">

			<div class="form_wpr col_resp col2-3">
				<?php echo do_shortcode('[contact-form-7 id="75" title="contato"]'); ?>
			</div>
		</div>
<?php 
	endif;
?>
			<ul class="social-networks col_resp col1-3">
				<li class="facebook"><a target="_blank" href="https://www.facebook.com/mulheresdaterra/?fref=ts"></a></li>
				<li class="youtube"><a target="_blank" href="https://www.youtube.com/channel/UCgnbySNh7Z4_P_uljy07RXQ"></a></li>
				<li class="instagram"><a target="_blank" href="https://www.instagram.com/mulheresdaterra/"></a></li>
			</ul>
			<span class="clear"></span>
		</div>
	</div>
</section>
<!-- END Prefooter Contact -->
