<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Ironmasslite
 */
?>

<?php do_action( 'ironmasslite-theme/widget-area/render', 'footer-area' ); ?>

<div <?php ironmasslite_footer_class(); ?>>
	<div class="space-between-content"><?php
		ironmasslite_footer_copyright();
		ironmasslite_social_list( 'footer' );
	?></div>
</div><!-- .container -->
