<?php
/*
================================================================================================
Amity - single.php
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
<?php get_header(); ?>
    <div class="<?php echo get_theme_mod('amity_blog_layout_settings', 'default'); ?>">
        <div id="content-area" class="content-area">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'single'); ?>
            <?php endwhile; ?>
                <div class="paging-navigation">
                    <?php the_posts_pagination(); ?>
                </div>
            <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
        <?php if (get_theme_mod('amity_blog_layout_settings') == 'sidebar-left') { ?>
            <?php get_sidebar('blog'); ?>
        <?php } else if (get_theme_mod('amity_blog_layout_settings') == 'sidebar-right') { ?>
                <?php get_sidebar('blog'); ?>
        <?php } ?>
    </div>
<?php get_footer(); ?>