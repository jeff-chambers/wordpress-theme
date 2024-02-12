<?php

/* Load Gravity Form Scripts in the Footer
-------------------------------------------------------------- */
add_filter('gform_init_scripts_footer', '__return_true');

/* Disable Gravity Forms CSS
-------------------------------------------------------------- */
add_filter('pre_option_rg_gforms_disable_css', '__return_true');