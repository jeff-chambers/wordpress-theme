<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Jeff Chambers
 * @since Jeff Chambers 1.0
 */
get_header(); ?>

<section class="main">
    <div class="container main__container">
        <main class="main__content">
            <h1 class="main__title"><?php the_title(); ?></h1>
            <?php wp_reset_query();
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
            <?php endwhile;
            endif; ?>
        </main>
        <aside class="sidebar">
            <?php get_template_part('sidebar'); ?>
        </aside>
    </div>
</section>

<?php get_footer(); ?>