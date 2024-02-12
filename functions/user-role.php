<?php

function add_custom_user_role() {
    add_role(
        'seo_manager', // System name of the role.
        'SEO Manager', // Display name of the role.
        array(
            'copy_posts' => true,
            'delete_other_posts' => true,
            'delete_other_pages' => true,
            'delete_pages' => true,
            'delete_posts' => true,
            'delete_private_pages' => true,
            'delete_private_posts' => true,
            'delete_published_pages' => true,
            'delete_published_posts' => true,
            'edit_others_pages' => true,
            'edit_others_posts' => true,
            'edit_pages' => true,
            'edit_posts' => true,
            'edit_private_pages' => true,
            'edit_private_posts' => true,
            'edit_published_pages' => true,
            'edit_published_posts' => true,
            'manage_categories' => true,
            'manage_links' => true,
            'moderate_comments' => true,
            'publish_pages' => true,
            'publish_posts' => true,
            'read' => true,
            'read_private_pages' => true,
            'read_private_posts' => true,
            'unfiltered_html' => true,
            'upload_files' => true,
            'view_site_health_checks' => true,
            'wpseo_bulk_edit' => true,
            'wpseo_edit_advanced_metadata' => true,
            'wpseo_manage_options' => true,
            'wpseo_manage_redirections' => true,
        )
    );
}
add_action('init', 'add_custom_user_role');
