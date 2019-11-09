<?php
/**
 * Menus configuration.
 *
 * @package Ironmasslite
 */

add_action( 'after_setup_theme', 'ironmasslite_register_menus', 5 );
function ironmasslite_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'ironmasslite' ),
		'footer' => esc_html__( 'Footer', 'ironmasslite' ),
		'social' => esc_html__( 'Social', 'ironmasslite' ),
	) );
}
