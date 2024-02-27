<?php

/* 
Register Nav-Menus,
Dynamic Sidebars, 
Add Theme Support SVG, 
Add Theme Support Page Thumbnails, 
Modify the_excerpt() " read more " 
*/
include_once('functions/theme-setup.php');

/*
Inline Critical CSS for Page Speed
*/
include_once('functions/critical-css.php');

/*
Enqueue Theme Styles & Scripts
*/
include_once('functions/styles-scripts.php');

/*
Enable Classic Editor (for clients that fear Gutenberg),
Disable Emojis,
Remove Gutenberg Block Library CSS,
Disable WordPress Embeds
*/
include_once('functions/disable.php');

/* 
Save ACF Custom Fields to JSON 
*/
include_once('functions/acf.php');

/* 
Load Gravity Form Scripts in the Footer 
*/
include_once('functions/gravity-forms.php');


/*
Add Custom User Role
*/
include_once('functions/user-role.php');

/*
Minify HTML Output
*/
include_once('functions/minify-html.php');










