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
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Content Width
 2.0 - Enqueue Styles and Scripts
 3.0 - Theme Setup
 4.0 - Register Sidebars
 5.0 - Required Files
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
*/
function amity_content_width() {
    $GLOBALS['content_width'] = apply_filters('amity_content_width', 800);
}
add_action('after_setup_theme', 'amity_content_width', 0);

/*
================================================================================================
 2.0 - Enqueue Styles and Scripts
================================================================================================
*/
function amity_enqueue_scripts_setup() {
    // Enable and Activate the main stylesheet for Amity.
    wp_enqueue_style('amity-style', get_stylesheet_uri());
    
    // Enable and Activate Google Fonts (Locally) for Amity.
    wp_enqueue_style('amity-google-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '20160601', true);
    
    // Enable and Activate Font Awesome for Amity.
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '20160601', true);
    
    // Enable and Activate Navigation JavaScript for Amity.
    wp_enqueue_script('amity-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('amity-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'amity') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'amity') . '</span>',
	));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'amity_enqueue_scripts_setup');

/*
================================================================================================
 3.0 - Theme Setup
================================================================================================
*/
function amity_theme_setup() {
    // Enable and Activate Add Theme Support (Title Tag) for Amity.
    add_theme_support('title-tag');
    
    // Enable and Activate Add Theme Support (Automatic Feed Links) for Amity.
    add_theme_support('automatic-feed-links');
    
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'gallery', 
        'caption'
    ));
    
    // Enable and Activate Navigation Menus for Amity.
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'amity'),
    ));
    
    add_theme_support('custom-background');
    
}
add_action('after_setup_theme', 'amity_theme_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function amity_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'amity'),
        'description'   => __('When using the Primary Sidebar, widgets will display in the Posts section.', 'amity'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'amity'),
        'description'   => __('When using the Secondary Sidebar, widgets will display in the Pages section.', 'amity'),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'amity'),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Area', 'amity'),
        'id'            => 'footer-area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'amity_register_sidebars_setup');

/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/extras/inline-styles/inline-styles.php');
require_once(get_template_directory() . '/includes/template-tags.php');


