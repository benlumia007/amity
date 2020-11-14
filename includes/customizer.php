<?php
/*
================================================================================================
Amity - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

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
 1.0 - Customize Register (Setup)
 2.0 - Customize Register (Validation)
 3.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
 1.0 - Customize Register (Setup)
================================================================================================
*/
function amity_customize_register_setup($wp_customize) {
    // General Layout
    $wp_customize->add_panel('amity_general_layout', array(
        'title' => esc_html__('General Layout', 'amity'),
        'description'   => __('This section is mainly for the blogs, you can choose either to have the sidebar on the left or right or default.', 'amity'),
        'priority'      => 5
    ));
    
    $wp_customize->add_section('amity_blog_layout_options', array(
        'title' => esc_html__('Blog Layout', 'amity'),
        'description'   => __('This section is mainly for the blogs, you can choose either to have the sidebar on the left or right or default.', 'amity'),
        'panel'         => 'amity_general_layout',
        'priority'      => 10
    ));

    $wp_customize->add_setting('amity_blog_layout_settings', array(
        'default'   => 'default',
        'sanitize_callback'  => 'amity_sanitize_layout'
    ));

    $wp_customize->add_control('amity_blog_layout_settings', array(
        'label' => esc_html__('Blog Layout', 'amity'),
        'section'   => 'amity_blog_layout_options',
        'settings'  => 'amity_blog_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'default'           => esc_html__('Default (No Sidebar)', 'amity'),
                'sidebar-left'      => esc_html__('Left Sidebar', 'amity'),
                'sidebar-right'     => esc_html__('Right Sidebar', 'amity')
    )));
    
    $wp_customize->add_section('amity_page_layout_options', array(
        'title' => esc_html__('Page Layout', 'amity'),
        'description'   => __('This section is mainly for the blogs, you can choose either to have the sidebar on the left or right or default.', 'amity'),
        'panel'         => 'amity_general_layout',
        'priority'      => 10
    ));
    
    $wp_customize->add_setting('amity_page_layout_settings', array(
        'default'   => 'default',
        'sanitize_callback'  => 'amity_sanitize_layout'
    ));

    $wp_customize->add_control('amity_page_layout_settings', array(
        'label' => esc_html__('Page Layout', 'amity'),
        'section'   => 'amity_page_layout_options',
        'settings'  => 'amity_page_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'default'           => esc_html__('Default (No Sidebar)', 'amity'),
                'sidebar-left'      => esc_html__('Left Sidebar', 'amity'),
                'sidebar-right'     => esc_html__('Right Sidebar', 'amity')
    )));
    
    $wp_customize->add_section('amity_custom_layout_options', array(
        'title' => esc_html__('Custom Layout', 'amity'),
        'description'   => __('The Custom Layout is enabled by using the custom templates (Custom Sidebar).', 'amity'),
        'panel'         => 'amity_general_layout',
        'priority'      => 10
    ));
    
    $wp_customize->add_setting('amity_custom_layout_settings', array(
        'default'   => 'default',
        'sanitize_callback'  => 'amity_sanitize_layout'
    ));

    $wp_customize->add_control('amity_custom_layout_settings', array(
        'label' => esc_html__('Custom Layout', 'amity'),
        'section'   => 'amity_custom_layout_options',
        'settings'  => 'amity_custom_layout_settings',
        'type'      => 'radio',
            'choices'   => array(
                'default'           => esc_html__('Default (No Sidebar)', 'amity'),
                'sidebar-left'      => esc_html__('Left Sidebar', 'amity'),
                'sidebar-right'     => esc_html__('Right Sidebar', 'amity')
    )));
}
add_action('customize_register', 'amity_customize_register_setup');

/*
================================================================================================
 2.0 - Customize Register (Validation)
================================================================================================
*/
function amity_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

function amity_sanitize_layout($value) {
    if (!in_array($value, array('default', 'sidebar-left', 'sidebar-right'))) {
        $value = 'default';
    }
    return $value;
}

/*
================================================================================================
 3.0 - Customize Register (Preview)
================================================================================================
*/