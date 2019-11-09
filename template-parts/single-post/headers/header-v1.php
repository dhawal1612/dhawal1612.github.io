<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ironmasslite
 */

?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
	<div class="entry-meta">
		<?php
			ironmasslite_posted_by();
			ironmasslite_posted_in( array(
				'prefix'  => __( 'In', 'ironmasslite' ),
			) );
			ironmasslite_posted_on( array(
				'prefix'  => __( 'Posted', 'ironmasslite' ),
			) );
			ironmasslite_post_comments( array(
				'postfix' => __( 'Comment(s)', 'ironmasslite' ),
			) );
		?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php ironmasslite_post_thumbnail( 'ironmasslite-thumb-l', array( 'link' => false ) ); ?>