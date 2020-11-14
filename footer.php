<?php
/*
================================================================================================
Amity - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>    
    </section>
    <footer id="site-footer" class="site-footer clearfix">
        <div class="footer-widget">
            <?php get_sidebar(); ?>
        </div>
			<div class="site-info">
				<span class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php _e('Theme By: Benjamin Lu', 'amity'); ?></a></span><br />
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'amity' ) ); ?>"><?php printf( __( 'Proudly Powered By %s', 'amity' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
    </footer>
    <?php wp_footer(); ?>
</body>
</html>  