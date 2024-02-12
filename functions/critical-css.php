<?php

/* Make Critical CSS Load Inline
-------------------------------------------------------------- */
function inline_critical_css()
{
    // Define the path to the critical CSS file (header & hero)
    $critical_css_path = get_stylesheet_directory() . '/css/dist/header-hero.min.css';

    // Check if the file exists
    if (file_exists($critical_css_path)) {
        // Read the contents of the file
        $critical_css = file_get_contents($critical_css_path);

        // Echo the contents within a <style> tag
        echo '<style id="critical-css">' . $critical_css . '</style>';
    }
}
add_action('wp_head', 'inline_critical_css', 1);