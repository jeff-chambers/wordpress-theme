<?php

/* Register Nav-Menus
-------------------------------------------------------------- */

register_nav_menus(array(
    'main' => 'Main',
    'practice-areas' => 'Practice Areas',
));

/* Dynamic Sidebars
-------------------------------------------------------------- */

if (function_exists('register_sidebars')) {
    register_sidebar(array(
        'name'          => 'Primary Sidebar',
        'id'            => 'sidebar',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__title">',
        'after_title'   => '</h3>'
    ));
    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar__title">',
        'after_title'   => '</h3>'
    ));
}

/* Add Theme Support SVG
-------------------------------------------------------------- */

function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

/* Add Theme Support Page Thumbnails
-------------------------------------------------------------- */

add_theme_support('post-thumbnails');

/* Modify the_excerpt() " read more "
-------------------------------------------------------------- */

function new_excerpt_more($more)
{
    global $post;
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

/* Add Page Slug to Body Class
-------------------------------------------------------------- */

function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');