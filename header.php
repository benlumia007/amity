<?php
/*
================================================================================================
Amity - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <link href="<?php bloginfo('pingback_url'); ?>" rel="pingback" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <section id="top-nav" class="top-nav">
        <?php if (has_nav_menu('primary-navigation')) { ?>
            <div id="site-logo" class="site-logo">
                <?php $site_title = get_bloginfo('name'); ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <div class="screen-reader-text">
                        <?php printf(esc_html__('Go to the home page of %1$s', 'amity'), $site_title); ?>	
                    </div>
                    <?php
                    if (has_site_icon()) {
                        $site_icon = get_site_icon_url(270); ?>
                        <img class="site-icon" src="<?php echo esc_url($site_icon); ?>">
                    <?php } else { ?>
                        <div class="site-firstletter" aria-hidden="true">
                            <?php echo substr($site_title, 0, 1); ?>
                        </div>
                    <?php } ?>
                </a>
            </div>
            <nav id="site-navigation" class="primary-navigation">
                <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'amity'); ?></button>
                <?php wp_nav_menu(array(
                    'theme_location'    => 'primary-navigation',
                    'menu_id'           => 'primary-menu',
                    'menu_class'        => 'nav-menu'   
                )); 
                ?>
            </nav>
        <?php } else { ?>
            <div id="site-logo" class="site-logo">
                <?php $site_title = get_bloginfo('name'); ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <div class="screen-reader-text">
                        <?php printf(esc_html__('Go to the home page of %1$s', 'amity'), $site_title); ?>	
                    </div>
                    <?php
                    if (has_site_icon()) {
                        $site_icon = esc_url(get_site_icon_url(270)); ?>
                        <img class="site-icon" src="<?php echo $site_icon; ?>">
                    <?php } else { ?>
                        <div class="site-firstletter" aria-hidden="true">
                            <?php echo substr($site_title, 0, 1); ?>
                        </div>
                    <?php } ?>
                </a>
            </div>
        <?php } ?>
    </section>
    <div id="height" class="height"></div>
    <?php if (get_header_image()) { ?>
        <header id="site-header" class="site-header header-background-image">
            <div id="site-branding" class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class="site-description"><?php bloginfo('description'); ?></h4>
            </div>
        </header>
    <?php } else { ?>
        <header id="site-header" class="site-header">
            <div id="site-branding" class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class="site-description"><?php bloginfo('description'); ?></h4>
            </div>
        </header>
    <?php } ?>
    <section id="site-content" class="site-content clearfix">