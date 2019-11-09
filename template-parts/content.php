<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ironmasslite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-default'); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php 
			ironmasslite_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
		<div class="entry-meta">
			<?php
				ironmasslite_posted_by();
				ironmasslite_posted_in( array(
					'prefix' => __( 'In', 'ironmasslite' ),
				) );
				ironmasslite_posted_on( array(
					'prefix' => __( 'Posted', 'ironmasslite' )
				) );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php ironmasslite_post_thumbnail( 'ironmasslite-thumb-l' ); ?>

	<?php ironmasslite_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				ironmasslite_post_tags( array(
					'prefix' => __( 'Tags:', 'ironmasslite' )
				) );
			?>
			<div><?php
				ironmasslite_post_comments( array(
					'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					'class'  => 'comments-button'
				) );
				ironmasslite_post_link();
			?></div>
		</div>
		<?php ironmasslite_edit_link(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
