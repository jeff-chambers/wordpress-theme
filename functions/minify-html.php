<?php 

// Minify HTML output for faster page load times

function wp_minify_html_output($buffer) {
    // Remove HTML comments except IE conditions
    $buffer = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $buffer);
    // Remove whitespaces between HTML tags
    $buffer = preg_replace('/>\s+</', '><', $buffer);
    // Remove unnecessary whitespaces, new lines, and tabs
    $buffer = preg_replace('/\s{2,}/', ' ', $buffer);
    $buffer = preg_replace('/(\r\n|\n|\r|\t)/', '', $buffer);
    return $buffer;
}

// Hook to WordPress, start buffering and register callback
function wp_start_minify_html() {
    ob_start("wp_minify_html_output");
}

// Ensure our function runs at the very end of all other output buffering
add_action('get_header', 'wp_start_minify_html', 1);