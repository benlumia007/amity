<?php

function amity_custom_styles_setup() {
        $header_background = get_theme_mod('header_image');

        $custom_css = "
            .site-header.header-background-image {
                background: url({$header_background});
                background-size: cover!important;
                padding: 9em 0;
            }
            
            .site-header.background-color {
                background: #000000;
                padding: 9em 0;
            }
            
            .site-branding {
                padding: 0;
            }
        ";
        wp_add_inline_style('amity-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'amity_custom_styles_setup');