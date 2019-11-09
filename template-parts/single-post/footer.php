<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ironmasslite
 */

?>

<footer class="entry-footer">
	<div class="entry-meta"><?php
		ironmasslite_post_tags ( array(
			'prefix'    => __( 'Tags:', 'ironmasslite' ),
			'delimiter' => ''
		) );
	?></div>
</footer><!-- .entry-footer -->