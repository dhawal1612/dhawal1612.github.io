<?php
/**
 * Sidebars configuration.
 *
 * @package Ironmasslite
 */

add_action( 'after_setup_theme', 'ironmasslite_register_sidebars', 5 );
function ironmasslite_register_sidebars() {

	ironmasslite_widget_area()->widgets_settings = apply_filters( 'ironmasslite-theme/widget_area/default_settings', array(
		'sidebar' => array(
			'name'           => esc_html__( 'Sidebar', 'ironmasslite' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
	) );
}
