<?php 

/* Enqueue Scripts and Styles
-------------------------------------------------------------- */

function theme_scripts()
{

    // Enqueue Global Styles
    wp_enqueue_style('global', get_template_directory_uri() . '/css/dist/global.min.css', array(), null, 'all');
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), null, 'all');

    // Enqueue Home Styles
    if (is_page_template('page-home.php')) {
        wp_enqueue_style('home', get_template_directory_uri() . '/css/dist/home.min.css', array(), null, 'all');
        wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null, 'all');
    }

    // Enqueue Practice Areas Styles
    else if (is_page_template('practice-areas.php')) {
        wp_enqueue_style('practice-areas', get_template_directory_uri() . '/css/dist/practice-areas.min.css', array(), null, 'all');
    }

    // Enqueue Blog Styles
    else if (is_home() || is_archive() || is_category() || is_tag() || is_author() || is_date()) {
        wp_enqueue_style('blog', get_template_directory_uri() . '/css/dist/blog.min.css', array(), null, 'all');
    }

    // Enqueue Single Styles
    else if (is_singular('post')) {
        wp_enqueue_style('single', get_template_directory_uri() . '/css/dist/single.min.css', array(), null, 'all');
    }

    // Enqueue Footer Styles
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/dist/footer.min.css', array(), null, 'all');

    // Disable Classic Editor Styles
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');

    // Deregister jQuery
    wp_deregister_script('jquery');

    // Enqueue Scripts

    // Use jQuery from CDN
    wp_enqueue_script(
        'jquery',
        '//code.jquery.com/jquery-3.7.1.min.js',
        array(),
        '3.7.1',
        array(
            'strategy'  => 'defer',
            'in_footer' => 'true'
        )
    );


    // Enqueue Global Scripts
    wp_enqueue_script(
        'scripts',
        get_template_directory_uri() . '/js/dist/scripts.min.js',
        array(),
        '1.0.0',
        array(
            'strategy'  => 'defer',
            'in_footer' => 'true'
        )
    );

    // Enqueue Home Scripts
    if (is_page_template('page-home.php')) {

        // Slick Carousel
        // https://kenwheeler.github.io/slick/
        wp_enqueue_script(
            'slick',
            '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
            array(),
            '1.0.0',
            array(
                'strategy'  => 'defer',
                'in_footer' => 'true'
            )
        );

        // Home Page
        wp_enqueue_script(
            'home',
            get_template_directory_uri() . '/js/dist/home.min.js',
            array(),
            '1.0.0',
            array(
                'strategy'  => 'defer',
                'in_footer' => 'true'
            )
        );
    }
}

add_action('wp_enqueue_scripts', 'theme_scripts');