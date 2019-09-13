<?php
/**
 * finders functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package finders
 */

if ( ! function_exists( 'finders_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function finders_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on finders, use a find and replace
		 * to change 'finders' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'finders', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'adults-header-menu' => esc_html__( 'Adults header menu', 'finders' ),
            'adults-footer-menu' => esc_html__( 'Adults footer menu', 'finders' ),
            'kids-header-menu' => esc_html__( 'Kids header menu', 'finders' ),
            'kids-footer-menu' => esc_html__( 'Kids footer menu', 'finders' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'finders_setup' );


/**
 * Enqueue scripts and styles
 */
function finders_scripts() {
    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap-grid/bootstrap-grid.min.css');
    wp_enqueue_style('small', get_template_directory_uri() . '/css/small.css');
    //wp_deregister_script('jquery');
    //wp_register_script('jquery', get_template_directory_uri() . '/libs/jquery/jquery.min.js', '', '', false);
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/libs/jquery/jquery.min.js', '', '', true );
    wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/libs/swiper/swiper.js', '', '', true );
    wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', '', '', true );
    wp_enqueue_script( 'add', get_template_directory_uri() . '/js/add.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'finders_scripts' );


//Enqueue styles in footer
function finders_get_footer(){
    wp_enqueue_style('swiper', get_template_directory_uri() . '/libs/swiper/swiper.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('finders-add-style', get_stylesheet_uri());
}
add_action('get_footer','finders_get_footer');

//Disable Gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );

//SVG support
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/* Theme Options */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

// Register custom post type

function fns_register_post_type_game() {
    register_post_type( 'game',
        array(
            'label'             => 'Games',
            'singular_label'    => 'Game',
            '_builtin'          => false,
            'public'            => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            'hierarchical'      => true,
            'menu_icon'			=> 'dashicons-admin-site',
            'capability_type'   => 'page',
            //'rewrite'           => array(
            //   'slug'       => 'portfolio',
            //   'with_front' => FALSE,
            //),
            'supports' => array(
                'title',
                'thumbnail')
        )
    );
    register_taxonomy('game_category', 'game', array('hierarchical' => true, 'label' => "Categories", 'singular_name' => "Category", "rewrite" => true, "query_var" => true));
}
add_action('init', 'fns_register_post_type_game');

/* Add class 'active' to current page */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}