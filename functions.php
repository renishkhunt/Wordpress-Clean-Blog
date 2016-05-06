<?php

if ( ! function_exists( 'wordcomat_setup' ) ) :
function wordcomat_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wordcomat', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wordcomat' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
	) );

}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'wordcomat_setup' );


/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function wordcomat_scripts() {


    // Custom Fonts
	wp_enqueue_style( 'google-fontawesome-fonts','http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), '4.1.0' );
	wp_enqueue_style( 'google-opensans-fonts','http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', array() );
	wp_enqueue_style( 'google-lora-fonts','http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic', array());

	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array());
	wp_enqueue_style( 'clean-blog-style', get_template_directory_uri() . '/css/clean-blog.css', array() );

	// Theme stylesheet.
	wp_enqueue_style( 'wordcomat-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'jquery-wordcomat', get_template_directory_uri() . '/js/jquery.min.js', array( ) );
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( ) );
	wp_enqueue_script( 'clean-blog', get_template_directory_uri() . '/js/clean-blog.min.js', array( ) );

}
add_action( 'wp_enqueue_scripts', 'wordcomat_scripts' );

show_admin_bar(false);

require 'inc/setup.php';
require 'inc/wpactions.php';
require 'inc/customptype.php';
require 'inc/navwalkr.php';

/**
* Add Redux Framework
**/
require 'inc/redux-framework/redux-framework.php';
require 'inc/redux-framework/sample/sample-config.php';
