<?php

add_action( 'after_setup_theme', 'goetz_add_title_support' );
function goetz_add_title_support() {
	add_theme_support( 'title-tag' );
}

// add_filter( 'wp_title', 'goetz_header_title', 10, 2 );
// function goetz_header_title( $title, $sep ) {

//     //Check if custom titles are enabled from your option framework
//     $title = "Johanna Goetz";
//     return $title;
// }