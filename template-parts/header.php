<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ironmasslite
 */
?>

<?php get_template_part( 'template-parts/top-panel' ); ?>

<div <?php ironmasslite_header_class(); ?>>
	<?php do_action( 'ironmasslite-theme/header/before' ); ?>
	<div class="space-between-content">
		<div <?php ironmasslite_site_branding_class(); ?>>
			<?php ironmasslite_header_logo(); ?>
		</div>
		<?php ironmasslite_main_menu(); ?>
	</div>
	<?php do_action( 'ironmasslite-theme/header/after' ); ?>
</div>


