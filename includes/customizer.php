<?php
/*
================================================================================================
Amity - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This file is used to maintain the extra functionality
and features for this theme. THe main file is the functions.php that contains the main functions
and features for this theme.

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
1.0 - Theme Customization Setup
2.0 - Theme Customization Validations
================================================================================================
*/

/*
================================================================================================
1.0 - Theme Customization Setup
================================================================================================
*/
function amity_customizer_register_setup($wp_customize) {
    $wp_customize->add_panel('amity_theme_options_setup_panel', array(
        'title'         => esc_html__('Theme Options', 'amity'),
        'description'   => '',
        'priority'      => 5
    ));
    
    $wp_customize->add_section('amity_theme_options_setup_section', array(
        'title'     => esc_html__('FlexSlider', 'amity'),
        'description'   => esc_html__('The FlexSlider is used to display featured images as a slider. 2000 x 500 is preferred.', 'amity'),
        'priority'      => 5,
        'panel'         => 'amity_theme_options_setup_panel'
    ));
    
    $wp_customize->add_setting('amity_flexslider_display_settings', array(
        'sanitize_callback' => 'amity_sanitize_checkbox'
    ));
    
    $wp_customize->add_control('amity_flexslider_display_settings', array(
        'label'     => esc_html__('Enable FlexSlider', 'amity'),
        'settings'  => 'amity_flexslider_display_settings',
        'section'   => 'amity_theme_options_setup_section',
        'type'      => 'checkbox'
    ));
    
    $wp_customize->add_section('amity_general_layout_section', array(
        'title'     => esc_html__('General Layout', 'amity'),
        'description'   => '',
        'priority'      => 10,
        'capability'    => 'edit_theme_options',
        'panel'         => 'amity_theme_options_setup_panel'
    ));
    
    $wp_customize->add_setting('amity_blog_layout_settings', array(
        'default'           => 'sidebar-right',
        'sanitize_callback' => 'amity_sanitize_layout',
        'type'              => 'theme_mod',
        'transport'         => 'postMessage'
    ));
    
    $wp_customize->add_control('amity_blog_layout_settings', array(
        'label' => esc_html__('Sidebar Position', 'amity'),
        'section'   => 'amity_general_layout_section',
        'settings'  => 'amity_blog_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'sidebar-right' => esc_html__('Right Sidebar', 'amity'),
                'sidebar-left'  => esc_html__('Left Sidebar', 'amity'),
        )));
}
add_action('customize_register', 'amity_customizer_register_setup');

/*
================================================================================================
2.0 - Theme Customization Validations
================================================================================================
*/
function amity_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

function amity_sanitize_layout($value) {
    if (!in_array($value, array('sidebar-right', 'sidebar-left'))) {
        $value = 'sidebar-right';
    }
    return $value;
}