/*
================================================================================================
Amity - customizer.js
================================================================================================
This is the most generic template file in a WordPress theme and is one of required files to control
the customizer wihtin customizer.php.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/contact/
================================================================================================
*/
jQuery(document).ready(function($){
    wp.customize('amity_blog_layout_settings', function(value) {
        value.bind(function(to) {
            $('.site-content').removeClass('sidebar-right sidebar-left');
            $('.site-content').addClass(to);
        });
    });
});