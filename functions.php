<?php
/*
================================================================================================
Amity - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files
for a theme (the other being template-tags.php). This file is used to maintain the main
functionality and features for this theme. The second file is the template-tags.php that contains
the extra functions and features.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
================================================================================================
*/

/*
================================================================================================
Table of Contents
================================================================================================
1.0 - Enqueue Styles and Scripts
2.0 - The Main Theme Setup
3.0 - Custom Widget Initialization
4.0 - Content Width
5.0 - Required Files
================================================================================================
*/

/*
================================================================================================
1.0 - Enqueue Styles and Scripts
================================================================================================
*/
function amity_enqueue_scripts_setup() {
    // Enable and Activate the Main Stylesheet for Amity.
    wp_enqueue_style('amity-style', get_stylesheet_uri());
    
    // Enable and Activate Font Awesome for Amity.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '02012016', true);
    
    // Enable and Activate Flexslider for Amity.
    wp_enqueue_style('amity-flexslider', get_template_directory_uri() . '/extras/flexslider/flexslider.css', '05012016', true);
    wp_enqueue_script('amity-flexslider-js-script', get_template_directory_uri() . '/extras/flexslider/flexslider.js', array('jquery'), true);
    wp_enqueue_script('amity-flexslider-jq-script', get_template_directory_uri() . '/extras/flexslider/jquery.flexslider.js', array('jquery'), true);
    
    // Enable and Activate Navigation for Amity.
    wp_enqueue_script('amity-navigation-js', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '05012016', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'amity_enqueue_scripts_setup');

function amity_customize_preview_js() {
	wp_enqueue_script( 'amity-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '05012016', true );
}
add_action( 'customize_preview_init', 'amity_customize_preview_js' );

/*
================================================================================================
2.0 - The Main Theme Setup
================================================================================================
*/
if (!function_exists('amity_main_theme_setup')) {
    function amity_main_theme_setup() {
        register_nav_menus(array(
            'primary-navigation'    => esc_html__('Primary Navigation', 'amity'),
        ));
        
        add_theme_support('custom-logo', array(
            'height'    => 50,
            'width'     => 250,
        ));
        
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_image_size('amity-featured-slider', 2000, 500, true);
    }
    add_action('after_setup_theme', 'amity_main_theme_setup');
}

/*
================================================================================================
3.0 - Custom Widget Initialization
================================================================================================
*/
function amity_custom_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__( 'Primary Sidebar', 'amity' ),
        'id'            => 'post-content',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
        register_sidebar(array(
        'name'          => esc_html__( 'Secondary Sidebar', 'amity' ),
        'id'            => 'page-content',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__( 'Custom Content Sidebar', 'amity' ),
        'id'            => 'custom-content',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'amity_custom_widgets_init');

/*
================================================================================================
4.0 - Content Width
================================================================================================
*/
function amity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amity_content_width', 840 );
}
add_action( 'after_setup_theme', 'amity_content_width', 0 );


/*
================================================================================================
5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/custom-header.php');