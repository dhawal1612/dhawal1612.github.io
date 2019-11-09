<?php
/**
 * Theme hooks.
 *
 * @package Ironmasslite
 */

// Adds the meta viewport to the header.
add_action( 'wp_head', 'ironmasslite_meta_viewport', 0 );

// Additional body classes.
add_filter( 'body_class', 'ironmasslite_extra_body_classes' );

// Enqueue sticky menu if required.
add_filter( 'ironmasslite-theme/assets-depends/script', 'ironmasslite_enqueue_misc' );

// Additional image sizes for media gallery.
add_filter( 'image_size_names_choose', 'ironmasslite_image_size_names_choose' );

// Ironmasslitefy a comment form.
add_filter( 'comment_form_defaults', 'ironmasslite_ironmasslitefy_comment_form' );

// Ironmasslitefy fonts list.
add_filter( 'cx_customizer/fonts_list', 'ironmasslite_ironmasslitefy_fonts_list' );


/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.0
 * @return string `<meta>` tag for viewport.
 */
function ironmasslite_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function ironmasslite_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! ironmasslite_is_top_panel_visible() ) {
		$classes[] = 'top-panel-invisible';
	}

	// Adds a options-based classes.
	$options_based_classes = array();

	$layout      = ironmasslite_theme()->customizer->get_value( 'container_type' );
	$blog_layout = ironmasslite_theme()->customizer->get_value( 'blog_layout_type' );
	$sb_position = ironmasslite_theme()->sidebar_position;
	$sidebar     = ironmasslite_theme()->customizer->get_value( 'sidebar_width' );

	array_push( $options_based_classes, 'layout-' . $layout, 'blog-' . $blog_layout );
	if( 'none' !== $sb_position ) {
		array_push( $options_based_classes, 'sidebar_enabled', 'position-' . $sb_position, 'sidebar-' . str_replace( '/', '-', $sidebar ) );
	}

	return array_merge( $classes, $options_based_classes );
}

/**
 * Add misc to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function ironmasslite_enqueue_misc( $depends ) {
	$totop_visibility = ironmasslite_theme()->customizer->get_value( 'totop_visibility' );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add image sizes for media gallery
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function ironmasslite_image_size_names_choose( $image_sizes ) {
	$image_sizes['post-thumbnail'] = __( 'Post Thumbnail', 'ironmasslite' );

	return $image_sizes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function ironmasslite_ironmasslitefy_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit Comment', 'ironmasslite' );

	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'ironmasslite' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'E-mail', 'ironmasslite' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Website', 'ironmasslite' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_attr__( 'Comments *', 'ironmasslite' ) . '" cols="45" rows="7" aria-required="true" required="required"></textarea></p>';

	return $args;
}

/**
 * Ironmasslitefy fonts list.
 *
 * @param  array $fonts Fonts List.
 * @return array
 */
function ironmasslite_ironmasslitefy_fonts_list( $fonts = array() ) {

	$fonts = array_merge(
		array(
			'-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif' => esc_html__( 'Default System Font', 'ironmasslite' ),
		),
		$fonts
	);

	return $fonts;
}
