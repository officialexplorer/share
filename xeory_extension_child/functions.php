<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 9 );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_parent_theme_file_uri( 'style.css' ), array( 'base-css' ) );

	wp_enqueue_style( 'style-child', get_stylesheet_directory_uri() . '/style.css', array( 'style' ) );

	//親テーマのfunctions.js
	wp_enqueue_script( 'functions', get_template_directory_uri() . 'script.js' );

		//子テーマのfunctions.js
		wp_enqueue_script( 'functions-child', get_stylesheet_directory_uri() . 'script.js', array( 'functions' ) );


}

