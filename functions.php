<?php 

/* Save ACF Custom Fields to JSON
-------------------------------------------------------------- */
function my_acf_json_save_point($path)
{
    return get_stylesheet_directory() . '/acf';
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');