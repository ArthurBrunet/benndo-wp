<?php
/**
 * bennedo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bennedo
 */

if ( ! function_exists( 'bennedo_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bennedo_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on bennedo, use a find and replace
         * to change 'bennedo' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'bennedo', get_template_directory() . '/languages' );

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
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );


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

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'bennedo_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'bennedo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bennedo_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'bennedo_content_width', 640 );
}
add_action( 'after_setup_theme', 'bennedo_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function bennedo_scripts() {
    wp_enqueue_style( 'bennedo-style', get_stylesheet_uri() );
    wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1.0.0');
    wp_enqueue_style('Map-Clean.css', get_template_directory_uri() . '/assets/css/Footer-Dark.css', array(), '1.0.0');
    wp_enqueue_style('Navigation-Clean.css', get_template_directory_uri() . '/assets/css/Map-Clean.css', array(), '1.0.0');
    wp_enqueue_style('Footer-Dark.css', get_template_directory_uri() . '/assets/css/Footer-Dark.css', array(), '1.0.0');

    wp_enqueue_style('ionicons.min.css', get_template_directory_uri() . '/assets/fonts/ionicons.min.css', array(), '1.0.0');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-1.9.1.min.js', array(), '1.0.0');
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap.bundle.js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), '1.0.0');
    wp_enqueue_script('bootstrap.bundle.js');
    wp_register_script('bootstrap.js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '1.0.0');
    wp_enqueue_script('bootstrap.js');
    wp_register_script('sweetalert2.min.js', get_template_directory_uri() . '/assets/js/sweetalert2.min.js', array(), '1.0.0');
    wp_enqueue_script('sweetalert2.min.js');

}
add_action( 'wp_enqueue_scripts', 'bennedo_scripts' );
