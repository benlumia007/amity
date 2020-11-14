<?php
/*
================================================================================================
Amity - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files
for a theme (the other footer.php). The header.php template file only displayers the header
section of this theme. This also displays the navigation menu as well.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
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
    <section id="navbar-fixed-top" class="navbar-fixed-top cf">
        <div id="container-fluid" class="container-fluid">
            <header id="site-header" class="site-header cf">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-branding"><?php the_custom_logo(); ?></div>
                <?php else : ?>
                    <div id="site-branding" class="site-branding">
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                    </div>
                <?php endif; ?>
                <nav id="site-navigation" class="site-navigation cf">
                    <button class="menu-toggle"><?php _e('Menu', 'amity'); ?></button>
                    <div id="primary-navigation" class="primary-navigation">
                        <?php wp_nav_menu(array(
                            'theme_location'    => 'primary-navigation',
                        )); 
                        ?>
                    </div>
                </nav>
            </header>
        </div>
    </section>
    <div class="height"></div>
    <?php if (get_theme_mod('amity_flexslider_display', 'false')) : ?>
        <section id="site-header-image" class="site-header-image">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                        // Get all sticky posts, but only sticky posts
                        $args = array(
                            'posts_per_page'    => 5,
                            'category_name'          => 'featured',
                        );
                        $postQuery = get_posts($args);
                    
                        foreach( $postQuery as $post ) : setup_postdata($post);

                            if ( has_post_thumbnail() ) { ?>
                                <li>
                                    <a href="<?php echo get_permalink(); ?>" title="Go to <?php echo the_title(); ?>" rel="bookmark">
                                        <?php the_post_thumbnail('amity-featured-slider'); ?>
                                    </a>
                                </li>
                            <?php
                            }
                        endforeach;
                        wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </section>
    <?php elseif (get_header_image()) : ?>
        <figure class="site-header-image">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="< ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
            </a>
        </figure>
    <?php else : ?>
        <section id="site-header-image" class="site-header-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/header-image.jpg'); ?>" />
        </section>    
    <?php endif ?>
    <section id="site-conent" class="site-content <?php echo get_theme_mod('amity_blog_layout_settings', 'sidebar-right'); ?> cf">