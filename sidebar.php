<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ironmasslite
 */

?>

<?php 

do_action( 'ironmasslite-theme/sidebar/before' );

if ( is_active_sidebar( 'sidebar' ) && 'none' !== ironmasslite_theme()->sidebar_position ) : ?>
	<aside id="secondary" <?php ironmasslite_secondary_content_class( array( 'widget-area' ) ); ?>>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #secondary -->
<?php endif; 

do_action( 'ironmasslite-theme/sidebar/after' );
