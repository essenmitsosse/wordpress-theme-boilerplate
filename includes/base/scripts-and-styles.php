<?php

add_action( 'wp_enqueue_scripts', 'add_style_and_script' );
function add_style_and_script() {

	// STYLES
	wp_enqueue_style( 'theme-style',  get_stylesheet_directory_uri() . '/style.min.css');
	add_action('wp_head', 'no_javascript_style', 100);
		// wp_deregister_style( 'contact-form-7', 1 );

	// HEADER SCRIPTS
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-migrate');
	wp_enqueue_script( 'html5shiv', 'http://html5shim.googlecode.com/svn/trunk/html5.js', false, '3.7.0', false );

	// FOOTER SCRIPTS
	wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4', true );
	wp_enqueue_script( 'theme-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '0.1.0', true );
	
}

add_filter( 'script_loader_tag', 'html5shiv', 10, 2 );
function html5shiv ( $tag, $handle ) {
	if ( $handle === 'html5shiv' ) {
		$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
	}
	return $tag;
}

function no_javascript_style() {
	echo "<noscript><style>.js{display:none}</style></noscript>";
}

?>